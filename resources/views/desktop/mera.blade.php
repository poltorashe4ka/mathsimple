@extends('layouts.desktop')

@section('title')
    Бесплатный тренажер онлайн для изучения единиц измерения
@endsection

@section('description')Быстро и легко выучить и запомнить меры измерения длины, массы, времени, площади@endsection
@section('keywords')
единицы измерения таблица,единицы измерения длины,единицы измерения масса,единицы измерения площадь,
единицы измерения времени,единицы измерения время,единицы измерения калькулятор,единицы измерения математика,
меры измерения@endsection

@section('text')Сантиметры в метры, килограммы в граммы, часы в минуты - легко выучить и начиться переводить величины@endsection
@section('link')href="/mera"@endsection
@section('linktext')Тренажер для изучения единиц измерения@endsection

@section('header')
    Выучить меры измерения и научиться переводить</br>
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
                                    <H2>Перевести единицы измерения</H2>

                                    <div class="col-lg-12"><div class="clock"></div>
                                        <div class="message"></div></div>
                                    <p class="tablo_msg"></p>
                                    <div class="col-lg-12">
                                        <p class="text-result"></p>
                                    </div>
                                    <div class="podskazka">{{$title}}</div>
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

                                                <a href="#" @if (!isset(Auth::user()->pay_status) || Auth::user()->pay_status!=1)  title="Необходима подписка" @endif class="genric-btn success radius tablo_check_button
                                            @if (!isset(Auth::user()->pay_status) || Auth::user()->pay_status!=1)  disabled @endif">Ответить</a>

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
                                    <form class="make" action="{{ route('mera') }}" method="get">
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <p>На время?</p>
                                            <div class="confirm-switch">
                                                <input type="checkbox" id="confirm-switch-time" name="confirm-switch-time"
                                                       @if(Request::get('confirm-switch-time') == 'on') checked @endif >
                                                <label for="confirm-switch-time"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between ">
                                            <p>Масса</p>
                                            <div class="primary-radio">
                                                <input type="radio" id="mera_massa" name="mera_type" value="mera_massa"
                                                       @if(Request::get('mera_type') == 'mera_massa' ) checked @endif >
                                                <label for="mera_massa"></label>
                                            </div>
                                        </div>
                                        <div class="switch-wrap d-flex justify-content-between ">
                                            <p>Длина</p>
                                            <div class="primary-radio">
                                                <input type="radio" id="mera_dlina" name="mera_type" value="mera_dlina"
                                                       @if(Request::get('mera_type') == 'mera_dlina') checked @endif>
                                                <label for="mera_dlina"></label>
                                            </div>
                                        </div>
{{--                                        <div class="switch-wrap d-flex justify-content-between ">--}}
{{--                                            <p>Площадь</p>--}}
{{--                                            <div class="primary-radio">--}}
{{--                                                <input type="radio" id="mera_ploshad" name="mera_type"  value="mera_ploshad"--}}
{{--                                                       @if(Request::get('mera_type') == 'mera_ploshad') checked @endif>--}}
{{--                                                <label for="mera_ploshad"></label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="switch-wrap d-flex justify-content-between ">
                                            <p>Время</p>
                                            <div class="primary-radio">
                                                <input type="radio" id="mera_vrema" name="mera_type"  value="mera_vrema"
                                                       @if(Request::get('mera_type') == 'mera_vrema') checked @endif>
                                                <label for="mera_vrema"></label>
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
            </div>
        </div>
    </section>
@endsection
