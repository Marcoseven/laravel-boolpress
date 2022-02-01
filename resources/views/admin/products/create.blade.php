@extends('layouts.admin')
@section('content')

<div class="container me-5">
  <h1>Crea un prodotto</h1>
  @include('partials.errors')
   
  <form action="{{ route('admin.products.store') }}" method="product" enctype="multipart/form-data">
      @csrf
  
      <div class="mb-3">
        <label for="name" class="form-label">Titolo</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Titolo" aria-describedby="helpId" value="{{ old('name') }}">
        <small id="helpId" class="text-muted">Aggiungi un nome del tuo nuovo prodotto. Ricorda max. 100 caratteri</small>
          @error('name')
          <div class="alert alert-danger">{{ message }}</div>
          @enderror
      </div>
  
      <div class="mb-3">
        <label for="description" class="form-label">Sotto-titolo</label>
        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Sotto-titolo" aria-describedby="helpId" value="{{ old('description') }}">
        <small id="helpId" class="text-muted">Aggiungi una descrizione del tuo nuovo prodotto. Ricorda max. 100 caratteri</small>
          @error('description')
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
      <button type="submit" class="btn btn-dark">Aggiungi prodotto</button>
  </form>
</div>
@endsection

