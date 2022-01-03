
<div id="contact-form" class="form-container">
    <a href="#" class="close-contact"><img src="images/wrong.svg" width="20px" height="20px"></a>
    <form id="form_contact"  action="{{ route('send_msg') }}" method="post">
        {{ csrf_field() }}
        <h1>Оставьте свой отзыв или пожелания!</h1>
        <div class="form-items">
            <div class="form-control-contact">
                <div class="button-holders">Имя</div>
                <input type="text" name="name" autocomplete="off"/>
            </div>
            <div class="form-control-contact">
                <div class="button-holders">Email</div>
                <input type="email" name="email" autocomplete="off"/>
            </div>
            <div class="form-control-contact">
                <div class="button-holders">Сообщение</div>
                <input type="text" name="message" autocomplete="off"/>
            </div>
        </div>
        <div style="width: 100%;     display: flex;">
            <button id="submit" type="submit" class="btn btn-green">Отправить</button>
        </div>
    </form>
    <h1 id="success-msg" style="display: none;">Спасибо</br>Сообщение отправлено.</h1>
</div>
