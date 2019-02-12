@extends('layouts.app')

@section('content')
<div class="checkout_container">
        <div class="account-create_container-title">
            Оформить заказ
        </div>
        <form action="/buyProducts" method="POST">
        @csrf
        <div class="checkout_container-main">
            
                <h5>Пожалуйста, заполните поля ниже:</p>
                    <div class="form-group">
                        <label for="exampleInputName">Имя*</label>
                        <input type="name" class="form-control" id="name" aria-describedby="emailHelp">
                        <small id="name" class="form-text text-muted">Введите ваше имя</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStreet">Ваша страна*</label>
                        <input type="text" class="form-control" id="street" aria-describedby="StreetHelp">
                        <small id="street" class="form-text text-muted">Введите вашу страну</small>
                    </div>
                    <div class="form-group">
                        <label for="town/sity">Город*</label>
                        <input type="text" class="form-control" id="town" aria-describedby="town">
                        <small id="town" class="form-text text-muted">Введите ваш город</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputStreet">Район улица*</label>
                        <input type="text" class="form-control" id="street" aria-describedby="StreetHelp">
                        <small id="street" class="form-text text-muted">Введите район улицу</small>
                    </div>
                    <div class="form-group">
                        <label for="postcode/zip">Почтовый индекс / ZIP (Не обязательно)</label>
                        <input type="text" class="form-control" id="postcode/zip" aria-describedby="postcode/zip">
                        <small id="postcode/zip" class="form-text text-muted">Введите Почтовый индекс / ZIP</small>
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона*</label>
                        <input type="text" class="form-control" id="phone" aria-describedby="phone">
                        <small id="phone" class="form-text text-muted">Введите ваш номер телефона</small>
                    </div>
           
        </div>
        <div class="checkout-your_order">
            <h3>Ваши заказы</h3>
            <div class="checkout-table">
                <table class="table">
                    <thead>
                        <th>Продукт</th>
                        <th>Общее</th>
                    </thead>
                   <tbody>
                       <tr>
                           <td><a href="">fēnix® 5 Plus × 2</a></td>
                           <td>6,798.00</td>
                        </tr>
                   </tbody> 
                   <tfoot>
                       <tr>
                           <td>Subtotal</td>
                           <td>9,506.00</td>
                       </tr>
                       <tr>
                            <td>Shipping</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>9,506.00</td>
                        </tr>
                   </tfoot>
                </table>
            </div>
            <button type="submit" class="checkout_button">Заказать</button>
        </div>
    </form>
        
    </div>
@endsection