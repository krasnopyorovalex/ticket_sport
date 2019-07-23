@if(count($matches))
    @foreach($matches as $match)
        @include('layouts.partials.match', ['match' => $match])
    @endforeach
@else
    <div class="match_schedule-row not_results">
        <p>Событий нет</p>
    </div>
@endif
