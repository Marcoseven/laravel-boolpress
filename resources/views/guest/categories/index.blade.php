@extends('layouts.app')
@section('content')

<div class="p-5 bg-dark text-white">
    <div class="container">
        <h1 class="display-3">Categoria: {{$category->name}}</h1>
    </div>
</div>


<div class="container">
    <div class="row gy-2">
        @forelse($posts as $post)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{ $post->image }}" alt="{{ $post->title }}">
                <div class="card-body">
                    <h4 class="card-title">{{$post->title}}</h4>

                    <a href="{{ route('posts.show', $post->slug) }}">Vedi post</a>
                </div>
            </div>
        </div>

        @empty
        <div class="col">
            <p>Scusa, niente da vedere.</p>
        </div>
        @endforelse
    </div>
</div>

@endsection
