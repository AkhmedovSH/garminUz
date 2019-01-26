@foreach($items as $item)
   <li class="third-line">
   
    <a href="{{route('bcategory', $item->id)}}"
    class="{{ $item->icons }}">
    {{ $item->title }}
    </a>
    
        @if($item->hasChildren())
            <ul class="list-style-default third-level">
               @include('MenuItem', ['items'=>$item->children()])
            </ul>
        @endif
    </li>
@endforeach