@extends('layouts.desktop')

@section('title')
    Тренажер для изучения времени
@endsection

@section('description')Как объяснить ребёнку время? Что нужно знать, чтобы определять время по часам?
Разбираем устройство часов и мастерим свои.
Изучаем время через игры и задания с часами.@endsection
@section('keywords')изучаем часы со стрелками, изучаем часы со стрелками игра,
определяем время по часам,
как научить ребенка часам игра,
учим часы и минуты,
как понять часы со стрелками,
часы со стрелками для детей,
учить часы на русском,
как объяснить ребенку часы и минуты,
учим время по электронным часам,
циферблат учим время,
как выучить время на телефоне,
учим детей определять время,
учим часы и минуты,
часы со стрелками обучение,
не умею определять время по стрелочным часам,@endsection

@section('text')Что должен знать ребенок, чтобы определять время по часам?@endsection
@section('link')href="/clock"@endsection
@section('linktext')Изучаем часы со стрелками@endsection

@section('header')
   Как объяснить ребенку часы и минуты</br>
@endsection

@section('content')
    @include('desktop.includes.banner')
    <div class="desktop big_reclama" style="position:absolute;
    left:1%;
    top: 675px;
    height: auto;
    overflow: hidden;
    width: 200px;">
        <!-- Yandex.RTB R-A-741366-8 -->
        <div id="yandex_rtb_R-A-741366-8"></div>
        <script>window.yaContextCb.push(()=>{
                Ya.Context.AdvManager.render({
                    renderTo: 'yandex_rtb_R-A-741366-8',
                    blockId: 'R-A-741366-8'
                })
            })</script>
    </div>
    <!-- Start post-content Area -->
    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list  order_1">
                    @if (!isset(Auth::user()->pay_status) || Auth::user()->pay_status!=1)
                        <div class="guest">Для тренировки и отключения рекламы  <a href="/signin" class="genric-btn primary">Регистрация</a> </div>
                    @endif
                    <br>
                    <div class="single-post row">
                        <div class="col-lg-6">
                            <div id='clock' style="    min-width: 350px;">Время на часах
                                <span class="hour">10</span> :
                                <span class="minute">10</span>
                            </div><br>

                            <div style="width: auto; margin: auto;text-align: center;">
                                <canvas height='330' width='330' id='myCanvas'></canvas>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="quotes calculator clock_button" style="min-width: 160px;">
                                <p>Часы</p> <a href="#" class="time_halve">AM</a>
                                <div class="keys">
                                    <div class="am">
                                        @for($i=1;$i<=12;$i++)
                                            <span class="genric-btn default hour"
                                                  data-hour="@if($i<10){{'0'.$i}}@else{{$i}}@endif">{{$i}}</span>
                                        @endfor
                                    </div>
                                    <div class="pm hidden">
                                        @for($i=13;$i<24;$i++)
                                            <span class="genric-btn default hour"
                                                  data-hour="@if($i<10){{'0'.$i}}@else{{$i}}@endif">{{$i}}</span>
                                        @endfor
                                        <span class="genric-btn default hour"
                                              data-hour="00">00</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                                <div class="quotes calculator clock_button" style="min-width: 160px;">
                                    <p>Минуты</p>
                                    <div class="keys">
                                        <div>@for($i=0;$i<=11;$i++)
                                                <span class="genric-btn default minute"
                                                      data-minute="@if($i<2){{'0'.$i*5}}@else{{$i*5}}@endif">{{$i*5}}</span>
                                            @endfor</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="single-post row" style="    padding: 15px;">
                            <p>Когда ребенку исполняется 3-4 лет пора знакомить его с понятиями дня и ночи, утра и вечера,
                                разбирать их принципиальные особенности и порядок чередования. </p>
                            <p>В возрасте 5 или 6 лет, когда ребенок уже познакомился с цифрами и знает числа до 60, можно приступить к изучению временных промежутков более подробно.
                                Познакомить ребенка с часами, лучше использовать  часы со стрелками.
                                На таких часах можно наглядно продемонстрировать малышу понятие части и целого, выучить с ним,
                                что сутки состоят из 24 часов, а каждый час – из 60 минут.</p>
                            <p>
                                Важным моментом будет обозначение ключевых точек: ровно час или половина часа.
                                Обычно научить ребенка определять количество часов не сложно, но вот с определением  «без десяти час» или
                                «пятнадцать минут третьего» бывают тружности.
                                Достаточно того, чтобы ребенок мог сказать: «двенадцать часов и 50 минут» или «два часа и 15 минут».
                            </p>
                            <p>
                                Одновременно мы учим ребенка понимать время в контексте его повседневной жизни, задавая вопросы: сколько минут
                                 осталось до сна  или через сколько минут будем обедать.
                            </p>
                            <p>
                                Закрепить изученное дети могут и с помощью игр с часами и специальных тренажеров для изучения часов со стрелками.
                            </p>
                        </div>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <div class="single-sidebar-widget popular-post-widget">
                                <h4 class="popular-title">Интерактивные часы</h4>
                                <div class="popular-post-list">
                                </div>
                            </div>
{{--                            @include('desktop.includes.reclama')--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
