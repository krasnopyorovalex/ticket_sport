@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.stadiums.index') }}">Стадионы</a></li>
    <li><a href="{{ route('admin.stadium_places.index', ['stadium' => $stadium->id]) }}">{{ $stadium->name }}</a></li>
    <li class="active">Форма добавления места</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления места</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.stadium_places.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $stadium->id }}" name="stadium_id">

                @input(['name' => 'name', 'label' => 'Название'])

                <div class="form-group">
                    <label for="f_color">Цвет фона:</label>
                    <input type="text" name="color" class="form-control colorpicker-show-input" id="f_color" data-preferred-format="hex" value="#f75d1c" data-fouc>
                </div>

                @submit_btn()
            </form>

        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/color/spectrum.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/picker_color.js') }}"></script>
    @endpush
@endsection
