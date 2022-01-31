@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card text-center p-3">
                <img class="w-100 rounded" src="{{ $product->image }}" alt="{{ $product->title }}">
                <div class="card-body">
                    <h4 class="">{{ $product->name }}</h4>
                    <h6 class="mt-3">{{ $product->slug }}</h6>
                    <p class="">{{ $product->description }}</p>
                </div>
            </div>
        </div> 
        <div class="content mt-3">
            <a href="{{ route('products.index') }}">Torna indietro ai prodotti</a>
        </div>
    </div>
</div>
@endsection  