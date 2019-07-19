@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.stadiums.index') }}">Стадионы</a></li>
    <li><a href="{{ route('admin.stadium_places.index', ['stadium' => $stadiumPlace->stadium->id]) }}">{{ $stadiumPlace->stadium->name }}</a></li>
    <li class="active">Форма редактирования места</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования места</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.stadium_places.update', ['id' => $stadiumPlace->id]) }}" method="post" enctype="multipart/form-data">
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
                                    @input(['name' => 'name', 'label' => 'Название', 'entity' => $stadiumPlace])

                                    <div class="form-group">
                                        <label for="f_color">Цвет фона:</label>
                                        <input type="text" name="color" class="form-control colorpicker-show-input" id="f_color" data-preferred-format="hex" value="{{ $stadiumPlace->color }}" data-fouc>
                                    </div>

                                    @submit_btn()
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/color/spectrum.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/picker_color.js') }}"></script>
    @endpush
@endsection
