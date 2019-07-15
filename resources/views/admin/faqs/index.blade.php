@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Faq</li>
@endsection

@section('content')

    <a href="{{ route('admin.faqs.create') }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Вопрос</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($faqs as $faq)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $faq->question }}</td>
                    <td>
                        <div>
                            <a href="{{ route('admin.faqs.edit', $faq) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="form__delete">
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
