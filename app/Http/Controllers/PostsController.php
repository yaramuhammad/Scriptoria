<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index(Request $request)
    {
        $categories = category::all();
        $followingsIds = Auth::user()->followings()->pluck('users.id')->toArray();
        $followingCategories = Auth::user()->preferences()->pluck('categories.id')->toArray();
        $posts = Post::where(function ($query) use ($followingsIds, $followingCategories) {
            $query->whereIn('user_id', $followingsIds)
                  ->orWhereHas('categories', function ($query) use ($followingCategories) {
                      $query->whereIn('id', $followingCategories);
                  });
        })->with(['categories','comments','user']) 
          ->get();        
          return view("posts.index",['posts'=> $posts,'categories'=>$categories]);
    }

    public function create()
    {
        $categories = category::all();
        return view('posts.create', ['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'categories' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $body = $data['body'];
        $lines = explode("\r\n", $body);
        $lines = array_filter($lines, 'trim');
    
    
        $imagePath = $request->file('image')->store('posts', 'public');
    
        $post = new Post([
            'title' => $data['title'],
            'body' => $lines,
            'user_id' => auth()->user()->id,
            'imagePath' => $imagePath,
        ]);
    
        $post->save();
    
        $post->categories()->attach($data['categories']);
    
        return redirect()->route('posts.show',['post'=>$post])->with('success', 'Post created successfully.');
    }
    
    public function show(Post $post)
    {
        return view('posts.show',['post'=> $post]);
    }

    public function edit(Post $post)
    {
        $categories = category::all();

        return view('posts.edit',['post'=> $post,'categories'=>$categories]);
    }

    public function update(Request $request, post $post)
    {
        $data = $request->validate([
            'title'=> 'required',
            'body'=> 'required',
            'categories'=> 'required',
        ]);
        $body = $data['body'];
        $lines = explode("\r\n", $body);
        $lines = array_filter($lines, 'trim');
        $data['body'] = $lines;
        $post->categories()->detach();
        $post->categories()->attach($data['categories']);

        $post->update($data);
        return redirect()->route('posts.show',['post'=>$post])->with('success','');
    }

    public function destroy(Post $post)
    {
        if($post->user->id == Auth::user()->id) {   
            $post->delete();
            return redirect()->route('posts.index')->with('success','');
        }
        else
        {
            return abort(403);
        }
    }

    public function savePost(Post $post) {
        auth()->user()->savedPosts()->attach($post->id);
        return back()->with('success', 'You Saved This Post');
    }

    public function indexSaved()
    {
        $posts = Auth::user()->savedPosts;
        return view('posts.saved', compact('posts'));
    }

}
