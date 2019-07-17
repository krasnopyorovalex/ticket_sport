@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.championships.index') }}">Чемпионаты</a></li>
    <li><a href="{{ route('admin.stages.index', ['championship' => $stage->championship->id]) }}">{{ $stage->championship->name }}</a></li>
    <li class="active">{{ $stage->name }}</li>
@endsection

@section('content')

    <a href="{{ route('admin.matches.create', ['stage' => $stage]) }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Команды матча</th>
                <th>Стадион</th>
                <th>Время начала матча</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($matches as $match)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>
                        <span class="label {{ ! $match->status ? 'label-danger not_active' : 'label-primary' }}">
                            {{ $match->teamFirst->name }} - {{ $match->teamSecond ? $match->teamSecond->name : '?' }}
                        </span>
                    </td>
                    <td><span class="label label-default">{{ $match->stadium->name}}</span></td>
                    <td><span class="label label-success">{{ $match->start_datetime }}</span></td>
                    <td>
                        <div>
                            <a href="{{ route('admin.matches.edit', $match) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.matches.destroy', $match) }}" class="form__delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="last__btn">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
