@extends('layouts.admin')

@section('content')

    <div class="panel panel-flat search_box">
        <div class="panel-body">
            <legend class="text-uppercase font-size-sm font-weight-bold">Поиск матчей</legend>
            <div class="content-group">
                <form action="{{ route('admin.search') }}" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-lg-5">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Введите минимум три символа" minlength="3" required="" name="keyword">
                                <span class="input-group-addon"><i class="icon-search4"></i></span>
                            </div>
                        </div>
                        <label class="control-label col-lg-7" data-action="reload">Введите команду, чемпионат или стадион</label>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="panel panel-flat">
        <div class="panel-body">
            <div id="search_results"></div>
        </div>
    </div>

@endsection
