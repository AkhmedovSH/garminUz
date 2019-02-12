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
             <p>{{ $post->created_at }}</p>
             <p><a>{!! $post->getCategoryTitle() !!}</a></p>
         </div>
         <div class="blog_container-description">
             <p>
                {!! $post->content !!}
             </p>
         </div>
     </div>
 </div>
@endsection