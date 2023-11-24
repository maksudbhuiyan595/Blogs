

@extends('admin.layouts.master')

@section('content')
<div class="card">
            <div class="card-body">
              <h5 class="card-title text-center"><b>Posts Edit Form</b></h5>
              <hr>

              <!-- Multi Columns Form -->
              <form action="{{ route('post.update',$post->id) }}" method="post" class="row g-3">
                @csrf
                @method('put')
                <div class="col-md-12">
                  <label  class="form-label">post Name:</label>
                  <input type="text" name="tittle" class="form-control"  placeholder="Enter Name" value="{{ $post->tittle }}">
                </div>
                <div class="col-md-12">
                  <label  class="form-label">Post Description:</label>
                  <textarea name="description" class="form-control" placeholder="Post Descriptions" >
                     {{ $post->description}}
                  </textarea>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
              </form><!-- End Multi Columns Form -->

              </div>
            </div>
@endsection