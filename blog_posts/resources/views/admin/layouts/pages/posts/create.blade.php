@extends('admin.layouts.master')

@section('content')
<div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between p-3">
                <h5 class="text-center"><b>Posts Create Form</b></h5>
                  <a class="btn btn-primary" href="{{ route('post.index') }}">Posts List</a>
              </div>
              <hr>

              <!-- Multi Columns Form -->
              <form action="{{ route('post.store') }}" method="post" class="row g-3">
                @csrf
                <div class="col-md-12">
                  <label  class="form-label">Post Tittle:</label>
                  <input type="text" name="tittle" class="form-control"  value="{{ old('name') }}" placeholder="Enter Name" >
                </div>
                <div class="col-md-12">
                  <label class="form-label">Post Description:</label>
                  <textarea name="description" class="form-control" placeholder="Post Descriptions">

                  </textarea>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
              </form><!-- End Multi Columns Form -->

              </div>
            </div>
@endsection