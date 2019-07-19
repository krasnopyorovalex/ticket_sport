<section class="popular_matches">
    <div class="container">
        <div class="owl-carousel owl-theme matches_carousel popular_matches-carousel">
            @foreach($popularMatches as $popularMatch)
                <div class="popular_matches-carousel-item">
                    <div class="match_date-time">
                        {{ $popularMatch->start_datetime }}
                    </div>
                    <div class="match_commands">
                        <div>
                            {{ $popularMatch->teamFirst->name }}
                            @if($popularMatch->teamFirst->image)
                            <img src="{{ $popularMatch->teamFirst->image->path }}" alt="{{ $popularMatch->teamFirst->alt }}" title="{{ $popularMatch->teamFirst->image->title }}">
                            @endif
                        </div>
                        <div class="match_commands-delimiter">
                            -
                        </div>
                        <div>
                            @if($popularMatch->teamSecond->image)
                                <img src="{{ $popularMatch->teamSecond->image->path }}" alt="{{ $popularMatch->teamSecond->alt }}" title="{{ $popularMatch->teamSecond->image->title }}">
                            @endif
                            {{ $popularMatch->teamSecond->name }}
                        </div>
                    </div>
                    <div class="match_stadium">
                        @if($popularMatch->stadium)
                            {{ $popularMatch->stadium->name }}
                        @endif
                    </div>
                    <div class="match_country">
                        @if($popularMatch->stadium)
                            {{ $popularMatch->stadium->location }}
                            @if($popularMatch->stadium->image)
                                <img src="{{ $popularMatch->stadium->image->path }}" alt="{{ $popularMatch->stadium->image->alt }}" title="{{ $popularMatch->stadium->image->title }}">
                            @endif
                        @endif
                    </div>
                    <div class="match_order">
                        <div class="btn btn_order call_form-order call_form-order">
                            <svg>
                                <use xlink:href="{{ asset('img/sprites/sprite.svg#tickets') }}"></use>
                            </svg>
                            Купить билет
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
