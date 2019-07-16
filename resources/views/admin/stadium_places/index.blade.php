@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.stadiums.index') }}">Стадионы</a></li>
    <li class="active">{{ $stadium->name }}</li>
@endsection

@section('content')

    <a href="{{ route('admin.stadium_places.create', ['stadium' => $stadium]) }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Название</th>
                <th>Стадион</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="table__dnd">
            @foreach($stadiumPlaces as $stadiumPlace)
                <tr data-id="{{ $stadiumPlace->id }}">
                    <td>
                        <div class="media-left media-middle">
                            <i class="icon-move dragula-handle"></i>
                        </div>
                    </td>
                    <td><span class="label" style="background-color: {{ $stadiumPlace->color }}">{{ $stadiumPlace->name }}</span></td>
                    <td><span class="label label-primary bg-teal-400">{{ $stadiumPlace->stadium->name }}</span></td>
                    <td>
                        <div>
                            <a href="{{ route('admin.stadium_places.edit', $stadiumPlace) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.stadium_places.destroy', $stadiumPlace) }}" class="form__delete">
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
    @push('scripts')
        <script src="{{ asset('dashboard/assets/js/plugins/ui/dragula.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/extension_dnd.js') }}"></script>
    @endpush
@endsection
