@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.stadiums.index') }}">Чемпионаты</a></li>
    <li class="active">{{ $championship->name }}</li>
@endsection

@section('content')

    <a href="{{ route('admin.stages.create', ['championship' => $championship]) }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Название</th>
                <th>Чемпионат</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="table__dnd">
            @foreach($stages as $stage)
                <tr data-id="{{ $stage->id }}">
                    <td>
                        <div class="media-left media-middle">
                            <i class="icon-move dragula-handle"></i>
                        </div>
                    </td>
                    <td>{{ $stage->name }}</td>
                    <td><span class="label label-primary bg-teal-400">{{ $stage->championship->name }}</span></td>
                    <td>
                        <div>
                            <a href="{{ route('admin.stages.edit', $championship) }}"><i class="icon-pencil7"></i></a>
                            <a href="{{ route('admin.matches.index', ['stage' => $stage->id]) }}" data-original-title="Этапы" data-popup="tooltip"><i class="icon-lan2"></i></a>
                            <form method="POST" action="{{ route('admin.stages.destroy', $stage) }}" class="form__delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="last__btn">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr data-id="{{ $stage->id }}">
            @endforeach
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/assets/js/plugins/ui/dragula.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/extension_dnd.js') }}"></script>
    @endpush
@endsection
