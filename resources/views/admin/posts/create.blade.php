@extends('layouts.admin')
@section('content')

<div class="container me-5">
  <h1>Crea un post</h1>
  @include('partials.errors')
   
  <form action="{{ route('admin.posts.store') }}" method="post">
      @csrf
  
      <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titolo" aria-describedby="helpId" value="{{ old('title') }}">
        <small id="helpId" class="text-muted">Aggiungi il titolo del tuo nuovo post. Ricorda max. 100 caratteri</small>
          @error('title')
          <div class="alert alert-danger">{{ message }}</div>
          @enderror
      </div>
  
      <div class="mb-3">
        <label for="sub_title" class="form-label">Sotto-titolo</label>
        <input type="text" name="sub_title" id="sub_title" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Sotto-titolo" aria-describedby="helpId" value="{{ old('sub_title') }}">
        <small id="helpId" class="text-muted">Aggiungi il sotto-titolo del tuo nuovo post. Ricorda max. 100 caratteri</small>
          @error('sub_title')
          <div class="alert alert-danger">{{ message }}</div>
          @enderror
      </div>
  
      <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Sotto-titolo" aria-describedby="helpId" value="{{ old('image') }}">
        <small id="helpId" class="text-muted">Aggiungi un'immagine</small>
          @error('image')
          <div class="alert alert-danger">{{ message }}</div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="text" class="form-label">Testo</label>
        <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="text" rows="3">{{ old('text') }}</textarea>
          @error('text')
          <div class="alert alert-danger">{{ message }}</div>
          @enderror
      </div>
      <button type="submit" class="btn btn-dark">Aggiungi post</button>
  </form>
</div>
@endsection

