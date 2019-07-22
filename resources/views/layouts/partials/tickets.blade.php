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
                        <use xlink:href="../img/sprites/sprite.svg#close"></use>
                    </svg>
                </div>
                <div class="tickets">
                    <div class="tickets_item">
                        <div class="line_left" style="background-color: #66B28C;"></div>
                        <div class="tickets_item-name">
                            Суперпремиум
                        </div>
                        <div class="tickets_item-price">
                            10 220 руб
                        </div>
                        <div class="tickets_item-count">
                            <div class="tickets_item-count-box">
                                <span class="minus">-</span>
                                <div class="tickets_count">1</div>
                                <span class="plus">+</span>
                            </div>
                        </div>
                        <div class="tickets_item-order">
                            <div class="btn btn_order call_form-order" data-match="{{ $match->teamFirst->name }} - {{ $match->teamSecond->name }}"  data-time="{{ $match->date }} {{ $match->time }}">
                                Оформить заказ
                            </div>
                        </div>
                    </div>
                    <div class="tickets_item">
                        <div class="line_left" style="background-color: #E243DB;"></div>
                        <div class="tickets_item-name">
                            Премиум
                        </div>
                        <div class="tickets_item-price">
                            Под запрос
                        </div>
                        <div class="tickets_item-count">
                            <div class="tickets_item-count-box">
                                <span>-</span>
                                <div class="tickets_count">1</div>
                                <span>+</span>
                            </div>
                        </div>
                        <div class="tickets_item-order">
                            <div class="btn btn_order call_form-order">
                                Оформить заказ
                            </div>
                        </div>
                    </div>
                    <div class="tickets_item">
                        <div class="line_left" style="background-color: #E14B45;"></div>
                        <div class="tickets_item-name">
                            1 категория
                        </div>
                        <div class="tickets_item-price">
                            25 000 руб
                        </div>
                        <div class="tickets_item-count">
                            <div class="tickets_item-count-box">
                                <span>-</span>
                                <div class="tickets_count">1</div>
                                <span>+</span>
                            </div>
                        </div>
                        <div class="tickets_item-order">
                            <div class="btn btn_order call_form-order">
                                Оформить заказ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
