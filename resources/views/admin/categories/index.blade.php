@extends('layouts.admin')
@section('content')


<div class="container">
    <h1>Categorie</h1>
    <div class="row gy-2">
        <div class="col-6">
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nome</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Nome categoria qui" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">Categoria</small>
                </div>
                <button type="submit" class="btn btn-primary">Aggiungi categoria</button>
            </form>
        </div>
        <div class="col-6">
            <ul>
                @foreach ($categories as $category)
                <li>
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        
                        <input type="text" name="name" id="name" value="{{ $category->name }}">
                    </form>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="my-3">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-primary">Cancella</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
