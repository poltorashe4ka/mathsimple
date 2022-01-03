@if(!isset($primers))
    <div id="middle_box">
        <div class="container-fluid">
            <div class="row">
                <H1 style="font-size: 24px;">Как выучить таблицу умножения за 15 минут?</H1>
                </br>
                </br>

                <p class="text">
                    При первой встречи ребенка с простейшей математикой каждый родитель задается вопросом:"Как быстро и легко научить ребёнка считать? Как выучить таблицу умножения?".
                </p>
                <p class="text">Бесплатный онлайн тренажер по математике поможет легко научиться считать. Каждый день по 15 минут решения примеров позволят научиться концентрации, скорости счета и внимательности.</p>
                <p class="text">Необязательно тратить свое время на составление простых примеров и затем их проверку. Настройте фильтр под нужный уровень сложности.
                </p>
                <p class="text">Готовые примеры по математике можно решать онлайн или скачать и распечатать бесплатно.
                    Каждый раз будет генерироваться множество примеров.</p>
                {{--                    <p class="text">Регулярное решение таких простых задач тренирует концентрацию, внимание и память по методикам быстрому обучению О.Узоровой.</p>--}}
            </div>
            </br>
            <div class="row">

            </div>
            </br>
        </div>
    </div>
    </br>
@endif
<form class="make" action="{{ route('make') }}" method="post">
    {{ csrf_field() }}
    <div id="middle_box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <H2>Настройте фильтр </H2>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-md-3">
                    <div class="cntr">
                        <label for="sum" class="label-cbx">
                            <input id="sum" name="sum" type="checkbox" class="invisible" @if(Request::get('sum')){{ 'checked' }}@endif>
                            <div class="checkbox">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                </svg>
                            </div>
                            <span>Сложение</span>
                        </label>
                    </div>
                    <div class="cntr">
                        <label for="diff" class="label-cbx">
                            <input id="diff" name="diff"  type="checkbox" class="invisible"  @if(Request::get('diff')){{ 'checked' }}@endif>
                            <div class="checkbox">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                </svg>
                            </div>
                            <span>Вычитание</span>
                        </label>
                    </div>
                    <div class="cntr">
                        <label for="mult" class="label-cbx">
                            <input id="mult" name="mult"  type="checkbox" class="invisible"  @if(Request::get('mult')){{ 'checked' }}@endif>
                            <div class="checkbox">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                </svg>
                            </div>
                            <span>Умножение</span>
                        </label>
                    </div>
                    <div class="cntr">
                        <label for="div" class="label-cbx">
                            <input id="div" name="div"  type="checkbox" class="invisible"  @if(Request::get('div')){{ 'checked' }}@endif>
                            <div class="checkbox">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                </svg>
                            </div>
                            <span>Деление</span>
                        </label>
                    </div>
                </div>
                <div class="col-md-3 short_field">
                    <label for="prom1">Промежуток вычислений</label>
                    <input type="text" name="start" class="form-control" id="prom1" placeholder="От"
                           value="@if(Request::get('start')){{ Request::get('start') }}@endif">
                    </br>
                    <input type="text" name="end"  class="form-control" id="prom2" placeholder="До" value="@if(Request::get('end')){{ Request::get('end') }}@endif">
                </div>
                <div class="col-md-3 short_field">
                    <label for="count">Количество примеров</label>
                    <input type="text" name="count" class="form-control" id="count" placeholder="40"
                           value="@if(Request::get('count')){{ Request::get('count') }}@endif">
                </div>
                <div class="col-md-3">
                    <div class="cntr">
                        <label for="minus" class="label-cbx">
                            <input id="minus" name="minus" type="checkbox" class="invisible" @if(Request::get('minus')){{ 'checked' }}@endif>
                            <div class="checkbox">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                    <polyline points="4 11 8 15 16 6"></polyline>
                                </svg>
                            </div>
                            <span>Разрешить отрицательные значения</span>
                        </label>
                    </div>
                </div>
            </div>
            </br>
            <div class="row">
                <div class="col-md-3"><button type="submit" class="btn btn-blue">Применить фильтр</button></br></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    </br>
</form>
@if(isset($primers))
    <form class="print_form" action="{{ route('print') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="print_text" class="print_text">
        <input type="hidden" name="print_text_value" class="print_text_value">
        <div id="middle_box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <H2>Примеры</H2>
                    </div>
                </div>
            </div>
            </br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="button_block_view">
                            <div class="button_block">
                                <button type="button" class="btn btn-blue check_value">Проверить</button>
                            </div>
                            <div class="button_block">
                                <a href="#" class="btn btn-blue print_button">Скачать примеры</a>
                            </div>
                            <div class="button_block">
                                <div class="cntr">
                                    <label for="show_value" class="label-cbx">
                                        <input id="show_value" name="show_value"  type="checkbox" class="invisible">
                                        <div class="checkbox">
                                            <svg width="20px" height="20px" viewBox="0 0 20 20">
                                                <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                                                <polyline points="4 11 8 15 16 6"></polyline>
                                            </svg>
                                        </div>
                                        <span>Показать ответы</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="check_text"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="table_view">
                        @foreach($primers as $i => $primer)
                            <div  class="table_view_tr">
                                <div  class="table_view_td primer">
                                    {{$primer['primer']}}
                                </div>
                                <div class="table_view_td">
                                    <input type="text" name="primer_{{$i}}" class="form-control primer_value" id="primer_{{$i}}" >
                                    <input type="hidden" name="value_{{$i}}"  id="value_{{$i}}" class="value" value="{{$primer['value']}}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 table_print hidden">
                    <table class="table">
                        <tr>
                            @foreach($primers as $i => $primer)
                                <td>
                                    {{$primer['primer']}}
                                </td>
                                <td>
                                    <input type="text" name="primer_{{$i}}" class="form-control primer_value" id="primer_{{$i}}" >
                                    <input type="hidden" name="value_{{$i}}"  id="value_{{$i}}" class="value" value="{{$primer['value']}}">
                                </td>
                                @if(($i+1)%3==0 && $i!=0)
                        </tr><tr>
                            @endif

                            @endforeach
                        </tr>
                    </table>
                    <h1>Ответы</h1></br>
                    <table >
                        <tr>
                            @foreach($primers as $i => $primer)
                                <td>
                                    {{$primer['primer']}}
                                </td>
                                <td>
                                    <input type="text" name="primer_{{$i}}" class="form-control primer_value" id="primer_{{$i}}" value="{{$primer['value']}}">
                                </td>
                                @if(($i+1)%3==0 && $i!=0)
                        </tr><tr>
                            @endif
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
@endif
