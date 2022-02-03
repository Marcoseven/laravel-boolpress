@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Prodotti</h1>
    <div class="row gy-5">
        @foreach ($products as $product)
            <div class="col-3">
                <div class="card text-center p-3">
                    <img class="w-100 rounded" src="{{ $product->image }}" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h4 class="">{{ $product->name }}</h4>
                        <h6 class="">{{ $product->slug }}</h6>
                        <h6 class="">{{ $product->availability }}</h6>
                        <h6 class="">{{ $product->quantity }}</h6>
                        <h6 class="">{{ $product->price }}</h6>
                        <p class="">{{ $product->description }}</p>
                        <a href="{{ route('products.show', $product->slug) }}">Vedi prodotto</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection