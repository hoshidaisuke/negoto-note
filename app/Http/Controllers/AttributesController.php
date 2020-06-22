<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttributesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'attribute' => 'required',    
            'content' => 'required|max:255',    
        ]);
        
        $request->user()->posts()->create([
            'attribute' => $request->attribute,
            'content' => $request->content,
        ]);
        
        return back();
    }
}
