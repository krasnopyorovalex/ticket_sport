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
            @includeWhen(count($matches), 'layouts.sections.matches', ['matches' => $matches])
            {{ $matches->links() }}
        </div>
    </section>

    <section id="about" class="simple_text">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="seo_text">
                       {!! $textBlocks->get('main_text') !!}
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
    @includeWhen(count($slider->images), 'layouts.sections.slider', ['images' => $slider->images])
@endsection
