@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach ($posts as $post)
            <div class="row justify-content-center">
                <div class="card col col-md-8 px-0 my-1">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> {{ $post->title }} </h5>
                        <p class="card-text"> {{ $post->content }} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
