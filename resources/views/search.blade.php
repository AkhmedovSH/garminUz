@extends('layouts.app')

@section('content')
<div class="search-page_container container-75">
    <h3>Результаты по поиску “<span>{{ $name }}</span>"</h3>
    <br>
    <div class="search-page_shop-tag">
        <a href="#">Магазин</a>
    </div>
    <div class="search-page_product-position">
        <ul class="list-style-default ma-0 pa-0">
            @foreach ($search_results as $item)
            <li class="search-page_product">
                <a href="/product/{{ $item->slug }}" class="search-page_product-image">
                    <img src="uploads/products/{{ $item->image }}" alt="">
                </a>
                <div class="search-page_product-description">
                    <a href="/product/{{ $item->slug }}" class="search-page_product-name">{{ $item->title }}</a>
                    <p class="search-page_product-price">{{ $item->price }} Сум</p>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="product-page_pagination">
            {{ $search_results->links() }}
        </div>
        
    </div>
</div>
@endsection