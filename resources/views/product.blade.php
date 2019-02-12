@extends('layouts.app')

@section('content')
<div class="product-list-page_banner">
    <div class="product-list-page_banner-src" style="background-image: url('/uploads/categories/{{ $category->image }}');"></div>
</div>
<div class="product-list-page_banner_description  text-center">
    <p>{!! $category->description !!}</p>
</div>


<products-component category_id="{{ $bcategory_id }}" :dollar="{{ $dollar->course }}"></products-component>


<div class="product-page_under-product_banner d-flex flex-row-nowrap">
    @foreach ($posts as $post)
    <div class="product-page_under-product">
            <a href="#">
                <div style="position: absolute; z-index: 6;">
                    <p class="product-page_under-product_description">{{ $post->title }}
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 16" class="g__icon__arrow">
                                <path fill="#fff" d="M5.7 8L0 13.8 2.1 16 10 8 2.1 0 0 2.2 5.7 8z"></path>
                            </svg>
                        </span>
                    </p>
    
                </div>
    
                <div class="product-page_under-product_img_overlay"></div>
                <div class="product-page_under-product_img" style="background-image: url(/uploads/posts/{{ $post->image }});"></div>
            </a>
        </div>      
    @endforeach
</div>
@include('seo_sign')

<div class="product-page_additional-information">
    <div class="product-page_additional-info_menu">
        <div class="product-page_additional-info_social-media">
            <ul class="d-flex list-style-default align-center">
                <li><a href="#"><img src="/img/socialmedia/twitter.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/facebook-logo.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/instagram-logo.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/youtube-symbol.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/pinterest-logo.png" alt=""></a></li>
            </ul>
            <div class="line"></div>
        </div>

        <div class="product-page_additional-info_text_menu">
            <ul class="list-style-default d-flex flex-column-nowrap ma-0 pa-0">
                <li><a href="https://connect.garmin.com/en-US/">Garmin Connect</a></li>
                <li><a href="https://fly.garmin.com/">flyGarmin</a></li>
                <li><a href="https://apps.garmin.com/en-US">Connect IQ</a></li>
                <li><a href="https://www.garmin.com/en-US/health/">Garmin Health</a></li>
            </ul>
        </div>
    </div>
    <div class="product-page_additional-info_image">
        <div style="background-image: url('/uploads/categories/{{ $category->image2 }}');"></div>
    </div>
</div>
@endsection
