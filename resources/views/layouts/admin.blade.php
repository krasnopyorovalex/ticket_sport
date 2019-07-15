<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Административная панель управления сайтом - ООО «Красбер»</title>

    <!-- Styles -->
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/components.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/colors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/assets/css/override.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.home') }}"><img src="{{ asset('dashboard/assets/images/logo.png') }}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">

        <p class="navbar-text"><span class="label bg-success">Online</span></p>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('dashboard/assets/images/placeholder.png') }}" alt="">
                    <span>{{{ Auth::user()->name }}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="#" id="logout-btn"><i class="icon-switch2"></i> Выйти</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li class="navigation-header"><span>Навигация</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li><a href="{{ route('admin.pages.index') }}"><i class="icon-compose"></i> <span>Страницы</span></a></li>
                            <li><a href="{{ route('admin.abouts.index') }}"><i class="icon-magazine"></i> <span>О нас</span></a></li>
                            <li><a href="{{ route('admin.guestbooks.index') }}"><i class="icon-bubble2"></i> <span>Отзывы</span></a></li>
                            <li><a href="{{ route('admin.actions.index') }}"><i class="icon-bell3"></i> <span>Акции</span></a></li>
                            <li><a href="{{ route('admin.services.index') }}"><i class="icon-menu6"></i> <span>Услуги</span></a></li>
                            <li><a href="{{ route('admin.works.index') }}"><i class="icon-list-ordered"></i> <span>Наши работы</span></a></li>
                            <li><a href="{{ route('admin.faqs.index') }}"><i class="icon-question3"></i> <span>Faq</span></a></li>
                            <li><a href="{{ route('admin.sliders.index') }}"><i class="icon-images2"></i> <span>Слайдер</span></a></li>
                            <li><a href="{{ route('admin.galleries.index') }}"><i class="icon-images3"></i> <span>Галерея</span></a></li>
                            <li><a href="{{ route('admin.text_blocks.index') }}"><i class="icon-stack2"></i> <span>Текстовые-блоки</span></a></li>
                            <li><a href="{{ route('admin.redirects.index') }}"><i class="icon-transmission"></i> <span>Редиректы</span></a></li>
                            <!-- /main -->

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{ route('admin.home') }}"><i class="icon-home2 position-left"></i> Главная</a></li>
                        @section('breadcrumb')
                            <li class="active">Пропишите хлебные крошки</li>
                        @show
                    </ul>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

                @yield('content')

                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; <a href="https://krasber.ru" target="_blank">ООО «Красбер»</a> 2017 - {{ date('Y') }}
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<!-- Scripts -->
<script src="{{ asset('dashboard/assets/js/jquery.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/loaders/pace.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/libraries/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/loaders/blockui.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/notifications/pnotify.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/app.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/core/user_scripts.js') }}"></script>
@stack('scripts')
</body>
</html>
