@extends('layouts.app')

@section('content')
<div class="maps-page_container">
    <h1>Карты и обновления карт <span>Выберите категорию вашего устройства.</span></h1>
    <div class="maps-page_description-tab">
        <div class="maps-page_description">
            <ul class="nav nav-tabs container-70 mg-auto-horizontal nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ $parametr == "auto" ? "active" : "" }}" id="auto-tab" data-toggle="tab" href="#auto" role="tab"
                        aria-controls="auto" aria-selected="true">

                        <img src="/img/maps-back-banner/maps-icon/car_01.png" alt="">
                        Автомобильный</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $parametr == "golf" ? "active" : "" }}" id="golf-tab" data-toggle="tab" href="#golf" role="tab" aria-controls="golf"
                        aria-selected="false">
                        <img src="/img/maps-back-banner/maps-icon/golf_03.png" alt="">
                        Гольф</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $parametr == "marine" ? "active" : "" }}" id="marine-tab" data-toggle="tab" href="#marine" role="tab"
                        aria-controls="marine" aria-selected="false">

                        <img src="/img/maps-back-banner/maps-icon/acchor_02.png" alt="">
                        Морской</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $parametr == "aviation" ? "active" : "" }}" id="aviation-tab" data-toggle="tab" href="#aviation" role="tab"
                        aria-controls="aviation" aria-selected="false">
                        <img src="/img/maps-back-banner/maps-icon/flight_02.png" alt="">
                        Авиация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $parametr == "outdoor" ? "active" : "" }}" id="outdoor-tab" data-toggle="tab" href="#outdoor" role="tab"
                        aria-controls="outdoor" aria-selected="false">
                        <img src="/img/maps-back-banner/maps-icon/walk_02.png" alt="">
                        Внешний</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $parametr == "cycling" ? "active" : "" }}" id="cycling-tab" data-toggle="tab" href="#cycling" role="tab"
                        aria-controls="cycling" aria-selected="false">
                        <img src="/img/maps-back-banner/maps-icon/cycle-80x78.png" alt="">
                        Велосипедый</a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade {{ $parametr == "auto" ? "show active" : "" }}" id="auto" role="tabpanel" aria-labelledby="auto-tab">
                   <h2 class="tab-pane_heading-sm_and_after">Автомобильный</h2>
                <div class="maps-page_white-window">
                    <h3>Улицы меняются. Предприятия открываются и закрываются.</h3>
                    <span>Убедитесь, что у вас есть последние подробные карты улиц и достопримечательности, чтобы обеспечить быструю и точную навигацию. Если у вас есть обновления на всю жизнь, вам нужно приобрести обновление или вы не уверены - начните с загрузки Garmin Express.</span>
                    <div class="maps-page_button-block d-flex align-center justify-center mh-1">
                        <a href="https://www.garmin.com/en-US/software/express/" class="maps-page_button">Скачать Garmin Express</a>
                    </div>
                    <h6 class="text-center">Нужно купить карту для другого региона? <a href="http://buy.garmin.com/en-US/US/maps/on-the-road-maps/c452-c454-p1.html" >Купите сейчас</a></h6>
                </div> 
            </div>
            <div class="tab-pane fade {{ $parametr == "golf" ? "show active" : "" }}" id="golf" role="tabpanel" aria-labelledby="golf-tab">
                    <h2 class="tab-pane_heading-sm_and_after">Гольф</h2>
                <div class="maps-page_white-window">
                    <h3>Обновите свои карты для гольфа</h3>
                    <span>Ваш подход включает в себя бесплатные обновления для гольфа. Используйте Garmin Express для обновления карт и программного обеспечения на вашем устройстве.</span>
                    <div class="maps-page_button-block d-flex align-center justify-center mh-1">
                        <a href="https://www.garmin.com/en-US/software/express/" class="maps-page_button">Скачать Garmin Express</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{ $parametr == "marine" ? "show active" : "" }}" id="marine" role="tabpanel" aria-labelledby="marine-tab">
                    <h2 class="tab-pane_heading-sm_and_after">Морской</h2>
                <div class="maps-page_white-window">
                    <h3>Добавить морские карты и карты</h3>
                    <span>Добавьте диаграммы и карты к вашему морскому устройству, чтобы улучшить навигацию и лов рыбы на воде. </span>
                    <div class="maps-page_button-block d-flex align-center justify-center mh-1">
                        <a href="https://www.garmin.com/en-US/software/express/" class="maps-page_button">Скачать Морские карты</a>
                    </div>
                    <hr>
                    <h5>Обновление морских карт и карт</h5>
                    <p>IЕсли на вашем морском устройстве есть карты BlueChart g2, BlueChart g2 Vision, LakeVü HD или LakeVü HD Ultra, обновление карты обеспечит наиболее точную навигацию. </p>
                    <ul>
                        <li><a href="https://my.garmin.com/gcpInstall/checkPlugin.htm?target=https://my.garmin.com/maps/updates.htm?deviceType=marine&activeTab=">Обновите предварительно запрограммированную карту microSD ™ / SD ™</a></li>
                        <li><a href="https://my.garmin.com/gcpInstall/checkPlugin.htm?target=https://my.garmin.com/maps/updates.htm?deviceType=marineCard&activeTab=">Обновите предварительно загруженный картплоттер с фиксированным креплением</a></li>
                    </ul>
                    <hr>
                    <h5>Поддержка BlueChart</h5>
                    <ul>
                        <li><a href="https://www8.garmin.com/cartography/marine/programs.html">Обновления BlueChart и Trade-Ins</a></li>
                        <li><a href="https://www8.garmin.com/cartography/g2/ID.html">BlueChart g2 ID коды</a></li>
                        <li><a href="https://www8.garmin.com/cartography/marinas/">Марина Листинг Форма запроса</a></li>
                    </ul>
                </div>
            </div>

            <div class="tab-pane fade {{ $parametr == "aviation" ? "show active" : "" }}" id="aviation" role="tabpanel" aria-labelledby="aviation-tab">
                    <h2 class="tab-pane_heading-sm_and_after">Авиация</h2>
                <div class="maps-page_white-window">
                    <h3>Обновите свои авиационные базы данных</h3>
                    <span>Чтобы купить и установить авиационные базы данных, войдите в свою учетную запись flyGarmin. Если у вас его нет, вы можете создать его бесплатно.</span>
                    <div class="maps-page_button-block d-flex align-center justify-center mh-1">
                        <a href="https://fly.garmin.com/fly-garmin/" class="maps-page_button">Возми с собой в полет</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade {{ $parametr == "outdoor" ? "show active" : "" }}"  id="outdoor" role="tabpanel" aria-labelledby="outdoor-tab">
                    <h2 class="tab-pane_heading-sm_and_after">Внешний</h2>
                <div class="maps-page_white-window">
                    <h3>Добавьте карту для себя</h3>
                    <span>Добавьте карты к своему устройству на открытом воздухе, чтобы вести вас в следующем приключении, будь то походы, прогулки, езда на велосипеде или катание на лыжах.</span>
                    <div class="maps-page_button-block d-flex align-center justify-center mh-1">
                        <a href="https://fly.garmin.com/fly-garmin/" class="maps-page_button">Магазин наружных карт</a>
                    </div>
                </div>
            
            </div>
            <div class="tab-pane fade {{ $parametr == "cycling" ? "show active" : "" }}" id="cycling" role="tabpanel" aria-labelledby="cycling-tab">
                <h2 class="tab-pane_heading-sm_and_after">Велосипед</h2>
                <div class="maps-page_white-window">
                    <h3>Обновления для фитнес-устройств</h3>
                    <h5>У вас еще нет карт?</h5>
                    <span>Получите карты улиц на своем Edge для безопасной и эффективной навигации во время тренировок, путешествий или поездок на работу. Или добавьте топографические карты в свой Edge для яркой детализации контуров местности и информации о высоте. </span>
                    <p><a href="https://buy.garmin.com/en-US/US/c452-c456-c11661-p1.html">Карты улиц</a>|<a href="http://www.garmin.com/en-US/maps/outdoor">Карты тропинок</a> </p>
                    <hr>
                    <h5>Нужно обновить существующие карты?</h5>
                    <span>В настоящее время мы предлагаем обновления карт для карт CityNavigator и Garmin Cycle Maps. Если вы добавили карты City Navigator в формате DVD на совместимое с картами фитнес-устройство, вам необходимо загрузить настольное приложение <a href="http://software.garmin.com/express.html">Garmin Express</a> , чтобы обновить карты циклов, поставляемые с вашим устройством.</span>
                </div>


            </div>
        </div>

    </div>
</div>
@endsection