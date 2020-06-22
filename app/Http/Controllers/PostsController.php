<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Attribute;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $attributes = new Attribute;

        return view('index',[
            'posts' => $posts,
            'attributes' => $attributes,
        ]);
    }

    public function show($id)
    {

        // 投稿を取得
        $post = Post::findOrFail($id);
        $attributes = new Attribute;

        $count_like_users = $post->like_users()->count();

        $attribute = $attributes::findOrFail($post->attribute_id);
        return view('show.index', [
            'post' => $post,
            'attribute' => $attribute,
            'count_like_users' => $count_like_users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'attribute' => 'required',    
            'content' => 'required|max:255',    
        ]);
        
        $attribute = new Attribute;
        $attribute->content = $request->attribute;
        $attribute->save();
        
        $request->user()->posts()->create([
            'content' => $request->content, 
            'attribute_id' => $attribute->id, 
        ]);
        
        return back();
    }
    
    
}
