@foreach($items as $item)
    <option value="{{$item->id}}">{{$item->title}}</option>
        @if($item->hasChildren())
            @include('MenuItem2', ['items'=>$item->children()])
        @endif
@endforeach