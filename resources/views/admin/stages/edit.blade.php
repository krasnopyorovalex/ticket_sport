@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.stadiums.index') }}">Чемпионаты</a></li>
    <li><a href="{{ route('admin.stages.index', ['stadium' => $stage->championship->id]) }}">{{ $stage->championship->name }}</a></li>
    <li class="active">Форма редактирования места</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования места</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.stages.update', ['id' => $stage->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-12">
                        @input(['name' => 'name', 'label' => 'Название', 'entity' => $stage])

                        @submit_btn()
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
