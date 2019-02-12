@extends('layouts.app')

@section('content')

    <one-product-component slug="{{ $slug }}" dollar="{{ $dollar->course }}"></one-product-component>

@endsection