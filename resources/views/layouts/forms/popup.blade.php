<div id="container-popup" class="popup">
    <div class="container">
        <div class="row">
            <div class="box_popup-form">
                <div class="form_order">
                    <div class="close">
                        <svg>
                            <use xlink:href="{{ asset('img/sprites/sprite.svg#close') }}"></use>
                        </svg>
                    </div>
                    <form action="{{ route('send.order') }}" method="post">
                        @csrf
                        <div class="single_block">
                            <label for="form_filed-name">Имя Фамилия</label>
                            <input type="text" autocomplete="off" name="name" id="form_filed-name" required="" minlength="3">
                        </div>
                        <div class="single_block">
                            <label for="form_filed-phone">Телефон</label>
                            <input type="text" autocomplete="off" name="phone" id="form_filed-phone" class="field_phone" required="">
                        </div>
                        <div class="single_block">
                            <label for="form_filed-email">Email</label>
                            <input type="email" autocomplete="off" name="email" id="form_filed-email" required="">
                        </div>
                        <div class="single_block">
                            <label for="form_filed-match">Матч, дата</label>
                            <input type="text" class="match_info" autocomplete="off" name="match" id="form_filed-match" readonly required="">
                        </div>
                        <div class="single_block">
                            <label for="form_filed-ticket">Категория, количество</label>
                            <input type="text" class="ticket_info" autocomplete="off" name="ticket" id="form_filed-ticket" readonly required="">
                        </div>
                        <div class="single_block i_agree">
                            <input type="checkbox" name="agree" id="i_agree-popup" value="1" checked="checked">
                            <label for="i_agree-popup">Оставляя заявку, Вы соглашаетесь на обработку персональных данных</label>
                            <p class="error">Согласитесь на обработку персональных данных</p>
                        </div>
                        <div class="single_block submit">
                            <button type="submit" class="btn btn_order">Отправить заявку</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
