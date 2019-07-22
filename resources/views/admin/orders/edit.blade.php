@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.orders.index') }}">Текстовые блоки</a></li>
    <li class="active">Форма редактирования текстовые блока</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования текстовые блока</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.orders.update', $order) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            @input(['name' => 'match', 'label' => 'Матч', 'entity' => $order])
                            @textarea(['name' => 'body', 'label' => 'Текст заявки', 'entity' => $order])

                            @submit_btn()
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@push('scripts')
    <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
@endpush

@endsection
