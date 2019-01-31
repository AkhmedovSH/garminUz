<div class="main-sign-up">
    <div class="main-sign-up_title">
        Подпишитесь на новости
    </div>
    <div class="main-sign-up_input">
        <form class="main-sign-up_input_form" action="/subscribe" method="post">
            {{csrf_field()}}
            <span></span>
            <input type="text" type="email" name="email">
            <button type="submit" class="main-sign-up_search_button"></button>
        </form>
    </div>
    <p class="main-sign-up_privacy-statement">
        Регистрируясь, я соглашаюсь с 
        <a href="http://www.garmin.com/en-US/legal/privacy-statement">политикой конфедициальности</a>
        Garmin.
    </p>
</div>