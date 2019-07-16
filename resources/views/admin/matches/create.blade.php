@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.championships.index') }}">Чемпионаты</a></li>
    <li><a href="{{ route('admin.stages.index', ['championship' => $stage->championship->id]) }}">{{ $stage->championship->name }}</a></li>
    <li><a href="{{ route('admin.matches.index', ['stage' => $stage->id]) }}">{{ $stage->name }}</a></li>
    <li class="active">Матчи</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления матча</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.matches.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @input(['name' => 'name', 'label' => 'Название'])

                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                @submit_btn()
            </form>

        </div>
    </div>
@endsection
