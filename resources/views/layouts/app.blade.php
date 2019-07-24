<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', '')</title>
    <meta name="description" content="@yield('description', '')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}" type="image/png">
    <link rel="icon" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/favicons/apple-touch-icon-precomposed.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicons/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicons/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicons/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicons/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicons/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicons/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('img/favicons/apple-touch-icon-167x167.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="apple-touch-icon" sizes="1024x1024" href="{{ asset('img/favicons/apple-touch-icon-1024x1024.png') }}">
    @stack('og')
    <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    <link rel="canonical" href="@yield('canonical', request()->url())"/>
</head>
<body>
    <header>
        <div class="container">
            <div class="top_line">
                <div class="top_line-name">
                    Билеты на Чемпионат Испании по футболу (Laliga)
                </div>
                <div class="top_line-contacts">
                    <div>
                        <a href="tel:+74955438956">+7 (495) 543 89 56</a>,
                        <a href="tel:+74959816589">+7 (495) 981 65 89</a>,
                        <a href="tel:+79859221188">+7 (985) 922 11 88
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#viber"></use>
                            </svg>
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#whatsapp"></use>
                            </svg>
                        </a>
                    </div>
                    <div>
                        Представительство в Испании:
                        <a href="tel:+34666809481">+34 666 80 94 81
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#viber"></use>
                            </svg>
                            <svg>
                                <use xlink:href="../img/sprites/sprite.svg#whatsapp"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="logo_box">
                <div class="logo_box-img">
                    <a href="{{ route('page.show') }}">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Ticket Group">
                    </a>
                </div>
                <div class="logo_box-search">
                    <form action="{{ route('api.search') }}" method="post">
                        @csrf
                        <div class="single_block">
                            <input type="text" name="keyword" autocomplete="off" placeholder="Введите название команды" required="" minlength="3">
                            <i class="icon icon_search"></i>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="sticky" class="section_menu">
        <div class="container">
            <div class="menu">
                <div class="menu_box">
                    <div class="close-menu-btn"></div>
                    <ul class="menu_box-header">
                        <li data-target="matches">Матчи</li>
                        <li data-target="">Купить билеты</li>
                        <li data-target="about">О нас</li>
                        <li data-target="contacts">Контакты</li>
                    </ul>
                    <div class="menu_box-socials-box">
                        @include('layouts.partials.socials')
                    </div>
                    <div class="burger-menu">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="logo_company">
                        <img src="{{ asset('img/logo.svg') }}" alt="TicketGroup">
                        TicketGroup
                    </div>
                    <div class="form_subscribe">
                        <form action="{{ route('send.subscribe') }}" method="post">
                            <div class="single_block email">
                                <svg>
                                    <use xlink:href="{{ asset('img/sprites/sprite.svg#mail') }}"></use>
                                </svg>
                                <input type="email" name="email" placeholder="" autocomplete="off" required="">
                            </div>
                            <div class="single_block submit">
                                <button type="submit" class="btn btn_subscribe">Подписаться</button>
                            </div>
                        </form>
                    </div>
                    <div class="payment_methods">
                        <svg>
                            <use xlink:href="{{ asset('img/sprites/sprite.svg#american-express') }}"></use>
                        </svg>
                        <svg>
                            <use xlink:href="{{ asset('img/sprites/sprite.svg#visa') }}"></use>
                        </svg>
                        <svg>
                            <use xlink:href="{{ asset('img/sprites/sprite.svg#mastercard') }}"></use>
                        </svg>
                    </div>
                </div>
                <div class="col-6 text_center">
                    <div class="contacts">
                        <div class="address">
                            <div>Адрес:</div>
                            <div>2nd Shchemilovskiy lane,<br>
                                4, Moscow, 127473, Russia</div>
                        </div>
                        <div class="phones">
                            <div>Телефоны:</div>
                            <div><a href="#">+7 (495) 543 89 56</a></div>
                            <div><a href="#">+7 (495) 981 65 80</a></div>
                            <div><a href="#"> +7 (985) 922 11 88 (WhatsApp, Viber)</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <ul class="f_menu">
                        <li data-target="matches">Матчи</li>
                        <li data-target="">Купить билеты</li>
                        <li data-target="about">О нас</li>
                        <li data-target="">Контакты</li>
                    </ul>
                    <div class="f_socials">
                        @include('layouts.partials.socials')
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('layouts.forms.popup')
    <div class="popup_tickets"></div>
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/vendor.min.js') }}"></script>
</body>
</html>
