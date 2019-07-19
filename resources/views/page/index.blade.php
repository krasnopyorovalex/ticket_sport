@extends('layouts.app')

@section('title', 'Ticket Group')
@section('description', 'Ticket Group')
@push('og')
<meta property="og:title" content="Ticket Group">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:description" content="Ticket Group">
    <meta property="og:site_name" content="Продажа билетов на спортивные мероприятия">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    @includeWhen(count($popularMatches), 'layouts.sections.popular_matches', ['popularMatches' => $popularMatches])

    @includeWhen(count($championships), 'layouts.sections.scoreboard', ['championships' => $championships])

    <section class="match_schedule">
        <div class="container">
            <div class="match_schedule-row">
                <div class="time">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#timer"></use>
                    </svg>
                    18.09.2018
                    <span>12:55</span>
                </div>
                <div class="commands">
                    <div>
                        <img src="../img/villarreal.png" alt="Вильярреал">
                        <span>Вильярреал</span>
                    </div>
                    <div>-</div>
                    <div>
                        <span>Реал Мадрид</span>
                        <img src="../img/Real_Madrid.png" alt="Реал Мадрид">
                    </div>
                </div>
                <div class="location">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#location"></use>
                    </svg>
                    Милан (Италия)
                    <span>Стадион: Джузеппе Меацца (Сан Сиро)</span>
                </div>
                <div class="order">
                    <div class="btn btn_order">
                        <svg>
                            <use xlink:href="../img/sprites/sprite.svg#tickets"></use>
                        </svg>
                        Билеты
                    </div>
                </div>
            </div>
            <div class="match_schedule-row">
                <div class="time">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#timer"></use>
                    </svg>
                    18.09.2018
                    <span>12:55</span>
                </div>
                <div class="commands">
                    <div>
                        <img src="../img/Real_Madrid.png" alt="Реал Мадрид">
                        <span>Реал Мадрид</span>
                    </div>
                    <div>-</div>
                    <div>
                        <span>Барселона</span>
                        <img src="../img/barselona.png" alt="Барселона">
                    </div>
                </div>
                <div class="location">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#location"></use>
                    </svg>
                    Барселона (Испания)
                    <span>Стадион: Камп Ноу</span>
                </div>
                <div class="order">
                    <div class="btn btn_order">
                        <svg>
                            <use xlink:href="../img/sprites/sprite.svg#tickets"></use>
                        </svg>
                        Билеты
                    </div>
                </div>
            </div>
            <div class="match_schedule-row">
                <div class="time">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#timer"></use>
                    </svg>
                    18.09.2018
                    <span>12:55</span>
                </div>
                <div class="commands">
                    <div>
                        <img src="../img/villarreal.png" alt="Вильярреал">
                        <span>Вильярреал</span>
                    </div>
                    <div>-</div>
                    <div>
                        <span>Реал Мадрид</span>
                        <img src="../img/Real_Madrid.png" alt="Реал Мадрид">
                    </div>
                </div>
                <div class="location">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#location"></use>
                    </svg>
                    Ливерпуль (Англия)
                    <span>Стадион: Энфилд</span>
                </div>
                <div class="order">
                    <div class="btn btn_order">
                        <svg>
                            <use xlink:href="../img/sprites/sprite.svg#tickets"></use>
                        </svg>
                        Билеты
                    </div>
                </div>
            </div>
            <div class="match_schedule-row">
                <div class="time">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#timer"></use>
                    </svg>
                    18.09.2018
                    <span>12:55</span>
                </div>
                <div class="commands">
                    <div>
                        <img src="../img/Real_Madrid.png" alt="Реал Мадрид">
                        <span>Монако</span>
                    </div>
                    <div>-</div>
                    <div>
                        <span>Атлетико Мадрид</span>
                        <img src="../img/barselona.png" alt="Барселона">
                    </div>
                </div>
                <div class="location">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#location"></use>
                    </svg>
                    Брюгге (Бельгия)
                    <span>Стадион: Ян Брейдел Стадион</span>
                </div>
                <div class="order">
                    <div class="btn btn_order">
                        <svg>
                            <use xlink:href="../img/sprites/sprite.svg#tickets"></use>
                        </svg>
                        Билеты
                    </div>
                </div>
            </div>
            <div class="match_schedule-row">
                <div class="time">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#timer"></use>
                    </svg>
                    18.09.2018
                    <span>12:55</span>
                </div>
                <div class="commands">
                    <div>
                        <img src="../img/villarreal.png" alt="Вильярреал">
                        <span>Брюгге</span>
                    </div>
                    <div>-</div>
                    <div>
                        <span>Боруссия Дортмунд</span>
                        <img src="../img/Real_Madrid.png" alt="Реал Мадрид">
                    </div>
                </div>
                <div class="location">
                    <svg>
                        <use xlink:href="../img/sprites/sprite.svg#location"></use>
                    </svg>
                    Фонвьей (Монако)
                    <span>Стадион: Луи II</span>
                </div>
                <div class="order">
                    <div class="btn btn_order">
                        <svg>
                            <use xlink:href="../img/sprites/sprite.svg#tickets"></use>
                        </svg>
                        Билеты
                    </div>
                </div>
            </div>
            <div class="match_schedule-row">
                <div>
                    <div class="btn btn_more">
                        Показать еще
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="about" class="simple_text">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="seo_text">
                        <h2>Почему нас выбирают самые требовательные клиенты</h2>
                        <ul>
                            <li>мы любим и понимаем футбол</li>
                            <li>подбираем лучшие места на стадионах Европы и Латинской Америки</li>
                            <li>гарантируем бронирование выбранных секторов</li>
                            <li>организуем быструю доставку билетов</li>
                            <li>берем на себя оформление документов, сопровождение в посольствах</li>
                        </ul>
                        <p>И еще немного о  нас:</p>
                        <ul>
                            <li>мы работаем в сфере спортивного туризма с 2002 года</li>
                            <li>более 170 000 болельщиков съездили с нами на чемпионаты, матчи, раунды</li>
                            <li>около 100 000 индивидуальных спортивных туров в нашей копилке</li>
                            <li>ваши яркие впечатления, бурные эмоции и незабываемый отдых - гарантированы</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map" id="contacts">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <iframe src="https://yandex.ru/map-widget/v1/-/CCDAYMJi" width="100%" height="454" frameborder="0" allowfullscreen="true"></iframe>
                </div>
                <div class="col-4">
                    @include('layouts.forms.recall')
                </div>
            </div>
        </div>
    </section>
    <section class="section_default">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main_slider owl-carousel owl-theme">
                        <div class="main_slider-item">
                            <img src="../img/slider_01.jpg" alt="slide 1">
                        </div>
                        <div class="main_slider-item">
                            <img src="../img/slider_02.jpg" alt="slide 2">
                        </div>
                        <div class="main_slider-item">
                            <img src="../img/slider_03.jpg" alt="slide 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
