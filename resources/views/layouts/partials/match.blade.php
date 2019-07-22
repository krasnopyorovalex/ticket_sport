<div class="match_schedule-row">
    <div class="time">
        <svg>
            <use xlink:href="{{ asset('img/sprites/sprite.svg#timer') }}"></use>
        </svg>
        {{ $match->date }}
        <span>{{ $match->time }}</span>
    </div>
    <div class="commands">
        <div>
            @if($match->teamFirst->image)
            <img src="{{ $match->teamFirst->image->path }}" alt="{{ $match->teamFirst->image->alt }}" title="{{ $match->teamFirst->image->title }}">
            @endif
            <span>{{ $match->teamFirst->name }}</span>
        </div>
        <div>-</div>
        <div>
            <span>{{ $match->teamSecond->name }}</span>
            @if($match->teamSecond->image)
                <img src="{{ $match->teamSecond->image->path }}" alt="{{ $match->teamSecond->image->alt }}" title="{{ $match->teamSecond->image->title }}">
            @endif
        </div>
    </div>
    <div class="location">
        <svg>
            <use xlink:href="{{ asset('img/sprites/sprite.svg#location') }}"></use>
        </svg>
        {{ $match->stadium->location }}
        <span>Стадион: {{ $match->stadium->name }}</span>
    </div>
    <div class="order">
        <div class="btn btn_order" data-match="{{ $match->id }}">
            <svg>
                <use xlink:href="{{ asset('img/sprites/sprite.svg#tickets') }}"></use>
            </svg>
            Билеты
        </div>
    </div>
</div>
