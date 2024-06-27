<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->followings()->attach($user->id);
        return back()->with('success', 'You are now following ' . $user->name);
    }

    public function unfollow(User $user)
    {
        auth()->user()->followings()->detach($user->id);
        return back()->with('success', 'You have unfollowed ' . $user->name);
    }

    public function followCategory(category $category)
    {
        auth()->user()->preferences()->attach($category->id);
        return back()->with('success', 'You are now following ' . $category->title);
    }

    public function unfollowCategory(category $category)
    {
        auth()->user()->preferences()->detach($category->id);
        return back()->with('success', 'You have unfollowed ' . $category->title);
    }

    public function followCategories()
    {
        return view('follow',['categories'=> category::all(), 'followed'=>'category']);
        
    }
    public function followAuthors()
    {
        return view('follow',['users'=> User::all(), 'followed'=>'author']);
        
    }
    public function followings()
    {
        return view('follow',['users'=> Auth::user()->followings, 'followed'=>'users']);
    }
    public function followers()
    {
        return view('follow',['users'=> Auth::user()->followers, 'followed'=>'users']);
    }
}
