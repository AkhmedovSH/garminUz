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
    <div class="social-media social-media_sign-up">
            <ul class="d-flex list-style-default justify-space-between align-center">
                <li><a href="https://www.facebook.com/garmin.uzbekistan"><img src="/img/socialmedia/facebook-logo.png" alt=""></a></li>
                <li><a href="https://twitter.com/GarminUz?lang=ru"><img src="/img/socialmedia/twitter.png" alt=""></a></li>
                <li><a href="https://www.youtube.com/channel/UC17HVSWclv-VxkoXGkCepOw?view_as=subscriber"><img src="/img/socialmedia/youtube-symbol.png" alt=""></a></li>
                <li><a href="https://www.instagram.com/garmin_uz/?hl=ru"><img src="/img/socialmedia/instagram-logo.png" alt=""></a></li>
                <li><a href="javascript:void(0);"><img src="/img/socialmedia/payment.png" class="visa" alt=""></a></li>
            </ul>
        </div>
</div>