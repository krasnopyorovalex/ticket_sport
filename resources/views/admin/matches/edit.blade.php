@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.championships.index') }}">Чемпионаты</a></li>
    <li><a href="{{ route('admin.stages.index', ['championship' => $match->stage->championship->id]) }}">{{ $match->stage->championship->name }}</a></li>
    <li><a href="{{ route('admin.matches.index', ['stage' => $match->stage->id]) }}">{{ $match->stage->name }}</a></li>
    <li class="active">Матчи</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования матча</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.matches.update', ['id' => $team->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            <div class="row">
                                <div class="col-md-12">
                                    @input(['name' => 'name', 'label' => 'Название', 'entity' => $team])
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @if ($team->image)
                                        <div class="panel panel-flat border-blue border-xs" id="image__box">
                                            <div class="panel-body">
                                                <img src="{{ asset($team->image->path) }}" alt="" class="upload__image">

                                                <div class="btn-group btn__actions">
                                                    <button data-toggle="modal" data-target="#modal_info" type="button" class="btn btn-primary btn-labeled btn-sm"><b><i class="icon-pencil4"></i></b> Атрибуты</button>

                                                    <button type="button" data-href="{{ route('admin.images.destroy', ['id' => $team->image->id]) }}" class="btn delete__img btn-danger btn-labeled btn-labeled-right btn-sm">Удалить <b><i class="icon-trash"></i></b></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @imageInput(['name' => 'image', 'type' => 'file', 'entity' => $team, 'label' => 'Выберите изображение на компьютере'])
                                    @submit_btn()
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    @if ($team->image)
        @include('layouts.partials._image_attributes_popup', ['image' => $team->image])
    @endif
@endsection
