<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Attribute;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($id)
    {
        // ログインユーザページ以外のアクセスはリダイレクト
        if(\Auth::user()->id != $id) {
            return redirect('/');
        }
    
        $user = User::findOrFail($id);
        $attributes = new Attribute;
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

        return view('mypage.show', [
            'user' => $user,
            'posts' => $posts,
            'attributes' => $attributes,
        ]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $attributes = new Attribute;
        $attribute = $attributes::findOrFail($post->attribute_id);

        return view('mypage.edit', [
            'post' => $post,
            'attribute' => $attribute,
        ]);
    }    

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'attribute' => 'required',    
            'content' => 'required|max:255',  
        ]);

        $attributes = new Attribute;
        $attribute = $attributes::where('code', $request->attribute)->first();

        $post = Post::findOrFail($id);
        $post->attribute_id = $attribute->id;
        $post->content = $request->content;
        $post->save();

        return redirect('mypage/' . \Auth::user()->id);
    }
 
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // 認証済みユーザ以外の削除はTOPページにリダイレクト
        if(\Auth::id() !== $post->user_id) {
            return redirect('/');
        }

        $post->delete();
        return redirect('mypage/' . \Auth::user()->id);
    }
    
}
