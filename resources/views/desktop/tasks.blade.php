@extends('layouts.desktop')

@section('title')
    Бесплатный тренажер онлайн для решения уравнений по математике для детей быстро и легко
@endsection

@section('description')Решать уравнения для детей 1-3 класса на сложение, вычитание, умножение, деление. Онлайн калькулятор@endsection
@section('keywords')решение уравнений онлайн, решение уравнений класс, решение уравнений по фото,
решение уравнений с дробями, решение уравнений с неизвестными, решение уравнений калькулятор,
решение уравнений функции, решение уравнений с корнями, решение уравнений со степенями@endsection

@section('text')Решение уравнений часто вызывает трудности у школьников. Решайте уравнения на тренажере каждый день,
переходя от простых примеров к сложным@endsection
@section('link')href="/tasks"@endsection
@section('linktext')Решение уравнений по математике@endsection

@section('header')
    Научиться решать уравнения по математике легко</br>
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
                                    <H2>Считай в уме быстро и легко</H2>
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
                                            <a href="#" class="genric-btn primary radius mobile content_toggle "  style="  margin-right: 1%;">Показать примеры</a>
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
                                    <form class="make" action="{{ route('tasks') }}" method="get">
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <p>На время?</p>

                                            <div class="confirm-switch">
                                                <input type="checkbox" id="confirm-switch-time" name="confirm-switch-time"
                                                       @if(Request::get('confirm-switch-time') == 'on') checked @endif >
                                                <label for="confirm-switch-time"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between ">
                                            <p>Сложение</p>
                                            <div class="confirm-checkbox ">
                                                <input type="checkbox" id="sum" name="sum"
                                                       @if(Request::get('sum') == 'on' || (
    Request::get('diff') != 'on') && Request::get('mult') != 'on' && Request::get('div') != 'on'
)) checked @endif >
                                                <label for="sum"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between ">
                                            <p>Вычитание</p>
                                            <div class="confirm-checkbox ">
                                                <input type="checkbox" id="diff" name="diff"
                                                       @if(Request::get('diff') == 'on') checked @endif >
                                                <label for="diff"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between ">
                                            <p>Умножение</p>
                                            <div class="confirm-checkbox ">
                                                <input type="checkbox" id="mult" name="mult"
                                                       @if(Request::get('mult') == 'on') checked @endif >
                                                <label for="mult"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between ">
                                            <p>Деление</p>
                                            <div class="confirm-checkbox ">
                                                <input type="checkbox" id="div" name="div"
                                                       @if(Request::get('div') == 'on') checked @endif >
                                                <label for="div"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex ">
                                            <div class="form-select" id="default-select">
                                                <label for="end">Вычисления до </label>
                                                <select  name="end">
                                                    <?php
                                                    $value = [10,20,50,100,150,200,500,1000];
                                                    ?>
                                                    @for($i=0; $i<7; $i++)
                                                        @if(Request::get('end') == $value[$i])
                                                            <option  value="{{$value[$i]}}" selected="selected">{{$value[$i]}}</option>
                                                        @else
                                                            <option  value="{{$value[$i]}}" >{{$value[$i]}}</option>
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
                    <p>Из всех тем в математике начальной школы самая сложная - решение уравненй.
                        Зачастую детей смущает появление в примере  неизвестной (любой латинской буквы),
                        также не понятно почему цыфру заменили буквой, да и как вообще их решать..</p>
                    <p><strong>Для того чтобы найти неизвестное слагаемое, нужно из суммы вычесть известное слагаемое.</strong></p>
                    <p>Это правило даётся детям при изучении уравнений на сложение, и оно давольно сложное для восприятия ребенка.</p>
                    <p>Есть несколько шагов чтобы облегчить понимание уравнений...</p>
                    <p>Во-первых в обычном примере <b>2&nbsp;+&nbsp;3&nbsp;=&nbsp;5</b> Замените одно из слагаемых на <b>х</b>, например закройте листком, на котором написан х</p>
                    <p><b>2&nbsp;+&nbsp;x&nbsp;=&nbsp;5</b></p>
                    <p>Так нагляднее показать, что под <b>х</b> скрывается такое же число</p>
                    <p>Познакомьте ребёнка с понятиями "целого" и "части" или "большого" и "маленького".
                        Легче всего это показать на пицце, например 2 куска часть от всех пиццы.</p>
                    <p>Значит целое равно 5, а часть это 2. И, тогда останется только найти оставщуюся часть, а значит из "целого" отнять "часть" ту, что извесна</p>
                    <p><b>х&nbsp;=&nbsp;5&nbsp;-&nbsp;2</b></p>
                    <p><b>х&nbsp;=&nbsp;3</b></p>
                    <p>После того, как ребенок поймет, что ключем к правильному решению уравнений является определить, <b>х</b> — целое или часть,
                        он легко будет решать уравнения.</p>
                    <p>Когда у ребенка начнет получатся, то математика сразу станет легкой и понятной,
                        а значит начнет нравится. Занимайтесь на тренажерах и получайте пятерки!</p>
                </div>
            </div>
        </div>
    </section>

@endsection
