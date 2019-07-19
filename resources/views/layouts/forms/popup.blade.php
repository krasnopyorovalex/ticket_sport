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
                    <form action="#" method="post">
                        @csrf
                        <div class="single_block">
                            <label for="form_filed-name">Имя Фамилия</label>
                            <input type="text" autocomplete="off" name="name" id="form_filed-name">
                        </div>
                        <div class="single_block">
                            <label for="form_filed-phone">Телефон</label>
                            <input type="text" autocomplete="off" name="phone" id="form_filed-phone" class="field_phone">
                        </div>
                        <div class="single_block">
                            <label for="form_filed-email">Email</label>
                            <input type="email" autocomplete="off" name="email" id="form_filed-email">
                        </div>
                        <div class="single_block">
                            <label for="form_filed-match">Матч, дата и категория</label>
                            <input type="email" autocomplete="off" name="match" id="form_filed-match">
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
