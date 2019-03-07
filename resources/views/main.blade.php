@extends('layouts.app')

@section('content')
<div class="main_carousel">
        <div class="owl-one owl-carousel owl-theme">
            @foreach ($sliders as $slider)
            <div class="item banner white">
                <img src="/uploads/slider/{{ $slider->image }}" alt="banner1" class="only-lg" />
                <img src="/uploads/slider/{{ $slider->image }}" alt="banner2" class="only-md" />
                <img src="/uploads/slider/{{ $slider->image }}" alt="banner3" class="only-sm" />
                <div class="item-caption ">
                    <a href="{{ $slider->url }}" class="style-1 animated fadeInUp">
                        <!-- Applying animation to Caption using animate.css  -->
                        <!-- add class animated <animation-name> provided by animate.css  -->
                        <div>
                            <h3 class="main-carousel_text-heading-white">{{ $slider->title }}</h3>
                            <p class="main-carousel_text-description-white">{{ $slider->description }}</p>
                        </div>
                        <button class="outline-button_main-carousel-button_white">Узнать больше</button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="new_arrivals">
        <p>НОВЫЕ ПОСТУПЛЕНИЯ</p>
    </div>

    <div class="product_carousel">
        <div class="owl-two owl-carousel owl-theme">
            @foreach ($products as $product)
            <div class="carousel-product">
                <a href="/product/{{ $product->slug }}">
                    <div class="carousel-product_image">
                        <img src="/uploads/products/{{$product->image}}" alt="">
                    </div>
                    <div class="carousel-product_description text-center">
                        <div class="carousel-product_description_heading subheading">
                            @if ($product->series_title != null)
                                <p>{{ $product->series_title }}</p>
                            @else
                                <p>{{ $product->title }}</p>
                            @endif

                        </div>
                        <div class="carousel-product_description_text">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    @if ($product->sale == null)
                    <div class="carousel-product_price">
                        {{ number_format($product->price, 0) }} $
                    </div>
                    @else
                    <div class="carousel-product_price">
                        <p class="carousel-product_price_first">
                            {{ number_format($product->price, 0) }}
                        </p>
                        {{ number_format(( ($product->price) - ($product->price) * $product->sale / 100), 0) }} $
                    </div>
                    @endif
                </a>
            </div>
            @endforeach
           

        </div>
    </div>

    <div class="main-page-banners">
        <div class="main-page-banners_first">
            <div class="main-page-banners_heading">
                Часы
            </div>
            <div class="main-page-banners_description">
                <p>Изучите все наши наручные устройства для всех возрастов, от трекеров активности до умных часов.</p>
            </div>
            <span class="caption"> © Garmin </span>
            <div class="main-page-banners_button">
                <a href="/products/73" class="outline-button_banners-color">Узнать больше</a>
            </div>
            <div class="main-page-banners_image">
                <img src="/img/clocks.jpg" alt="">
            </div>
        </div>




        <div class="second_product_carousel">
            <div class="owl-three owl-carousel owl-theme">
                @foreach ($posts as $post)
                <div class="carousel-three-products">
                    <a href="/blog/{{ $post->slug }}">
                        <div class="carousel-three-product_text">
                            <p>{{ $post->title }}</p>
                            <button class="outline-button_main-carousel-button_white">Узнать больше</button>
                        </div>
                        <div class="carousel-three-product_image" style="background-image:url('/uploads/posts/{{ $post->image }}')">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>





        <div class="main-page-banners_second">
            <div class="main-page-banners_heading">
                Камеры
            </div>
            <div class="main-page-banners_description">
                <p>Куда бы вы ни отправились за приключениями, наши камеры предназначены для съемки.
                   С 360-градусными камерами, экшн-камерами, видеорегистраторами и резервными камерами, мы обеспечим вас.
                </p>
            </div>
            <div class="main-page-banners_button">
                <a href="/products/70" class="outline-button_banners-color">Узнать больше</a>
            </div>
            <div class="main-page-banners_image">
                <img src="img/cameras.png" alt="">
            </div>

        </div>

    </div>

    <div class="g-markets">

        <div class="g-markets_banner">
            <div class="g-markets_text">
                <p class="g-markets_text_heading">АВТОМОБИЛЬНЫЕ</p>
                <p class="g-markets_text_description">
                    Управляйте уверенно с персональными навигационными устройствами, предназначенными
                    для легковых, грузовых автомобилей, мотоциклов и внедорожников. Также покупайте
                    видеорегистраторы, резервные камеры и автомобильные мониторы для еще большей
                    осведомленности, когда вы за рулем
                </p>
                <a href="/blog/osnovniye-prinsipi-pochemu-gonchigi-lyubyat-zumo" class="outline-button_g-markets-banner">Узнать больше</a>
            </div>

            <div class="g-markets_banner_image">
                <a href="/blog/osnovniye-prinsipi-pochemu-gonchigi-lyubyat-zumo" class="g-markets_banner_image_src-1 g-markets_banner_image_style"></a>
            </div>

        </div>

        <div class="g-markets_banner">
            <div class="g-markets_text">
                <p class="g-markets_text_heading">СПОРТ И ФИТНЕС</p>
                <p class="g-markets_text_description">
                    Отслеживайте активность, гольф, плавание, походы,
                    катание на велосипеде, бег и многое другое с продуктами,
                    созданными, чтобы не отставать от вашего образа жизни.
                </p>
                <a href="/blog/10-samix-bolshix-oshibok-silovix-trenerovok" class="outline-button_g-markets-banner">Узнать больше</a>
            </div>

            <div class="g-markets_banner_image">
                <a href="/blog/10-samix-bolshix-oshibok-silovix-trenerovok" class="g-markets_banner_image_src-2 g-markets_banner_image_style"></a>
            </div>
        </div>

        <div class="g-markets_banner">
            <div class="g-markets_text">
                <p class="g-markets_text_heading">ОТДЫХ НА СВЕЖЕМ ВОЗДУХЕ</p>
                <p class="g-markets_text_description">
                    Походите, исследуйте улицу, даже выслеживайте и
                    обучайте собак с помощью прочных устройств, предназначенных для жизни на улице.
                </p>
                <a href="/blog/10-samix-bolshix-oshibok-silovix-trenerovok" class="outline-button_g-markets-banner">Узнать больше</a>
            </div>

            <div class="g-markets_banner_image">
                <a href="/blog/10-samix-bolshix-oshibok-silovix-trenerovok" class="g-markets_banner_image_src-3 g-markets_banner_image_style"></a>
            </div>
        </div>

        <div class="g-markets_banner">
            <div class="g-markets_text">
                <p class="g-markets_text_heading">МОРСКОЙ</p>
                <p class="g-markets_text_description">
                    Найдите легкую для понимания, простую в использовании и надежную электронику для вашего времени на воде
                </p>
                <a href="/blog/novie-ulutsheniye-funksiyi-v-programme-planirovaniya" class="outline-button_g-markets-banner">Узнать больше</a>
            </div>

            <div class="g-markets_banner_image">
                <a href="/blog/novie-ulutsheniye-funksiyi-v-programme-planirovaniya" class="g-markets_banner_image_src-4 g-markets_banner_image_style"></a>
            </div>
        </div>

        <div class="g-markets_banner">
            <div class="g-markets_text">
                <p class="g-markets_text_heading">АВИАЦИОННЫЙ</p>
                <p class="g-markets_text_description">
                    Откройте для себя нашу полную линейку авионики, показывающую передовые технологии
                    и бесконечные возможности. Garmin модернизирует способ полета, начиная от самых
                    совершенных палуб для пилотов и заканчивая портативными навигаторами.
                </p>
                <a href="/blog/bores-za-svobodu-na-otkritom-vozduxe" class="outline-button_g-markets-banner">Узнать больше</a>
            </div>

            <div class="g-markets_banner_image">
                <a href="/blog/bores-za-svobodu-na-otkritom-vozduxe" class="g-markets_banner_image_src-5 g-markets_banner_image_style"></a>
            </div>
        </div>

    </div>
    <div class="seo-textarea">
            <p class="seo-textarea_heading_1">
                Лучший GPS
            </p>
            <p class="seo-textarea_text">
                Garmin является мировым лидером в разработке и производстве устройств с поддержкой GPS для использования
                 в автомобильной, авиационной, морской, наружной и спортивной деятельности и коммунальных услуг.
                  Компания предлагает широкий выбор персональных навигационных устройств и ориентированных на потребителя
                   носимых технологий.
            </p>
            <p class="seo-textarea_heading_2">
                Покори мир с лучшими GPS от Garmin
            </p>
            <p class="seo-textarea_text">
                Garmin предлагает широкий ассортимент продуктов со встроенной GPS-картой. Он внедрил свою фирменную технологию 
                GPS в линейку прочных, вездеходных, водонепроницаемых носимых устройств, таких как многоспортивные GPS-часы,
                трекеры активности и диапазоны фитнеса, а также полные 360-градусные экшн-камеры и спутниковые коммуникаторы.
            </p>
            <p class="seo-textarea_text">
                Многонациональная компания также разработала эксклюзивную линейку навигационных систем, специально 
                предназначенных для морского, автомобильного и авиационного использования, в том числе пилотные часы, 
                системы морской навигации и автопилота, GPS-карты для автомобилей и перспективные сканеры. Garmin стремится 
                предложить лучшие решения для навигации и безопасности на мировом рынке, начиная с передовых 
                технологий поиска рыбы и заканчивая линейными камерами.
            </p>
            <p class="seo-textarea_text">
                Предлагая множество вариантов выбора, Garmin стремится предоставить каждому человеку гаджет, который отвечает его 
                специфическим требованиям пользователей, когда речь идет об эстетике и функциях устройств, интегрированных с GPS. 
                Garmin - это бренд, известный не только своими революционными технологиями, но и превосходным качеством продукции, 
                изысканным дизайном и лучшим соотношением цены и качества. С неизменным стремлением к совершенству бренд предлагает 
                постоянно расширяющийся ассортимент, который включает в себя некоторые из самых известных продуктов - Fenix ​​и Fenix ​​5,
                 линейку Vivofit, Forerunner и Forerunner 645 Music, Descent MK1 и VivoActive3.
            </p>
            <p class="seo-textarea_heading_2">
                Ориентация на рынок
            </p>
            <p class="seo-textarea_text">
                Компания продолжает вводить новшества и преодолевать технологические барьеры в отрасли, чтобы дать людям
                 возможность ежедневно преодолевать свои собственные ограничения и получать лучший опыт на открытом воздухе.
                 В настоящее время она делает свои навигационные технологии мирового класса легко доступными для Дубая и ОАЭ,
                  а также для ближневосточного региона, чтобы оснастить людей устройством, которое доставит их туда, куда они
                   стремятся. Итак, ищете ли вы автомобильную навигационную систему с лучшим GPS для ОАЭ, или вам нужен носок,
                    чтобы мотивировать вас на то, чтобы достичь чего-то более высокого ежедневно, тогда часть технологии Garmin
                     - ваш лучший компаньон.
            </p>
        </div>
@include('seo_sign')
@endsection