<form class="make" action="{{ route('tasks') }}" method="post" style="width: 100%;">
    <div id="middle_box">
        <div class="calc_onlain">
            <div class="tablo">
                <div class="tablo_primer">
                    <div class="tablo_primer_text"></div>
                    <div class="tablo_primer_text_double"></div>
                    <div class="screen"></div>
                </div>
                <div class="tablo_result">
                    <div class="tablo_rezult_true">0</div>
                    <div class="tablo_text">Введите ответ</div>
                    <div class="tablo_rezult_false">0</div>
                </div>
                <div class="tablo_buttons">
                    <a href="#" class="btn-green-dark btn left"><img src="/images/arrow.svg" alt="" ></a>
                    <a href="#"  class="btn-green btn tablo_check_button">Ответить</a>
                    <a href="#"  class="btn-green-dark btn right"><img src="/images/arrow.svg" alt=""></a>
                </div>
            </div>
            <div id="calculator">
                <div class="keys">
                    <span class="btn btn-orange">1</span>
                    <span class="btn btn-orange">2</span>
                    <span class="btn btn-orange">3</span>
                    <span class="btn btn-orange">4</span>
                    <span class="btn btn-orange">5</span>
                    <span class="btn btn-orange">6</span>
                    <span class="btn btn-orange">7</span>
                    <span class="btn btn-orange">8</span>
                    <span class="btn btn-orange">9</span>
                    <span class="btn btn-orange">0</span>
                    <span class="clear btn btn-orange">C</span>
                </div>
            </div>
        </div>
        <div class="calc_rezult" style="display: none;">
            <div class="calc_rezult_text"></div>
            <div class="calc_rezult_button"><a href="/" class="btn-green btn">Молодец! Еще разок?
                    <svg aria-hidden="true" width="19px" focusable="false" data-prefix="fas" data-icon="redo-alt" role="img"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-redo-alt fa-w-16 fa-3x">
                        <path fill="currentColor" d="M256.455 8c66.269.119 126.437 26.233 170.859 68.685l35.715-35.715C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.75c-30.864-28.899-70.801-44.907-113.23-45.273-92.398-.798-170.283 73.977-169.484 169.442C88.764 348.009 162.184 424 256 424c41.127 0 79.997-14.678 110.629-41.556 4.743-4.161 11.906-3.908 16.368.553l39.662 39.662c4.872 4.872 4.631 12.815-.482 17.433C378.202 479.813 319.926 504 256 504 119.034 504 8.001 392.967 8 256.002 7.999 119.193 119.646 7.755 256.455 8z" class=""></path></svg></a></div>
        </div>
    </div>
    </br>
</form>
