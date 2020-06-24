<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
    // 参考になったを保存
     public function store(Request $request, $id)
    {
        \Auth::user()->like($id);
        return back();
    }

    // 参考になったを削除
    public function destroy($id)
    {
        \Auth::user()->unlike($id);
        return back();
    }    

}
