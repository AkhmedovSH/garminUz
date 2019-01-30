@extends('layouts.app')

@section('content')
<div class="blog_container">
    <div class="blog_container-image">
        <div class="blog_container-image_style" style="background-image: url({{$post->getAbsolutePath()}});">

        </div>
    </div>
    <div class="blog-container_info container-80 mg-auto-horizontal">
         <div class="blog_container-heading">
             <h4>{{ $post->title }}</h4>
         </div>
         <div class="blog_container-date">
             <p>OCTOBER 29, 2018</p>
             <p><a href="">SAVED BY GARMIN</a></p>
         </div>
         <div class="blog_container-description">
             <p>
                {!! $post->description !!}
             </p>
         </div>
     </div>
 </div>
@endsection