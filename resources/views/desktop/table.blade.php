@extends('layouts.desktop')

@section('title')
    Бесплатный онлайн тренажер по математике
@endsection

@section('description')Как выучить таблицу умножения легко и быстро? Программа для изучения и проверки таблицы умножения@endsection
@section('keywords')таблица умножения, таблица умножения онлайн тренажер, таблица умножения быстро, таблица умножения тренажер,
таблица умножения примеры, таблица умножения как выучить, таблица умножения распечатать, таблица умножения на 2,
таблица умножения на 3, таблица умножения для детей, таблица умножения фото, таблица умножения и деления,
таблица умножения играть онлайн, таблица умножения тренажер игра, таблица умножения тренажер на время,
таблица умножения тренажер без ответов@endsection

@section('text')Выучить таблицу умножения за 15 минут быстро и на всегда мечта каждого первокласника.
Это легко если уделять 15 минут каждый день решению простых примеров на онлайн тренажере@endsection
@section('link')href="/table"@endsection
@section('linktext')Таблица умножения@endsection

@section('header')
    Учить таблицу умножения</br> легко и быстро
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
                <div class="col-lg-8 posts-list order_1">

                    <div class="single-post row">
                        <div class="col-lg-12">
                            @if(isset($primers) && count($primers)>0)
                                <form class="print_form" action="{{ route('print') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="print_text" class="print_text">
                                    <input type="hidden" name="print_text_value" class="print_text_value">
                                    <H2>Учить таблицу умножения быстро и легко</H2>
                                    <div class="col-lg-12"><div class="clock"></div>
                                        <div class="message"></div></div>
                                    <p class="tablo_msg"></p>
                                    <div class="col-lg-12">
                                        <p class="text-result"></p>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="quotes primer-quotes">
                                            <div class="primer-show"></div>
                                            <div class="answer-field screen"></div>
                                            <div class="tablo_primer_text_double"></div>
                                            <div class="tablo_rezult_true hidden">0</div>
                                            <div class="tablo_rezult_false hidden">0</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="quotes calculator">
                                            <div class="keys">
                                                <span class="genric-btn default">1</span>
                                                <span class="genric-btn default">2</span>
                                                <span class="genric-btn default">3</span>
                                                <span class="genric-btn default">4</span>
                                                <span class="genric-btn default">5</span>
                                                <span class="genric-btn default">6</span>
                                                <span class="genric-btn default">7</span>
                                                <span class="genric-btn default">8</span>
                                                <span class="genric-btn default">9</span>
                                                <span class="genric-btn default">0</span>
                                                <span class="genric-btn default">-</span>
                                                <span class="genric-btn default big">C</span>
                                            </div>
                                        </div>
                                    </div>
                                    </br>
                                    <div class="col-lg-12">
                                        <div class="buttoms-bloсk">
                                            <a href="#" class="genric-btn primary radius mobile content_toggle "
                                               style=" margin-right: 1%;">Показать примеры</a>
                                            <a href="#" class="genric-btn success radius tablo_check_button">Ответить</a>

                                        </div>
                                    </div>
                                    <div class="section-top-border desktop">
                                        <div class="progress-table-wrap">
                                            <div class="progress-table table_view">
                                                @foreach($primers as $i => $primer)
                                                    <div class="table-row table_view_tr">
                                                        <div class=" table_view_td primer">
                                                            @if(isset($primer['primer']))
                                                                {{$primer['primer']}}
                                                            @endif</div>
                                                        <div class="table_value">
                                                            <input type="text" name="primer_{{$i}}"
                                                                   class="form-control primer_value primer_value_check" id="primer_{{$i}}" >

                                                            <input type="hidden" name="value_{{$i}}"
                                                                   id="value_{{$i}}" class="value" value="{{$primer['value']}}">

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content_block mobile" style="display: none;">
                                        <div class="section-top-border">
                                            <div class="progress-table-wrap">
                                                <div class="progress-table table_view">
                                                    @foreach($primers as $i => $primer)
                                                        <div class="table-row table_view_tr">
                                                            <div class=" table_view_td primer">
                                                                @if(isset($primer['primer']))
                                                                    {{$primer['primer']}}
                                                                @endif</div>
                                                            <div class="table_value">
                                                                <input type="text" name="primer_{{$i}}"
                                                                       class="form-control primer_value primer_value_check" id="primer_{{$i}}" >

                                                                <input type="hidden" name="value_{{$i}}"
                                                                       id="value_{{$i}}" class="value" value="{{$primer['value']}}">

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 table_print hidden">
                                            <table class="table">
                                                <tr>
                                                    @foreach($primers as $i => $primer)
                                                        <td>
                                                            @if(isset($primer['primer']))
                                                                {{$primer['primer']}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <input type="text" name="primer_{{$i}}" class="form-control primer_value" id="primer_{{$i}}" >
                                                            @if(isset($primer['value']))
                                                                <input type="hidden" name="value_{{$i}}"  id="value_{{$i}}"
                                                                       class="value" value="{{$primer['value']}}">
                                                            @endif
                                                        </td>
                                                        @if(($i+1)%3==0 && $i!=0)
                                                </tr><tr>
                                                    @endif
                                                    @endforeach
                                                </tr>
                                            </table>
                                            <h1>Ответы</h1></br>
                                            <table>
                                                <tr>
                                                    @foreach($primers as $i => $primer)
                                                        <td>
                                                            @if(isset($primer['primer']))
                                                                {{$primer['primer']}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(isset($primer['value']))
                                                                <input type="text" name="primer_{{$i}}" class="form-control primer_value" id="primer_{{$i}}"
                                                                       value="{{$primer['value']}}">
                                                            @endif
                                                        </td>
                                                        @if(($i+1)%3==0 && $i!=0)
                                                </tr><tr>
                                                    @endif
                                                    @endforeach
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget">
                            <div class="single-sidebar-widget popular-post-widget">
                                <h4 class="popular-title">Настройте фильтр <i class="lnr lnr-chevron-down"></i></h4>
                                <div class="popular-post-list">
                                    <form class="make" action="{{ route('table') }}" method="get">
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <p>На время?</p>

                                            <div class="confirm-switch">
                                                <input type="checkbox" id="confirm-switch-time" name="confirm-switch-time"
                                                       @if(Request::get('confirm-switch-time') == 'on') checked @endif >
                                                <label for="confirm-switch-time"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex ">
                                            <div class="form-select" id="default-select">
                                                <label for="mult_value">Умножать на</label>
                                                <select  name="mult_value">
                                                    @for($i=0; $i<20; $i++)
                                                        @if(Request::get('mult_value') == $i)
                                                            <option  value="{{$i}}" selected="selected">{{$i}}</option>
                                                        @else
                                                            <option  value="{{$i}}" >{{$i}}</option>
                                                        @endif
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        </br></br>
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <button type=submit class="genric-btn success filter_button">Начать</button></br></br>
                                            <a href="/shop" class="genric-btn success-border">Скачать</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @include('desktop.includes.reclama')
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 order_1">
                    <br>
                    <p><strong>Таблицу умножения </strong>дети начинают изучать в первом классе, однако многие сталкиваются с ней еще до школы...
                        Учить таблицу умножения было не простой задачей как для старшего поколения, так и для современных детей.
                        Однако на сегодняшний день есть много различных игр и онлайн тренажеров для того чтобы выучить раз и
                        навсегда таблицу умножения.
                    </p>
                    <p>
                        Самая большая ошибка – это пробовать учить все разом. Гораздо легче будет если примеры разделить на мини-блоки.
                        Для маленьких детей – это 3-4 карточки, более взрослым можно брать по 5-6 штук.
                    </p>
                    <p>
                        На самом деле задача в два раза проще, чем кажется... Не надо запоминать, сколько будет 4 × 5 или 5 × 4.
                        Достаточно выучить, что цифры 4 и 5 в любом порядке при умножении друг на друга дают 20.
                    </p>
                    <p>
                        Есть и другие закономерности в таблице умножения, которые облегчат изучение.
                        Будет еще лучше если ребёнок найдет их сам, тогда он запоминает их навсегда.
                    </p>
                    <p><strong>Вот некоторые закономерности, которые упростят изучение таблицы умножения:</strong>
                    </p>
                    <ul class="unordered-list">
                        <li>При умножении на 1 любая цифра остаётся той же</li>
                        <li>Чтобы умножить на два, надо просто прибавить столько же</li>
                        <li>При умножении на 5  результат заканчивается на 5 или на 0</li>
                        <li>Чтобы умножить на 5 любое чётное число, надо взять его половинку и приписать к ней 0
                            Например, 8 × 5: берём половинку от 8 — это цифра 4 — и приставляем к ней ноль: получается 40</li>
                        <li>При умножении на 9 сумма цифр в результате обязательно будет равна 9. Например, 2 × 9 = 18 (1 + 8 = 9). 3 × 9 = 27 (2 + 7 = 9)</li>
                        <li>При умножении на 10, надо пририсовать к числу справа ноль</li>
                    </ul>
                    <p>
                        Для того чтобы ребенок запомнил таблицу умножения навсегда, важно не только выучить примеры, но и уделить время активному повторению.
                    </p>
                    <p>
                        Каждодневные занятия на тренажере помогут выучить таблицу умножения быстро и легко, раз и навсегда!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->

@endsection
