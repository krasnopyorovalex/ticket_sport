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

            <form action="{{ route('admin.matches.update', ['id' => $match->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="stadium">Стадион:</label>
                            <select class="form-control border-blue border-xs select-search" id="stadium" name="stadium_id" data-width="100%">
                                @foreach ($stadiums as $stadium)
                                    <option value="{{ $stadium->id }}"{{ $stadium->id === $match->stadium_id ? ' selected' : ''}}>
                                        {{ $stadium->name }}, {{ $stadium->location }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="start_datetime">Время начала матча:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                            <input type="text" class="form-control" id="start_datetime" value="{{ $match->start_datetime }}" name="start_datetime">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stage_id">Этап матча:</label>
                            <select class="form-control border-blue border-xs select-search" id="stage_id" name="stage_id" data-width="100%">
                                @foreach ($stages as $stageItem)
                                    <option value="{{ $stageItem->id }}" {{ $match->stage->id === $stageItem->id ? 'selected' : '' }}>{{ $stageItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="team_first">Первая команда:</label>
                            <select class="form-control border-blue border-xs select-search" id="team_first" name="team_first_id" data-width="100%">
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}"{{ $match->teamFirst->id === $team->id ? ' selected' : ''}}>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="team_second">Вторая команда:</label>
                            <select class="form-control border-blue border-xs select-search" id="team_second" name="team_second_id" data-width="100%">
                                <option value="">Не выбрано</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}"{{ $match->teamSecond && $match->teamSecond->id === $team->id ? ' selected' : ''}}>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @textarea(['name' => 'text', 'label' => 'Текст'])
                        @checkbox(['name' => 'status', 'label' => 'Активен?', 'entity' => $match])
                        @checkbox(['name' => 'is_popular', 'label' => 'Популярный матч?', 'entity' => $match])
                        @submit_btn()
                    </div>
                </div>
            </form>

        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/anytime.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/picker_date.js') }}"></script>
    @endpush
@endsection
