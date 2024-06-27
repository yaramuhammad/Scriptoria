<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function results(Request $request)
    {
        $searchTerm = $request->search;
                if (!empty($searchTerm)) {
            $posts = Post::where("title", "like", "%" . $searchTerm . "%")
                ->orWhere('body', "like", "%" . $searchTerm . "%")->get();
            $categories = Category::where("title", "like", "%" . $searchTerm . "%")->get();
            $users = User::where("name", "like", "%" . $searchTerm . "%")->get();
            return view("search", compact("posts", "categories", "users"));
        } else {
            return view("search");
        }
    }
}
