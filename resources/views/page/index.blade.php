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

@endsection
