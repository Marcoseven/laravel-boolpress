@extends('layouts.admin')
@section('content')

<div class="container me-5">
    <h1>Prodotti admin</h1>
    <a href="{{ route('admin.products.create') }}">Crea un prodotto</a>
    <table class="table">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Disponibilità</th>
                <th>Quantità</th>
                <th>Prezzo</th>
                <th>Descrizione</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td scope="row">{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->availability }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td class="d-flex">
                        <a class="btn btn-primary" href="{{ route('admin.products.show', $post->slug) }}">Vedi</a>
                        <a class="btn btn-primary mx-2" href="{{ route('admin.products.edit', $post->slug) }}">Modifica</a>
                        
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId_{{ $post->slug }}">
                        Cancella
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modelId_{{ $product->slug }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId_{{ $post->slug }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cancellazione del product: "{{$product->title}}"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Attenzione! Stai per cancellare il prodotto. Sei sicuro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                            <form action="{{ route('admin.products.destroy', $product->slug) }}" method="product">
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
        {{$products->links()}}
    </div>
</div>
@endsection
