@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card text-center p-3">
                <img class="w-100 rounded" src="{{ $post->image }}" alt="{{ $post->title }}">
                <div class="card-body">
                    <h4 class="">{{ $post->title }}</h4>
                    <h6 class="mt-3">{{ $post->sub_title }}</h6>
                    <p>{{ $post->text }}</p>
                </div>
            </div>
        </div> 
        <div class="content mt-3">
            <a href="{{ route('posts.index') }}">Torna indietro ai posts</a>
        </div>
    </div>
</div>
@endsection  