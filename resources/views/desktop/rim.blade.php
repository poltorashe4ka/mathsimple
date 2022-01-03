@extends('layouts.desktop')

@section('title')
    Бесплатный тренажер онлайн для изучения римских цифр
@endsection

@section('description')Быстро и легко выучить и запомнить римские цифры@endsection
@section('keywords')
римские цифры 0,римские цифры от 1 до 20,римские цифры перевод,цифры перевод от 1 до 100,
римские цифры перевод онлайн,римские цифры перевод даты,римская система счисления,
римские цифры от 1 до 10000,римские цифры - перевод на английский,римские цифры шрифт,римские цифры скопировать,римские цифры учить
@endsection

@section('text')Римские цифры@endsection
@section('link')href="/rim"@endsection
@section('linktext')Тренажер для изучения римских цифр@endsection

@section('header')Выучить римские цифры и научиться переводить@endsection

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
        <div class="container mera">
            <div class="row">
                <div class="col-lg-8 posts-list order_1">
                    @if (!isset(Auth::user()->pay_status) || Auth::user()->pay_status!=1)
                        <div class="guest">Для тренировки и отключения рекламы  <a href="/signin" class="genric-btn primary">Регистрация</a> </div>
                    @endif
                    <br>
                    <div class="single-post row">
                        <div class="col-lg-12">
                            @if(isset($primers) && count($primers)>0)
                                <form class="print_form" action="{{ route('print') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="print_text" class="print_text">
                                    <input type="hidden" name="print_text_value" class="print_text_value">
                                    <H2>Римская система счисления</H2>

                                    <div class="col-lg-12"><div class="clock"></div>
                                        <div class="message"></div></div>
                                    <p class="tablo_msg"></p>
                                    <div class="col-lg-12">
                                        <p class="text-result"></p>
                                    </div>
{{--                                    <div class="podskazka">{{$title}}</div>--}}
                                    <div class="col-lg-12">
                                        <div class="quotes primer-quotes">
                                            <div class="primer-show"></div>
                                            <div class="answer-field screen"></div><span class="mera_otvet"></span>
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
                                            <a href="#" class="genric-btn primary radius mobile content_toggle "  style=" margin-right: 1%;">Показать примеры</a>
                                            <a href="#" @if (!isset(Auth::user()->pay_status) || Auth::user()->pay_status!=1) title="Необходима подписка" @endif
                                            class="genric-btn success radius tablo_check_button
                                            @if (!isset(Auth::user()->pay_status) || Auth::user()->pay_status!=1) disabled @endif">Ответить</a>
                                        </div>
                                    </div>
                                    <div class="section-top-border desktop">
                                        <div class="progress-table-wrap">
                                            <div class="progress-table table_view">
<!--                                                --><?php
//                                                dd($primers);
//                                                ?>
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
                                    <form class="make" action="{{ route('rim') }}" method="get">
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
                                            <button type=submit class="genric-btn success filter_button">Начать</button>
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
                    <p><b>Ри́мские ци́фры</b> — цифры, использовавшиеся древними римлянами в их  системе счисления.</p>
                    <div class="cells-container">
                        <div class="gcell">
                            1 - I<br>
                            2 - II<br>
                            3 - III<br>
                            4 - IV<br>
                            5 - V<br>
                            6 - VI<br>
                            7 - VII<br>
                            8 - VIII<br>
                            9 - IX<br>
                            10 - X
                        </div>
                        <div class="gcell">
                            11 - XI<br>
                            12 - XII<br>
                            13 - XIII<br>
                            14 - XIV<br>
                            15 - XV<br>
                            16 - XVI<br>
                            17 - XVII<br>
                            18 - XVIII<br>
                            19 - XIX<br>
                            20 - XX
                        </div>
                        <div class="gcell">
                            21 - XXI<br>
                            22 - XXII<br>
                            23 - XXIII<br>
                            24 - XXIV<br>
                            25 - XXV<br>
                            26 - XXVI<br>
                            27 - XXVII<br>
                            28 - XXVIII<br>
                            29 - XXIX<br>
                            30 - XXX
                        </div>
                        <div class="gcell">
                            31 - XXXI<br>
                            32 - XXXII<br>
                            33 - XXXIII<br>
                            34 - XXXIV<br>
                            35 - XXXV<br>
                            36 - XXXVI<br>
                            37 - XXXVII<br>
                            38 - XXXVIII<br>
                            39 - XXXIX<br>
                            40 - XL
                        </div>
                        <div class="gcell">
                            41 - XLI<br>
                            42 - XLII<br>
                            43 - XLIII<br>
                            44 - XLIV<br>
                            45 - XLV<br>
                            46 - XLVI<br>
                            47 - XLVII<br>
                            48 - XLVIII<br>
                            49 - XLIX<br>
                            50 - L
                        </div>
                        <div class="gcell">
                            51 - LI<br>
                            52 - LII<br>
                            53 - LIII<br>
                            54 - LIV<br>
                            55 - LV<br>
                            56 - LVI<br>
                            57 - LVII<br>
                            58 - LVIII<br>
                            59 - LIX<br>
                            60 - LX
                        </div>
                        <div class="gcell">
                            61 - LXI<br>
                            62 - LXII<br>
                            63 - LXIII<br>
                            64 - LXIV<br>
                            65 - LXV<br>
                            66 - LXVI<br>
                            67 - LXVII<br>
                            68 - LXVIII<br>
                            69 - LXIX<br>
                            70 - LXX
                        </div>
                        <div class="gcell">
                            71 - LXXI<br>
                            72 - LXXII<br>
                            73 - LXXIII<br>
                            74 - LXXIV<br>
                            75 - LXXV<br>
                            76 - LXXVI<br>
                            77 - LXXVII<br>
                            78 - LXXVIII<br>
                            79 - LXXIX<br>
                            80 - LXXX
                        </div>
                        <div class="gcell">
                            81 - LXXXI<br>
                            82 - LXXXII<br>
                            83 - LXXXIII<br>
                            84 - LXXXIV<br>
                            85 - LXXXV<br>
                            86 - LXXXVI<br>
                            87 - LXXXVII<br>
                            88 - LXXXVIII<br>
                            89 - LXXXIX<br>
                            90 - XC
                        </div>
                        <div class="gcell">
                            91 - XCI<br>
                            92 - XCII<br>
                            93 - XCIII<br>
                            94 - XCIV<br>
                            95 - XCV<br>
                            96 - XCVI<br>
                            97 - XCVII<br>
                            98 - XCVIII<br>
                            99 - XCIX<br>
                            100 - C
                        </div>
                    </div>
                    </div>
                <div class="col-lg-12 order_1">
                    <p>Римские цифры не имеют нуля.</p>
                    <p>Представляют непозиционную систему счисления. В таких системах, величина которую обозначает цифра не зависит от её положения в числе. Римская цифра Х означает десять и в числе XII и в числе CX.</p>
                    <p>Числа составляются из римских цифр следующим образом. Меньшая цифра, стоящая права от большей, прибавляется к ней, а находящаяся слева – отнимается. При этом, цифра не должна повторяться больше трёх раз подряд.</p>

                </div>
            </div>
        </div>
    </section>
@endsection
