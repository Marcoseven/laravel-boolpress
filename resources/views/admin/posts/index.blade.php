@extends('layouts.admin')
@section('content')

<h1>Posts</h1>
<div class="container me-5">
    <a href="{{ route('admin.posts.create') }}">Crea un post</a>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Titolo</th>
                <th>Sotto-titolo</th>
                <th>Slug</th>
                <th>Immagine</th>
                <th>Testo</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->sub_title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td><img class="w-100" src="{{ $post->image }}" alt="{{ $post->title }}"></td>
                    <td>{{ $post->text }}</td>
                    <td class="d-flex">
                        <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">Vedi</a>
                        <a class="btn btn-primary mx-2" href="{{ route('admin.posts.edit', $post->slug) }}">Modifica</a>
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId_{{ $post->slug }}">
                        Cancella
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modelId_{{ $post->slug }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId_{{ $post->slug }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cancellazione del post: "{{$post->title}}"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Attenzione! Stai per cancellare il post. Sei sicuro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                            <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-secondary">Cancella</button>
                                            </form>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>      
            @endforeach
        </tbody>
    </table> 
    
    <div class="my-5 d-flex justify-content-center"> 
        {{$posts->links()}}
    </div>
</div>
@endsection

