@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Стадионы</li>
@endsection

@section('content')

    <a href="{{ route('admin.stadiums.create') }}" type="button" class="btn bg-primary">
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
            @foreach($stadiums as $stadium)
                <tr data-id="{{ $stadium->id }}">
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $stadium->name }}</td>
                    <td>
                        @if($stadium->image)
                            <img src="{{ $stadium->image->path }}" alt="" width="30px">
                        @endif
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('admin.stadiums.edit', $stadium) }}"><i class="icon-pencil7"></i></a>
                            <a href="{{ route('admin.stadium_places.index', ['stadium' => $stadium]) }}" data-original-title="Места" data-popup="tooltip"><i class="icon-lan2"></i></a>
                            <form method="POST" action="{{ route('admin.stadiums.destroy', $stadium) }}" class="form__delete">
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
