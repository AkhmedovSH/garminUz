@extends('layouts.app')

@section('content')
<div id="app">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <one-product-component slug="{{ $slug }}"></one-product-component>
                    

@endsection