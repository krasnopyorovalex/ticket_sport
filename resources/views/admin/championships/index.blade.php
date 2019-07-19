@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Чемпионаты</li>
@endsection

@section('content')

    <a href="{{ route('admin.championships.create') }}" type="button" class="btn bg-primary">
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
            @foreach($championships as $championship)
                <tr data-id="{{ $championship->id }}">
                    <td>
                        <div class="media-left media-middle">
                            <i class="icon-move dragula-handle"></i>
                        </div>
                    </td>
                    <td>{{ $championship->name }}</td>
                    <td>
                        @if($championship->image)
                            <img src="{{ $championship->image->path }}" alt="" width="30px">
                        @endif
                    </td>
                    <td>
                        <div>
                            <a href="{{ route('admin.championships.edit', $championship) }}"><i class="icon-pencil7"></i></a>
                            <a href="{{ route('admin.stages.index', ['championship' => $championship->id]) }}" data-original-title="Этапы" data-popup="tooltip"><i class="icon-lan2"></i></a>
                            <form method="POST" action="{{ route('admin.championships.destroy', $championship) }}" class="form__delete">
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