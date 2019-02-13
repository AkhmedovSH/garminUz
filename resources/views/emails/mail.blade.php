Ниже предоставлен <strong>список продуктов которые были заказаны</strong>
{{ $i = 1 }}
@foreach (Cart::content() as $item)
<p>
   {{ $i++ }}
 - {{ $item->model->title }}
 - {{ $item->model->part_number}}
 - {{ $item->qty }}
 - {{ number_format($dollar->course *  $item->model->price,0)}} Сум</p>
@endforeach