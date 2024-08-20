<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function review(Request $request)
    {
        $validatedData = $request->validate([
            'page_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'flag' => 'required',
            'slug' => 'required',
        ]);

        $post = Review::create($validatedData);
        return redirect()->back()->with('success', 'Post created successfully!');
    }
}
