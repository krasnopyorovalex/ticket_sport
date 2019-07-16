@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Команды</li>
@endsection

@section('content')

    <a href="{{ route('admin.teams.create') }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Название</th>
                <th>Изображение</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="table__dnd">
            @foreach($teams as $team)
                <tr data-id="{{ $team->id }}">
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $team->name }}</td>
                    <td>
                        @if($team->image)
                            <img src="{{ $team->image->path }}" alt="" width="30px">
                        @endif
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('admin.teams.edit', $team) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.teams.destroy', $team) }}" class="form__delete">
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
