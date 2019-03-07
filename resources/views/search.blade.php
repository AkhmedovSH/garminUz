@extends('layouts.app')

@section('content')
<div class="search-page_container container-75">
    <h3>Результаты по поиску “<span>{{ $name }}</span>"</h3>
    <br>
    <div class="search-page_shop-tag">
        <a>Магазин</a>
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
                    @if ($item->price != null && $item->sale == null)
                        <p class="search-page_product-price"> {{ number_format($item->price, 0) }} $</p>
                    @elseif($item->sale != null && $item->price != null)
                    {{ number_format(( ($item->price) - ($item->price) * $item->sale / 100), 0) }} $
                    @else
                        <p class="search-page_product-price">Не Опубликовано</p>
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
        <div class="search-page-pagination">
            {{$search_results->appends(Request::only('name'))->links()}}
        </div>
        
    </div>
</div>
@endsection