@foreach($matches as $match)
    @include('layouts.partials.match', ['match' => $match])
@endforeach
