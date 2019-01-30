@foreach($items as $item)
   <li class="second-line">
   @if ($item->clickable == 1)
        <a href="{{route('bcategory', $item->id)}}"
            class="{{ $item->icons }} {{ $item->hasChildren() === true ? "navbar-icon-arrow" : "" }}">
            {{ $item->title }}
        </a>
   @else
    <a href="javascript:void(0);"
        class="{{ $item->icons }} {{ $item->hasChildren() === true ? "navbar-icon-arrow" : "" }}">
        {{ $item->title }}
    </a>
   @endif
   
    
        @if($item->hasChildren())
            <ul class="list-style-default third-level">
               @include('MenuItem-1', ['items'=>$item->children()])
            </ul>
        @endif
    </li>
@endforeach