@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.teams.index') }}">Команды</a></li>
    <li class="active">Форма добавления команды</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления команды</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @input(['name' => 'name', 'label' => 'Название'])

                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                @submit_btn()
            </form>

        </div>
    </div>
@endsection
