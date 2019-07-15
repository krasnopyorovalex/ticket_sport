@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.championships.index') }}">Чемпионаты</a></li>
    <li class="active">Форма добавления чемпионата</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления чемпионата</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.championships.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @input(['name' => 'name', 'label' => 'Название'])

                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                @submit_btn()
            </form>

        </div>
    </div>
@endsection
