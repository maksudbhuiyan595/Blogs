@extends('admin.layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">posts</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


    <section class="section">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                    <div class="d-flex justify-content-between p-3">
                      
                      @if (auth()->user()->role ==1)
                      <h3 class=""><b>Posts List</b></h3>
                      @else
                      <a href="{{ route('post.create') }}" class="btn btn-primary">+Add Post</a>
                        
                      @endif
                      
                      </div>
                      <hr>
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($posts as $id=>$post)
                    <tr>
                      <td>{{ ++$id }}</td>
                      <td>{{ $post->tittle }}</td>
                      <td>{{ $post->description }}</td>
                      <td>{{ $post->status }}</td>
                      <td>
                        @if (auth()->user()->role ==2)
                        <a class="btn btn-secondary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                        <a class="btn btn-secondary" href="{{ route('post.delete', $post->id) }}">Delete</a>
                          @else
                        <a class="btn btn-primary" href="{{ route('post.approved',$post->id) }}">Approved</a>  
                        <a class="btn btn-danger" href="{{route('post.reject',$post->id)}}" >Reject</a>
                        @endif
                        <td>
                    
                    </tr>
                 @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection