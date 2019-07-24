@if(count($matches))
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
                        <a href="{{ route('admin.matches.edit', $match) }}" class="last__btn" target="_blank"><i class="icon-pencil7"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
<p>Результов нет</p>
@endif
