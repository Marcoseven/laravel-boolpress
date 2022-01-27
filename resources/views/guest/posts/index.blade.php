@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row gy-5">
        @foreach ($posts as $post)
            <div class="col-3">
                <div class="card text-center p-3">
                    <img class="w-100 rounded" src="{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h4 class="">{{ $post->title }}</h4>
                        <h6 class="">{{ $post->sub_title }}</h6>
                        <a href="{{ route('posts.show', $post->slug) }}">Vedi post</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection