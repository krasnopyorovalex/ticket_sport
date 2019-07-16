@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.stadiums.index') }}">Чемпионаты</a></li>
    <li><a href="{{ route('admin.stages.index', ['stadium' => $championship->id]) }}">{{ $championship->name }}</a></li>
    <li class="active">Форма добавления этапа</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления этапа</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.stages.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $championship->id }}" name="championship_id">

                @input(['name' => 'name', 'label' => 'Название'])

                @submit_btn()
            </form>

        </div>
    </div>
@endsection
