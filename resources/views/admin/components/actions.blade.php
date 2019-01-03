@if($solution->status == 1)
    <a href="/admin/solutions/toggle/{{$solution->id}}/{{$solution->user_id}}" class="fa fa-lock"></a>
@else
    <a href="/admin/solutions/toggle/{{$solution->id}}/{{$solution->user_id}}" class="fa fa-thumbs-o-up"></a>
@endif
<a href="{{route('admin.solutions.show', $solution->id)}}" class="fa fa-eye"></a>
<a href="{{route('solutions.edit', $solution->id)}}" class="fa fa-pencil"></a>
{{Form::open(['route'=>['admin.solutions.destroy', $solution->id], 'method'=>'delete'])}}
<button onclick="return confirm('are you sure?')" type="submit" class="delete">
    <i class="fa fa-remove"></i>
</button>
{{Form::close()}}