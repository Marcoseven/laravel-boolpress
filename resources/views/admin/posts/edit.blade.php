@extends('layouts.admin')
@section('content')

<h1>Carica un post {{$post->title}}</h1>
@include('partials.errors')
 
<form action="{{ route('admin.posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" name="title" id="title" class="form-control error('title') is-invalid @enderror" placeholder="Titolo" aria-describedby="helpId" value="{{ $post->title }}">
      <small id="helpId" class="text-muted">Aggiungi il titolo del tuo nuovo post. Ricorda max. 100 caratteri</small>
    </div>

    <div class="mb-3">
      <label for="sub_title" class="form-label">Sotto-titolo</label>
      <input type="text" name="sub_title" id="sub_title" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Sotto-titolo" aria-describedby="helpId" value="{{ $post->sub_title }}">
      <small id="helpId" class="text-muted">Aggiungi il sotto-titolo del tuo nuovo post. Ricorda max. 100 caratteri</small>
    </div>

    <div class="row">
      <div class="col">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
      </div>
      <div class="col">
        <label for="image" class="form-label">Scegli immagine</label>
        <input type="file" name="image" id="image" class="form-control error('image') is-invalid @enderror" placeholder="Sotto-titolo" aria-describedby="helpId" accept=".jpg, .png">
        <small id="helpId" class="text-muted">Aggiungi un'immagine</small>
      </div>
    </div>

    <div class="mb-3">
      <label for="text" class="form-label">Testo</label>
      <textarea class="form-control" name="text" id="text" rows="3">{{ old('text') }}</textarea>
    </div>
    <button type="submit" class="btn">Aggiungi post</button>
</form>

@endsection

