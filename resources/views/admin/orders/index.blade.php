@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Заказы</li>
@endsection

@section('content')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Матч</th>
                <th>Дата и время заказа</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $order->match }}</td>
                    <td><span class="label label-primary bg-teal-400">{{ $order->created_at }}</span></td>
                    <td>
                        <div>
                            <a href="{{ route('admin.orders.edit', $order) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" class="form__delete">
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
