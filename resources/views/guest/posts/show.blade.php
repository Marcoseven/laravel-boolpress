@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card text-center p-3">
                <img class="w-100 rounded" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                <div class="card-body">
                    <h4 class="">{{ $post->title }}</h4>
                    <h6 class="mt-3">{{ $post->sub_title }}</h6>
                    <div class="">
                        <div class="category">
                            @if($post->category)
                            Categoria: <a href="{{ route('categories.posts', $post->category->slug) }}">{{ $post->category->name }}</a>
                            @else
                            <span>Nessuna categoria</span>
                            @endif
                        </div>
                        <div class="tag">
                            @if($post->tag)
                            Categoria: <a href="{{ route('guest.tags.posts', $post->tag->slug) }}">{{ $post->tag->name }}</a>
                            @else
                            <span>Nessun tag</span>
                            @endif
                        </div>
                    </div>
                    <div class="text">
                        <p>{{ $post->text }}</p>
                    </div>
                </div>
            </div>
        </div> 
        <div class="content mt-3">
            <a href="{{ route('posts.index') }}">Torna indietro ai posts</a>
        </div>
    </div>
</div>
@endsection  