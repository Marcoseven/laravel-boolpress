@extends('layouts.admin')
@section('content')

<h1>Posts</h1>
<div class="container me-5">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titolo</th>
                <th>Sotto-titolo</th>
                <th>Slug</th>
                 <th>Immagine</th>
                <th>Testo</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td scope="row">{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->sub_title }}</td>
                <td>{{ $post->slug }}</td>
                <td><img src="{{ $post->image }}" alt="{{ $post->title }}"></td>
                <td>{{ $post->text }}</td>
                <td>
                    <a href="{{ route('admin.posts.show') }}">View</a>
                    <a href="{{ route('admin.posts.edit') }}">Edit</a>
                    <a href="{{ route('admin.posts.delete') }}">Delete</a>
                </td>
            </tr>      
            @endforeach
        </tbody>
    </table>
    
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