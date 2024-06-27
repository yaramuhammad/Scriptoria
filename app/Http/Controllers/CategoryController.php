<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(category $category, Request $request)
{
    $searchTerm = $request->input('search');
    $posts = Post::whereHas('categories', function ($query) use ($category) {
            $query->where('title', $category->title);
        })
        ->when($searchTerm, function ($query, $searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%'.$searchTerm.'%')
                  ->orWhere('body', 'like', '%'.$searchTerm.'%');
            });
        })
        ->get();

    return view('category.show', ['category' => $category, 'posts' => $posts]);
}

    
}
