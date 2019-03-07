@extends('layouts.app')

@section('content')
@if (Cart::count() > 0)
<div class="breadcrumb-part mg-auto-horizontal">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><strong><a >Моя корзина</a></strong></li>
                <li class="breadcrumb-item active" aria-current="page">Продукты</li>
            </ol>
        </nav>
    </div>
    <div class="shopping-cart">
        <table class="table shopping-cart_table">
            <thead>
                <tr>
                    <th scope="col">Рисунок</th>
                    <th scope="col">Мои товары</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Цена</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach (Cart::content() as $item)
                <tr class="shopping-cart_table-product">
                    <td>
                        <img src="/uploads/products/{{$item->model->image}}" alt="product">
                    </td>
                    <td>
                        <p class="shopping-cart_name"><a>{{ $item->model->title}}</a></p>
                        <p class="shopping-cart_sku">Нумерация: {{$item->model->part_number}}</p>
                    </td>
                    <td>
                        <select  class="select--ys show-qty quantity" data-id="{{$item->rowId}}">
                            <option {{ $item->qty == 1 ? 'selected' : ''}}>1</option>
                            <option {{ $item->qty == 2 ? 'selected' : ''}}>2</option>
                            <option {{ $item->qty == 3 ? 'selected' : ''}}>3</option>
                            <option {{ $item->qty == 4 ? 'selected' : ''}}>4</option>
                            <option {{ $item->qty == 5 ? 'selected' : ''}}>5</option>
                        </select>
                    </td>
                    <td>
                        @if ($item->model->sale == null)
                            <p class="shopping-cart_price ma-0">
                                {{ number_format($item->model->price,0)}} $
                            </p>
                        @else
                            <p class="shopping-cart_price ma-0">
                                {{ number_format(( ($item->model->price) - ($item->model->price) * $item->model->sale / 100), 0) }} $
                            </p>
                        @endif
                        
                    </td>
                    <td>
                        <form action="{{route('cart.destroy',$item->rowId)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit"><a><span>Удалить</span></a></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <table class="table shopping-cart_coupon">
            <tbody>
                <tr>
                    <td>
                        <div class="main-sign-up_input">
                            <form class="coupon-part" action="{{ route('coupon.store') }}" method="POST">
                                @csrf
                                <span>Купон: </span>
                                <input type="text"  name="coupon_code" placeholder="Если имееться купон...">
                                <button type="submit">Ввести</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>


        <table class="table shopping-cart_estimated-cost">
            <tbody>
                @if (session()->has('coupon'))
                <tr class="r-1">
                    <td>Скидка по({{ session()->get('coupon')['name'] }})</td>
                    <td> 
                        -{{ number_format(session()->get('coupon')['discount']) }} $
                    </td>
                </tr>
                @endif
                <tr class="r-3">
                    <td>Расчетная сумма заказа</td>
                        <td>{{ number_format((floatval(str_replace(',', '.', Cart::subtotal())))) }} $
                    </td>
                </tr>
               {{--  <tr class="r-4">
                    <td>В других валютах</td>
                    <td><span>{{ Cart::subtotal() }} USD</span></td>
                </tr> --}}
                @if (session()->has('coupon'))
                <tr class="r-3">
                    <td>Итого</td>
                    <td>{{ 
                        number_format( (str_replace(',', '', Cart::subtotal())) - session()->get('coupon')['discount'] )
                        }} $</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="shopping-cart_rule">
            <p>Примечание. Стоимость доставки и налоги являются ориентировочными и будут обновляться во время
                 оформления заказа на основе информации о выставлении счетов и доставке.</p>
            <p>Размещая свой заказ, вы соглашаетесь с условиями <a>использования Garmin</a></p>
        </div>
        <div class="shopping-cart_buttons">
            <a href="/" class="shopping-cart_buttons-count_shop">Продолжить покупки</a>
            <a href="/checkout" class="shopping-cart_buttons-check_out">Оформить заказ</a>
        </div>
    </div>
@else
<div class="empty_cart">
    <p>Ваша корзина пуста.</p>
</div>
@endif
@endsection