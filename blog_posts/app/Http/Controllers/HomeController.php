<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $posts=Post::where('status','=', 'active')->get();
       
        return view("frontend.layouts.home",compact('posts'));
    }
    
}
