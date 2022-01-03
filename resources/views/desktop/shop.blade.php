@extends('layouts.desktop')

@section('title')
    Отличный онлайн тренажер по математике
@endsection

@section('description')Скачать примеры и ребусы по математике. Ребенок может заниматься по 15 минут каждый день@endsection
@section('keywords')
    скачать примеры по математике 2 класс,
    скачать примеры по математике для дошкольников,
    примеры по математике 4 класс,
    примеры по математике 1 класс,
    примеры по математике 3 класс,
    задания по математике 1 класс на лето скачать,
    примеры по математике для дошкольников 6 7 лет,
    задачник по математике скачать,
    необычные задания по математике,
    задания по математике 2 класс,
    задания по математике 5 класс,
    задания по математике 1 класс,
    задания по математике 1 класс на лето,
    задания по математике 3 класс,
    задания по математике 6 класс,
    задания по математике для дошкольников,
@endsection

@section('header')Пособия и сборники упражнений по математике @endsection
@section('text')@endsection
@section('link')href="/shop"@endsection
@section('linktext')Магазин@endsection

@section('content')
    @include('desktop.includes.banner')
<div class='desktop' style="position:absolute; right:0;max-width: 350px;    top: 867px;">
        <!-- Yandex.RTB R-A-741366-7 -->
<div id="yandex_rtb_R-A-741366-7"></div>
<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-741366-7',
    blockId: 'R-A-741366-7'
  })
})</script>
    </div>
    <div class="desctop">
        <!-- Yandex.RTB R-A-741366-4 -->
<div id="yandex_rtb_R-A-741366-4"></div>
<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-741366-4',
    blockId: 'R-A-741366-4'
  })
})</script>
    </div>
    
    <div class='desktop' style="position:absolute; left:0;max-width: 350px;    top: 867px;">
        <!-- Yandex.RTB R-A-741366-8 -->
