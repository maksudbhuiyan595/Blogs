<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {   
        $posts=Post::select("id","tittle", "description", "status")->get();
        return view("admin.layouts.pages.posts.index", compact("posts"));
    }

    public function create()
    {
        return view("admin.layouts.pages.posts.create");
    }
    public function store(Request $request)
    {
        try{
            $validate=Validator::make($request->all(),[
                "tittle"        =>"required |string",
                "description"   =>"required |min:10",
            ]);
            if($validate->fails())
            {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back();
            }
            Post::create([
                "tittle" =>$request->tittle,
                "description" =>$request->description,
            ]);
            Toastr::success('post created successfully.');
            return redirect()->route('post.index');

        }catch(Exception $exception)
        {
            Toastr::error('something went wrong! please try again.');
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $post=Post::find($id);
        return view("admin.layouts.pages.posts.edit",compact("post"));
    }
    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        try{
            $validate=Validator::make($request->all(),[
                "tittle"        =>"required |string",
                "description"   =>"required |min:10",
            ]);
            if($validate->fails())
            {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back();
            }
            $post->update([
                "tittle" =>$request->tittle,
                "description" =>$request->description,
            ]);
            Toastr::success('post updated successfully.');
            return redirect()->route('post.index');

        }catch(Exception $exception)
        {
            Toastr::error('something went wrong! please try again.');
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        Post::destroy($id);
        Toastr::success('post deleted successfully.');
        return redirect()->back();
    }
    public function approved($id)
    {
        $post=Post::find($id);
        
        $post->status='active';
        $post->save();
        toastr()->success('post approved');
        return redirect()->back();
    }
    public function reject($id)
    {
        $post=Post::find($id);

        $post->status='reject';
        $post->save();
        toastr()->success('post rejected');
        return redirect()->back();
    }
}
