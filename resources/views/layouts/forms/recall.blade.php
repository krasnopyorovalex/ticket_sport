<div class="form_recall-box">
    <div class="title">Обратный звонок</div>
    <form action="#" method="post">
        @csrf
        <div class="single_block">
            <input type="text" name="name" placeholder="Введите имя" autocomplete="off">
        </div>
        <div class="single_block">
            <input type="text" name="phone" class="field_phone" autocomplete="off">
        </div>
        <div class="single_block">
            <input type="text" name="time" placeholder="Удобное время звонка">
        </div>
        <div class="single_block">
            <textarea name="message" placeholder="Комментарий"></textarea>
        </div>
        <div class="single_block i_agree">
            <input type="checkbox" name="agree" id="i_agree" value="1" checked="checked">
            <label for="i_agree">Оставляя заявку, Вы соглашаетесь на обработку персональных данных</label>
            <p class="error">Согласитесь на обработку персональных данных</p>
        </div>
        <div class="single_block submit">
            <button class="btn btn_recall">Отправить</button>
        </div>
    </form>
</div>
