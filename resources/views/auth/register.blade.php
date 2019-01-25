@extends('layouts.app')

@section('content')
<div class="account-create_container">
        <div class="account-create_container-title">
            СОЗДАТЬ | АККАУНТ | GARMIN
        </div>
        <div class="account-create_container-main">
            <form action="/register"  method="post">
                @csrf
                <h5>Пожалуйста, заполните поля ниже:</p>
                    <div class="form-group">
                        <label for="exampleInputName">Имя*</label>
                        <input type="name" name="name" class="form-control" id="name" aria-describedby="emailHelp" autocomplete="off">
                        <small id="name" class="form-text text-muted">Введите ваше имя</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email*</label>
                        <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp">
                        <small id="Email" class="form-text text-muted">Используйте электронный адрес для входа</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputRetypeEmail">Повторите Email*</label>
                        <input type="email" class="form-control" id="RetypeEmail" aria-describedby="emailHelp">
                        <small id="RetypeEmail" class="form-text text-muted">Введите ваш электронный адрес сново</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Пароль*</label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp">
                        <small id="password" class="form-text text-muted">Минимальная длина пароля 6 символов.
                            Прямая косая черта, пробелы и двойные кавычки не допускаются.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputretypedPassword">Повторите пароль*</label>
                        <input type="password" name="password_confirmation" class="form-control" id="retypepassword" aria-describedby="emailHelp">
                        <small id="retypepassword" class="form-text text-muted">Введите ваш пароль сново</small>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="exampleCheckbox1" value="option1">
                        <label class="form-check-label" for="exampleRadios1">
                            Получайте новости о продуктах и акциях в зависимости от ваших предпочтений и зарегистрированных устройств.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="exampleCheckbox2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                                Я прочитал и согласен с <a href="https://www.garmin.com/en-US/legal/terms-of-use">политикой конфиденциальности.</a>
                        </label>
                    </div>
                    <p>Garmin серьезно относится к вашей конфиденциальности. Наша <a href="https://www.garmin.com/en-US/privacy/global/">
                        политика конфиденциальности</a> доступен для вашего обзора.</p>
                    <button type="submit" class="create-account_button create-account_button-disabled" id="disabled-button">Создать
                        Аккаунт</button>
            </form>
        </div>


    </div>
@endsection