<div id="yandex_rtb_R-A-741366-8"></div>
<script>window.yaContextCb.push(()=>{
  Ya.Context.AdvManager.render({
    renderTo: 'yandex_rtb_R-A-741366-8',
    blockId: 'R-A-741366-8'
  })
})</script>
    </div>
    
    <!--Start Feature Area -->
    <section class="feature-area shop_block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h1>Сборник упражнений по математике, 1-2 класс<br> и для подготовке к школе</h1>
                        <p><b>Приобретайте сборники заданий</b>, примеров и упражнений на  различные темы, а также здесь можно скачать бесплатно обучающие пособия по математике.</p>
                        <p>   Сборники содержат разнообразный материал, примеры и задания для закрепления различных тем в начальной математике. Каждое пособие содержит более <b>300 заданий</b> </p>
                        <p>   Приобретая пособия у нас вы можете просто распечать его и начать заниматься. Понравиться - мы будем рады! Нашими сборниками уже скачали и пользуются более <b>1276 пользователей</b></p>
                        <p>   Каждодневное решение задач улучшает когнетивные способности мозга и благотворно влияет на развитие ребенка!</p>
                    </div>
                </div>
            </div>
            <div class="feature-inner row">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div style="display: flex"><img src="img/scale.svg" width="15%">
                            <h4>Сборник заданий и примеров на изучение мер массы</h4></div>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                            @if(!empty(Cookie::get('massa')))
                                <a href="{{Cookie::get('massa')}}" class="genric-btn primary">Скачать</a>
                            @else
                                @include('desktop.includes.pay_form',['mera'=>'massa'])
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div style="display: flex">
                            <svg aria-hidden="true" width="29%"  focusable="false" data-prefix="fal" data-icon="ruler" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-ruler fa-w-20 fa-2x"><path fill="#6ef588" d="M635.7 165.8L556.1 27.9C550.2 17.7 539.5 12 528.5 12c-5.4 0-10.9 1.4-15.9 4.3L15.9 302.8C.7 311.5-4.5 331 4.3 346.2L83.9 484c5.9 10.2 16.6 15.9 27.6 15.9 5.4 0 10.9-1.4 15.9-4.3L624 209.1c15.3-8.6 20.5-28.1 11.7-43.3zM111.5 468.2L31.9 330.3l69-39.8 43.8 75.8c2.2 3.8 7.1 5.1 10.9 2.9l13.8-8c3.8-2.2 5.1-7.1 2.9-10.9l-43.8-75.8 55.2-31.8 27.9 48.2c2.2 3.8 7.1 5.1 10.9 2.9l13.8-8c3.8-2.2 5.1-7.1 2.9-10.9l-27.9-48.2 55.2-31.8 43.8 75.8c2.2 3.8 7.1 5.1 10.9 2.9l13.8-8c3.8-2.2 5.1-7.1 2.9-10.9L294 179.1l55.2-31.8 27.9 48.2c2.2 3.8 7.1 5.1 10.9 2.9l13.8-8c3.8-2.2 5.1-7.1 2.9-10.9l-27.9-48.2L432 99.5l43.8 75.8c2.2 3.8 7.1 5.1 10.9 2.9l13.8-8c3.8-2.2 5.1-7.1 2.9-10.9l-43.8-75.8 69-39.8 79.6 137.8-496.7 286.7z" class=""></path></svg>
                            <h4>Сборник заданий и примеров на изучение мер длины</h4>
                        </div>

                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                            @if(!empty(Cookie::get('dllina')))
                                <a href="{{Cookie::get('dllina')}}" class="genric-btn primary">Скачать</a>
                            @else
                                @include('desktop.includes.pay_form',['mera'=>'dllina'])
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div style="display: flex">
                            <svg aria-hidden="true" width="20%" focusable="false" data-prefix="fal" data-icon="watch" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-watch fa-w-12 fa-2x"><path fill="#f37691" d="M320 112.9V24c0-13.2-10.8-24-24-24H88C74.8 0 64 10.8 64 24v88.9C24.7 148.1 0 199.1 0 256s24.7 107.9 64 143.1V488c0 13.2 10.8 24 24 24h208c13.2 0 24-10.8 24-24v-88.9c39.3-35.2 64-86.2 64-143.1s-24.7-107.9-64-143.1zM96 32h192v57.7C259.8 73.3 227 64 192 64s-67.8 9.3-96 25.7V32zm192 448H96v-57.7c28.2 16.3 61 25.7 96 25.7s67.8-9.4 96-25.7V480zm-96-64c-88.6 0-160-71.8-160-160S103.5 96 192 96c88.4 0 160 71.6 160 160s-71.6 160-160 160zm49-92.2l-60.1-43.7c-3.1-2.3-4.9-5.9-4.9-9.7V150.3c0-6.6 5.4-12 12-12h8c6.6 0 12 5.4 12 12v109.9l51.8 37.7c5.4 3.9 6.5 11.4 2.6 16.8l-4.7 6.5c-3.8 5.3-11.3 6.5-16.7 2.6z" class=""></path></svg>
                            <h4>Сборник заданий для изучения мер времени</h4>
                        </div>

                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                            @if(!empty(Cookie::get('vrema')))
                                <a href="{{Cookie::get('vrema')}}" class="genric-btn primary">Скачать</a>
                            @else
                                @include('desktop.includes.pay_form',['mera'=>'vrema'])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-inner row">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div style="display: flex">
                            <svg aria-hidden="true" width="23%"  focusable="false" data-prefix="fas" data-icon="calculator-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-calculator-alt fa-w-16 fa-2x"><path fill="#c71f1f" d="M192 288H32c-17.67 0-32 14.33-32 32v160c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V320c0-17.67-14.33-32-32-32zm-29.09 140.29c3.12 3.12 3.12 8.19 0 11.31l-11.31 11.31c-3.12 3.12-8.19 3.12-11.31 0L112 422.63l-28.29 28.29c-3.12 3.12-8.19 3.12-11.31 0L61.09 439.6c-3.12-3.12-3.12-8.19 0-11.31L89.37 400l-28.29-28.29c-3.12-3.12-3.12-8.19 0-11.31l11.31-11.31c3.12-3.12 8.19-3.12 11.31 0l28.3 28.28 28.29-28.29c3.12-3.12 8.19-3.12 11.31 0l11.31 11.31c3.12 3.12 3.12 8.19 0 11.31L134.63 400l28.28 28.29zM480 0H320c-17.67 0-32 14.33-32 32v160c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32zm-16 120c0 4.42-3.58 8-8 8h-40v40c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-40h-40c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h40V56c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v40h40c4.42 0 8 3.58 8 8v16zm16 168H320c-17.67 0-32 14.33-32 32v160c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V320c0-17.67-14.33-32-32-32zm-16 152c0 4.42-3.58 8-8 8H344c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h112c4.42 0 8 3.58 8 8v16zm0-64c0 4.42-3.58 8-8 8H344c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h112c4.42 0 8 3.58 8 8v16zM192 0H32C14.33 0 0 14.33 0 32v160c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32zm-16 120c0 4.42-3.58 8-8 8H56c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h112c4.42 0 8 3.58 8 8v16z" class=""></path></svg>
                            <h4>Пособие таблица умножения от 0 до 10, от 10 до 20</h4>
                        </div>
                        <form class="print_form" action="{{ route('print') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="print_text" class="print_text">
                            <input type="hidden" name="print_text_value" class="print_text_value">
                            <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                                <a href="#" class="genric-btn primary print_button">Скачать</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div style="display: flex">
                            <svg aria-hidden="true" width="20%"  focusable="false" data-prefix="far" data-icon="abacus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-abacus fa-w-18 fa-2x"><path fill="#1800bb" d="M552 0c-13.25 0-24 10.74-24 24v48h-48V48c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H240V48c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48V48c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H48V24C48 10.74 37.25 0 24 0S0 10.74 0 24v476c0 6.63 5.37 12 12 12h24c6.63 0 12-5.37 12-12v-60h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h192v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v60c0 6.63 5.37 12 12 12h24c6.63 0 12-5.37 12-12V24c0-13.26-10.75-24-24-24zM96 120v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h192v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v112H336v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H48V120h48zm384 272v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H240v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H48V280h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h192v112h-48z" class=""></path></svg>
                            <h4>Сборник убражнений. Устный счет до 100</h4>
                        </div>

                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                            @if(!empty(Cookie::get('schet100')))
                                <a href="{{Cookie::get('schet100')}}" class="genric-btn primary">Скачать</a>
                            @else
                                @include('desktop.includes.pay_form',['mera'=>'schet100'])
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <div style="display: flex">
                            <svg aria-hidden="true" width="20%"  focusable="false" data-prefix="far" data-icon="abacus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-abacus fa-w-18 fa-2x"><path fill="#1800bb" d="M552 0c-13.25 0-24 10.74-24 24v48h-48V48c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H240V48c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48V48c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H48V24C48 10.74 37.25 0 24 0S0 10.74 0 24v476c0 6.63 5.37 12 12 12h24c6.63 0 12-5.37 12-12v-60h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h192v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v60c0 6.63 5.37 12 12 12h24c6.63 0 12-5.37 12-12V24c0-13.26-10.75-24-24-24zM96 120v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h192v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v112H336v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H48V120h48zm384 272v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H240v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24h-48v-24c0-8.84-7.16-16-16-16h-16c-8.84 0-16 7.16-16 16v24H48V280h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h48v24c0 8.84 7.16 16 16 16h16c8.84 0 16-7.16 16-16v-24h192v112h-48z" class=""></path></svg>
                            <h4>Сборник убражнений. Устный счет до 1000</h4>
                        </div>

                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                            @if(!empty(Cookie::get('schet1000')))
                                <a href="{{Cookie::get('schet1000')}}" class="genric-btn primary">Скачать</a>
                            @else
                                @include('desktop.includes.pay_form',['mera'=>'schet1000'])
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End Feature Area -->

    <div class="table_print" style="display: none;">
        <h2 style="text-align: center;">Таблица умножения на 10</h2>
        <?php
        $rows = 10; // количество строк, tr
        $cols = 10; // количество столбцов, td
        echo '<table border="0" style="margin: auto; width: 100%;">';
        for ($tr=1; $tr<=$rows; $tr++){
            echo '<tr>';
            for ($td=1; $td<=$cols; $td++){ // в этом цикле счётчик $td аналогичен
                // счётчику $tr.
                echo '<td style="width: 10%;    line-height: 34px;
    text-align: center;
    font-size: 11px;
    color: #4cd3e3;">'. $tr.'x'.$td .'='.$tr*$td .'</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
        <br>
        <h2 style="text-align: center;">Таблица умножения на 20</h2>
        <?php
        $rows = 10; // количество строк, tr
        $cols = 10; // количество столбцов, td
        echo '<table border="0" style="margin: auto; width: 100%;">';
        for ($tr=1; $tr<=$rows; $tr++){
            echo '<tr>';
            for ($td=1; $td<=$cols; $td++){ // в этом цикле счётчик $td аналогичен
                // счётчику $tr.
                $tr = $tr+10;
                $td = $td+10;
                echo '<td style="width: 10%;    line-height: 34px;
    text-align: center;
    font-size: 11px;
    color: #4cd3e3;">'. $tr.'x'.$td .'='.$tr*$td .'</td>';
                $tr = $tr-10;
                $td = $td-10;
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </div>

@endsection
