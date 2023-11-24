@extends('frontend.layouts.master')

@section('post')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-body">
                        <h4><span>Tittle: {{$post->tittle}}</span></h4>
                            <p><span>Descriptions: </span>{{ $post->description }}</p>
                        </div>
                    </div>        
            @endforeach

        </div>
    </div>
</div>
@endsection
