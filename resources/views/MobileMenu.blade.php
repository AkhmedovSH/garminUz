@foreach($items as $item)
@if($item->hasChildren())
    @if ($item->clickable == 1)
        <li class="has-sub">
        <a href="{{route('bcategory', $item->id)}}">{{ $item->title }}</a>
        </li>
    @else
        <li class="has-sub">
            <a href="javascript:void(0);">{{ $item->title }}</a>
        </a>
    @endif
@else
    @if ($item->clickable == 1)
        <li>
            <a href="{{route('bcategory', $item->id)}}">{{ $item->title }}</a>
        </li>
    @else
        <li>
            <a href="{{route('bcategory', $item->id)}}">{{ $item->title }}</a>
        </a>
    @endif
@endif


@if($item->hasChildren())
    <ul>
        @include('MobileMenu', ['items'=>$item->children()])
    </ul>
@endif

@endforeach