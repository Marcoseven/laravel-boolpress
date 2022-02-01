@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Contattaci</h1>
</div>
@include('partials.errors')

@if(session('message'))
<div class="alert alert-success" role="alert"> 
    <strong>{{ session('message') }}</strong>
</div>
@endif

<div class="container">
    <form action="{{ route('mail_send') }}" method="post">
        @csrf

        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Il tuo nome</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Inserire nome" aria-describedby="helpId" required minlength="5" maxlength="25" value="{{ old('name') }}">
                    <small id="nameHelper" class="text-muted"></small>
                </div>
                <div class="col">
                    <label for="email" class="form-label">Il tuo indirizzo email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Inserire email" aria-describedby="helpId" value="{{ old('email') }}">
                    <small id="emailHelper" class="text-muted"></small>
                </div>
            </div>
        </div>

        <div class="mb-3">
          <label for="5" class="form-label"></label>
          <textarea class="form-control" name="" id="" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary text-white">Invia</button>
    </form>
</div>
@endsection