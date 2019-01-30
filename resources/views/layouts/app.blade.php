<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/favicon1.png" type="image/png/ico">
    <link rel="stylesheet" href="/extension/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/extension/owl-carousel/owl.theme.default.css">
    <link rel="stylesheet" href="/extension/animate-css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="/extension/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/extension/flags/flags.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/tools.css">
    <link rel="stylesheet" href="/css/media.css">


</head>
<body>

<div class="wrap-site">
<header>
    <div class="top-utility-bar">
        <ul class="d-flex list-style-default align-center body-1 pa-0 mx-4">
            <li class="dropdown">
                <a class="dropbtn"><span class="flag flag-uz"></span>Uzbekistan</a>
                <div class="dropdown-content">
                    <ul class=" pa-0 list-style-default dropdown-content-menu flags-menu">
                        <li><span class="flag flag-ar"></span><a href="https://www.garmin.com/es-AR">Argentina</a></li>
                        <li><span class="flag flag-au"></span><a href="https://www.garmin.com/en-AU">Australia</a></li>
                        <li><span class="flag flag-be"></span><a href="https://www.garmin.com/fr-BE">Belgique (Français)</a></li>
                        <li><span class="flag flag-be"></span><a href="https://www.garmin.com/nl-BE">Belgique (Nederlands)</a></li>
                        <li><span class="flag flag-br"></span><a href="https://www.garmin.com/pt-BR">Brasil</a></li>
                        <li><span class="flag flag-ca"></span><a href="https://www.garmin.com/en-CA">Canada (English)</a></li>
                        <li><span class="flag flag-ca"></span><a href="https://www.garmin.com/fr-CA">Canada (Français)</a></li>
                        <li><span class="flag flag-cl"></span><a href="https://www.garmin.com/es-CL">Chile</a></li>
                        <li><span class="flag flag-dk"></span><a href="https://www.garmin.com/da-DK">Denmark</a></li>
                        <li><span class="flag flag-de"></span><a href="https://www.garmin.com/de-DE">Deutschland</a></li>
                        <li><span class="flag flag-es"></span><a href="https://www.garmin.com/es-ES">España</a></li>
                        <li><span class="flag flag-fr"></span><a href="https://www.garmin.com/fr-FR">France</a></li>
                        <li><span class="flag flag-hr"></span><a href="https://www.garmin.com/hr-HR">Hrvatska</a></li>
                        <li><span class="flag flag-ie"></span><a href="https://www.garmin.com/en-IE">Ireland</a></li>
                        <li><span class="flag flag-it"></span><a href="https://www.garmin.com/it-IT">Italia</a></li>
                        <li><span class="flag flag-mx"></span><a href="https://www.garmin.com/es-MX">México</a></li>
                        <li><span class="flag flag-nl"></span><a href="https://www.garmin.com/nl-NL">Nederland</a></li>
                        <li><span class="flag flag-nz"></span><a href="https://www.garmin.com/en-NZ">New Zealand</a></li>
                        <li><span class="flag flag-no"></span><a href="https://www.garmin.com/nb-NO">Norge</a></li>
                        <li><span class="flag flag-pl"></span><a href="https://www.garmin.com/pl-PL">Polska</a></li>
                        <li><span class="flag flag-pt"></span><a href="https://www.garmin.com/pt-PT">Portugal</a></li>
                        <li><span class="flag flag-ro"></span><a href="https://www.garmin.com/ro-RO">Romania</a></li>
                        <li><span class="flag flag-ch"></span><a href="https://www.garmin.com/de-CH">Schweiz (Deutsch)</a></li>
                        <li><span class="flag flag-si"></span><a href="https://www.garmin.com/sl-SI">Slovenija</a></li>
                        <li><span class="flag flag-za"></span><a href="https://www.garmin.co.za/">South Africa</a></li>
                        <li><span class="flag flag-ch"></span><a href="https://www.garmin.com/fr-CH">Suisse (Français)</a></li>
                        <li><span class="flag flag-fi"></span><a href="https://www.garmin.com/fi-FI">Suomi</a></li>
                        <li><span class="flag flag-se"></span><a href="https://www.garmin.com/sv-SE">Sverige</a></li>
                        <li><span class="flag flag-ae"></span><a href="https://www.garmin.ae/">United Arab Emirates</a></li>
                        <li><span class="flag flag-gb"></span><a href="https://www.garmin.com/en-GB">United Kingdom</a></li>
                        <li><span class="flag flag-us"></span><a href="https://www.garmin.com/en-US">United States</a></li>
                        <li><span class="flag flag-lv"></span><a href="https://www.garmin.com/de-AT">Österreich</a></li>
                        <li><span class="flag flag-cz"></span><a href="https://www.garmin.cz/">Česká Republika</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>



        <div class="navbar-header main-header">
            <div class="button-collapsing">
                <button type="button" class="navbar-toggle menu-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                </button>
            </div>
            <div class="logo_menu_part__logo">
                <a href="/"><img src="/img/logo.png" alt="logo"></a>
            </div>
            <div class="logo_menu_part__menu ">
                <ul class="d-flex list-style-default first-level">
                    <li class="first-line">
                        <a href="javascript:void(0);" aria-haspopup="true">Каталог</a>
                        <ul class="list-style-default second-level">
                            @include('MenuItem', ['items' => $menu->roots()])
                        <hr>
                        </ul>
                    </li>

                    <li class="first-line">
                        <a href="javascript:void(0);" aria-haspopup="true">Карты</a>
                        <ul class="list-style-default second-level">
                            <li class="second-line"><a href="/maps/auto">Автомобильные Карты</a></li>
                            <li class="second-line"><a href="/maps/golf">Обновления карты поля для гольфа</a></li>
                            <li class="second-line"><a href="/maps/marine">Морские карты</a></li>
                            <li class="second-line"><a href="/maps/aviation">Обновления авиационной базы данных</a></li>
                            <li class="second-line"><a href="/maps/outdoor">Карты на открытом воздухе</a></li>
                            <li class="second-line"><a href="/maps/cycling">Велоспорт Карты</a></li>
                        </ul>
                    </li>

                    <li class="first-line">
                        <a href="javascript:void(0);" aria-haspopup="true">Поддержка</a>
                        <ul class="list-style-default second-level">
                            <li class="second-line"><a href="https://support.garmin.com/en-US/">Центр поддержки</a></li>
                            <li class="second-line"><a href="https://fly.garmin.com/fly-garmin/support/">Авиационная поддержка</a></li>
                            <li class="second-line"><a href="https://support.garmin.com/support/manuals/searchManuals.faces?refresh=true">Руководство</a></li>
                            <li class="second-line"><a href="https://support.garmin.com/support/searchSupport/search.htm">Вопросы и ответы</a></li>
                            <li class="second-line"><a href="http://www8.garmin.com/learningcenter/">Видео</a></li>
                            <li class="second-line"><a href="http://www.garmin.com/en-US/software">Программное обеспечение</a></li>
                        </ul>
                    </li>
                    <li class="first-line">
                        <a href="javascript:void(0);" aria-haspopup="true">Узнать о</a>
                        <ul class="list-style-default second-level discover">
                            <li class="second-line"><a href="#">Garmin Connect
                            <span>Для отслеживания, анализа и обмена</span>
                            </a></li>
                            <li class="second-line"><a href="#">Garmin Express
                            <span>Программное обеспечение для управления вашими устройствами</span>
                            </a></li>
                            <li class="second-line"><a href="#">Garmin IQ
                            <span>Бесплатные циферблаты, приложения и многое другое</span>
                            </a></li>
                            <li class="second-line"><a href="#">Аккаунт inReach
                            <span>Управляйте своим устройством inReach</span>
                            </a></li>
                            <li class="second-line"><a href="#">BaseCamp
                            <span>Программное обеспечение для планирования поездок по дорогам и тропам</span>
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="logo_menu_part__icons-part">

                <ul class="d-flex justify-space-between list-style-default ma-0 pa-0">
                    <li class="logo_menu_part__icons-part_search">
                        <a id="search-show">
                            <svg tabindex="0" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="10" width="45px">
                                <path fill="none" d="M0 0h43.856v43.753H0z"></path>
                                <circle cx="40.5" cy="34" r="8" fill="none" stroke="#000" stroke-width="2"
                                    transform="translate(-22.5 -15.624)"></circle>
                                <path d="M46.2 39.7l9.3 9.3" fill="none" stroke="#000" stroke-width="2"
                                    stroke-linecap="round" transform="translate(-22.5 -15.624)"></path>
                            </svg>
                        </a>
                        <div class="search-input">
                            <form method="POST" action="/search">
                                @csrf
                                <input type="text" name="name" width="200px" placeholder="Поиск..." autocomplete="off">
                                <button class="close-button" id="search-hide">
                                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                        clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-miterlimit="10">
                                        <title>Искать</title>
                                        <path d="M23.322 24.18l50.952 50.952m-.001-50.953L23.32 75.132" fill="none"
                                            stroke="#000" stroke-width="10.9584004"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                    </li>
                    <li class="logo_menu_part__icons-part_account">
                        <a class="account-dropdown_btn" id="sign-in">
                            <svg viewBox="0 1 44 44" xmlns="http://www.w3.org/2000/svg " fill-rule="evenodd"
                                clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="10" width="50px">
                                <path fill="none" d="M0 0h43.856v43.753H0z"></path>
                                <path d="M35 44s-1.5-.5-1.5-3c-.8 0-.8-2 0-2 0-.3-1.5-4 1-3.5.5-2 6-2 6.5 0 .3 1.4-.5 3.3-.5 3.5.8 0 .8 2 0 2 0 2.5-1.5 3-1.5 3v2.5c2.5.9 4.9 1.7 6.2 2.6 2-2.1 3.3-4.9 3.3-8.1 0-6.4-5.1-11.5-11.5-11.5S25.5 34.6 25.5 41c0 3.2 1.3 6 3.3 8.1 1.3-.9 4-1.7 6.2-2.6V44zM28.8 49.1c2.1 2.1 5 3.4 8.2 3.4 3.2 0 6.1-1.3 8.2-3.4"
                                    fill="none" stroke="#000" stroke-width="1.5" transform="translate(-15.5 -19.5)"></path>
                            </svg>
                        </a>
                        <div class="account-dropdown_menu-hidden" id="account-dropdown_menu-hidden">
                            @if (Auth::check())
                            <div class="account-dropdown_menu-visible_sign-in">
                                <div class="account-dropdown_menu-visible_account">
                                    Имя: {{Auth::user()->name}}
                                </div>
                                <div class="account-dropdown_menu-visible_account">
                                    <a href="/logout">Выход</a> 
                                </div>
                            </div>
                            @else
                            <div class="account-dropdown_menu-visible_sign-in">
                                    <div class="account-dropdown_menu-visible_account">
                                        Аккаунт
                                    </div>
                                    <form method="POST" action="/login">
                                        @csrf
                                        <div class="flex-column-nowrap mbottom-2">
                                            <label for="username">Email</label>
                                            <input type="text" name="email" value="{{ old('email') }}" required autofocus>
                                        </div>
                                        <div class="flex-column-nowrap">
                                            <label for="username">Пароль</label>
                                            <input type="password" name="password" required>
                                        </div>
                                        <a href="{{ route('password.request') }}">(Забыли?)</a>
    
                                        <div class="flex-column-nowrap">
                                            <button type="submit" class="outline-button_account-dropdown_menu">Войти
                                            </button>
                                        </div>
    
                                        <div class="flex-row-nowrap align-center">
                                            <input type="checkbox" id="example" name="remember">
                                            <label for="example" class="mleft-1">Запомнить </label>
                                        </div>
                                    </form>
                                    <div class="account-dropdown_menu-visible_sign-up">
                                        <a href="/register">Регистрация</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </li>
                    <li class="logo_menu_part__icons-part_korzina">
                        <a href="/cart">
                        <div>
                            <svg viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                                clip-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" width="45px">
                                <path fill="none" d="M0 0h43.856v43.753H0z"></path>
                                <circle cx="34" cy="40" r="1.5" fill="none" stroke="#000" stroke-width="1.5"
                                    transform="translate(-5.072 -8.52)"></circle>
                                <circle cx="23" cy="40" r="1.5" fill="none" stroke="#000" stroke-width="1.5"
                                    transform="translate(-5.072 -8.52)"></circle>
                                <path d="M15.5 21.5H19l4 17h11" fill="none" stroke="#000" stroke-width="1.5"
                                    transform="translate(-5.072 -8.52)"></path>
                                <path d="M22.5 36.5h13l3-9H20.4" fill="none" stroke="#000" stroke-width="1.5"
                                    transform="translate(-5.072 -8.52)"></path>
                            </svg>
                            <div class="number-of-sells">{{ Cart::count() }}</div>
                        </div>
                        </a>
                    </li>
                </ul>

            </div>
        </div>





        <div class="collapse navbar-collapse">
            <div class="collapse-search">
                <form>
                    <input type="text" placeholder="Поиск">
                </form>
            </div>

            <div id='cssmenu'>
                <ul>
                    <!-- First Menu -->
                    <li class='active has-sub'><a><span>Каталог</span></a>
                            <!-- Automobile -->
                            <ul>
                                @include('MobileMenu', ['items' => $menu->roots()])
                            </ul>
                    </li>


                    <!-- Second Menu -->
                    <li class='active has-sub'><a href='#'><span>Карты</span></a>
                        <ul>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li class="last"><a href="#">Automotive Maps</a></li>

                        </ul>
                    </li>

                    <!-- Third Menu -->

                    <li class='active has-sub'><a href='#'><span>Products</span></a>
                        <ul>
                            <li><a href="#">Automotive Maps</a></li>
                            <li class="last"><a href="#">Automotive Maps</a></li>
                        </ul>
                    </li>

                    <li class='active has-sub'><a href='#'><span>Products</span></a>
                        <ul class="discover">
                            <li><a href="#">Automotive Maps
                                    <span>Lorem ipsum dolor sit amet consectetur</span>
                                </a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>
                            <li><a href="#">Automotive Maps</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </header>
    <div class="free_sheeping">
        <p>{{ $black_title->title }}</p>
    </div>

    <div id="app">
        @yield('content')
    </div>
       


    <div class="footer">
        <div class="d-flex flex-row-nowrap container-90 mg-auto-horizontal">
            <div class="footer-item">
                <p class="footer-item_heading">Обслуживание клиентов</p>
                <ul class="footer-item_list list-style-default d-flex flex-column-nowrap ">
                    <li><a href="https://my.garmin.com/mygarmin/marketing/register.htm">Регистрация продукта</a></li>
                    <li><a href="https://garmin.blogs.com/promotions/">Специальное предложение</a></li>
                    <li><a href="https://www.garmin.com/en-US/shop/returns-refunds">Возврат и возмещение</a></li>
                    <li><a href="https://www.garmin.com/en-US/dealerlocator">Найти дилера</a></li>
                    <li><a href="https://www.garmin.com/en-US/company/contact/">Связаться с нами</a></li>
                </ul>
            </div>
            <div class="footer-item">
                <p class="footer-item_heading">Компания</p>
                <ul class="footer-item_list list-style-default d-flex flex-column-nowrap ">
                    <li><a href="https://www.garmin.com/en-US/company/about/">Насчет нас</a></li>
                    <li><a href="https://www.garmin.com/en-US/company/about/">О Garmin</a></li>
                    <li><a href="http://garmin.blogs.com/">Блоги</a></li>
                    <li><a href="http://www.garmin.com/en-US/company/investors">Инвесторы</a></li>
                    <li><a href="http://newsroom.garmin.com/">Комната новостей</a></li>
                </ul>
            </div>
            <div class="footer-item">
                <p class="footer-item_heading">Карьера</p>
                <ul class="footer-item_list list-style-default d-flex flex-column-nowrap ">
                    <li><a href="http://careers.garmin.com/en-US#lag">Жизнь в Garmin</a></li>
                    <li><a href="http://careers.garmin.com/en-US#benefits">Выгоды</a></li>
                    <li><a href="http://www.garmin.com/us/company/careers/students/">Ученики</a></li>

                </ul>
            </div>
            <div class="footer-item">
                <p class="footer-item_heading">Сайты Garmin</p>
                <ul class="footer-item_list list-style-default d-flex flex-column-nowrap ">
                    <li><a href="https://connect.garmin.com/en-US/">Garmin Connect</a></li>
                    <li><a href="https://fly.garmin.com/">flyGarmin</a></li>
                    <li><a href="https://apps.garmin.com/en-US">Connect IQ</a></li>
                    <li><a href="https://www.garmin.com/en-US/health/">Garmin Health</a></li>
                </ul>
            </div>
            <div class="footer-item">
                <p class="footer-item_heading">Партнеры</p>
                <ul class="footer-item_list list-style-default d-flex flex-column-nowrap ">
                    <li><a href="http://www.garmin.com/solutions/">Управление флотом</a></li>
                    <li><a href="http://developer.garmin.com/">Разработчики</a></li>
                    <li><a href="http://sites.garmin.com/corporate-wellness/">Корпоративное здоровье</a></li>
                    <li><a href="http://garmin-gear.com/">Garmin механизм</a></li>
                </ul>
            </div>
        </div>
        <div>
            <ul class="d-flex flex-row-nowrap list-style-default pa-0 my-1">
                <li><a href="https://www8.garmin.com/siteIndex.html">Карта сайта • </a></li>
                <li><a href="https://www.garmin.ae/terms-of-use/">Условия использования •  </a></li>
                <li><a href="https://www.garmin.ae/statement-of-privacy/">Заявление о конфиденциальности •  </a></li>
                <li><a href="#">Все права защищены © 1996-2019 Garmin. </a></li>
            </ul>
        </div>
        <div class="social-media mh-1">
            <ul class="d-flex list-style-default justify-space-between align-center">
                <li><a href="#"><img src="/img/socialmedia/facebook-logo.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/twitter.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/youtube-symbol.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/pinterest-logo.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/instagram-logo.png" alt=""></a></li>
                <li><a href="#"><img src="/img/socialmedia/payment.png" class="visa" alt=""></a></li>
            </ul>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="/extension/bootstrap/bootstrap.min.js"></script>
<script src="/extension/owl-carousel/owl.carousel.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
