@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Tag: {{ $tag->title }}</h1>
</div>

<div class="container">
    <div class="row">
        @forelse ($posts as $post)
            <div class="col">
                <div class="card">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <a href="{{ route('posts.show', $post->slug) }}">Vedi post</a>    
                        </div>    
                    </div>    
                </div>    
            </div>  
            @empty
            <div class="">Mi dispiace, niente da vedere.</p>
            </div>          
        @endforeach
    </div>
</div>
@endsection

