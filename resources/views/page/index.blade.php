@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
<meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($page->image ? $page->image->path : 'img/logo.jpg') }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

@endsection
