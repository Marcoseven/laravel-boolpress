@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row gy-5">
        @foreach ($posts as $post)
            <div class="col-3">
                <div class="card text-center p-3">
                    <img class="w-100 rounded" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
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

<aside class="">
    <div class="card">
        <h4>Categorie</h4>
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('categories.posts', $category->slug) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="card">
        <h4>Tags</h4>
        <ul>
            @foreach ($tags as $tag)
                <li>
                    <a href="{{ route('guest.tags.posts', $tag->slug) }}">{{ $tag->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
@endsection