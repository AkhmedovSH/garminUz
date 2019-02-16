Ниже предоставлен <strong>список продуктов которые были заказаны</strong>
{{ $i = 1 }}
<p>Имя заказчика: {{ $info['name'] }}</p>
<p>Страна: {{ $info['country'] }}</p>
<p>Город: {{ $info['city'] }}</p>
<p>Адресс: {{ $info['street'] }}</p>
<p>Почтовый индекс: {{ $info['postcode'] }}</p>
<p>Номер телефона заказчика: {{ $info['phone'] }}</p>
@foreach (Cart::content() as $item)
<p>
   {{ $i++ }}
 - {{ $item->model->title }}
 - {{ $item->model->part_number}}
 - {{ $item->qty }}
 - {{ number_format($dollar->course *  $item->model->price,0)}} Сум</p>
@endforeach

<p>Расчетная сумма заказа: {{ number_format((floatval(str_replace(',', '.', Cart::subtotal())) * $dollar->course)*1000) }} Сум</p>
<p>Общая сумма в долларах: {{ Cart::subtotal() }} USD</p>


@if (session()->has('coupon'))
<p>Пользователь использовал купон({{ session()->get('coupon')['name'] }})
   со скидкой: - {{ number_format(session()->get('coupon')['discount']) }} Сум</p>
<p>Итого: - {{ 
              number_format( (str_replace(',', '', Cart::subtotal()) * $dollar->course) - session()->get('coupon')['discount'] )
            }} Сум Сум</p>
@endif


