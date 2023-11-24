<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" =>"required",
            "password" =>"required |min:6 |max:12",
        ]);
        
        $credentials=$request->only("email", "password");
        // dd($credentials);
        if (auth()->attempt($credentials))
        {
            if(!auth()->user()->role ==0)
            {
                Toastr::success('successfully login .');
                return view("admin.layouts.pages.home");
            }else
            {
                $posts=Post::where('status','=', 'active')->get();
                return view("frontend.layouts.home",compact("posts"));
                Toastr::success('successfully login user.');
            }
        }else
        {
            Toastr::error("Invalid User");
            return redirect()->route('home');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        Toastr::success("successfully logout.");
        return  redirect()->route("home");

    }
   
}
