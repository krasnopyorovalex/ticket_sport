<div class="container">
    <div class="row">
        <div class="box_popup">
            <div class="box_popup-image">
                @if($match->stadium->image)
                <img src="{{ $match->stadium->image->path }}" alt="{{ $match->stadium->image->alt }}" title="{{ $match->stadium->image->title }}">
                @endif
            </div>
            <div class="box_popup-content">
                <div class="close">
                    <svg>
                        <use xlink:href="{{ asset('img/sprites/sprite.svg#close') }}"></use>
                    </svg>
                </div>
                <div class="tickets">
                    @if(count($match->matchPlaces))
                        @foreach($match->matchPlaces as $place)
                            <div class="tickets_item">
                                <div class="line_left" style="background-color: {{ $place->stadiumPlace->color }}"></div>
                                <div class="tickets_item-name">
                                    {{ $place->stadiumPlace->name }}
                                </div>
                                <div class="tickets_item-price">
                                    {{ $place->price }}
                                </div>
                                <div class="tickets_item-count">
                                    <div class="tickets_item-count-box">
                                        <span class="minus">-</span>
                                        <div class="tickets_count">1</div>
                                        <span class="plus">+</span>
                                    </div>
                                </div>
                                <div class="tickets_item-order">
                                    <div class="btn btn_order call_form-order" data-match="{{ $match->teamFirst->name }} - {{ $match->teamSecond ? $match->teamSecond->name : '?' }}" data-ticket="{{ $place->stadiumPlace->name }}" data-time="{{ $match->date }} {{ $match->time }}">
                                        Оформить заказ
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
