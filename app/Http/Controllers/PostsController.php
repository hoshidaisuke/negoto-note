<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Like;
use App\Attribute;

class PostsController extends Controller
{
    public function index(Request $request)
    {
    $sort = $request->sort;
     if($sort === '1') {
        $posts = Post::withCount('like_users')->orderBy('like_users_count', 'desc')->paginate(10);

     } else {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
         
     }

        $attributes = new Attribute;


        return view('index',[
            'posts' => $posts,
            'attributes' => $attributes,
            'sort' => $sort,
        ]);
    }

    public function show($id)
    {

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
