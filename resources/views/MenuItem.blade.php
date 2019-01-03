@foreach($items as $item)
   <li>
    @if($item->hasChildren())
    <a href="javascript:void(0);">{{$item->title}}</a>
    @else
    <a href="{{route('bcategory', $item->id)}}">{{$item->title}}</a>
    @endif
        @if($item->hasChildren())
            <ul>
               @include('MenuItem', ['items'=>$item->children()])
            </ul>
        @endif
    </li>
@endforeach