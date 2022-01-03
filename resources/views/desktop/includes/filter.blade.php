<div id="filter">
    <H2>Настройте фильтр </H2>
    <div class="filter_checkbox">
        <div class="filter_row">
            <div class="filter_cntr operator_checkbox @if(Request::get('sum')){{ 'active' }}@endif">
                <label for="sum" class="label-cbx">
                    <input id="sum" name="sum" type="checkbox"  class="invisible" @if(Request::get('sum')){{ 'checked' }}@endif>
                    <div class="filter_row_checkbox">
                        <div class="sum"><img src="images/plus.svg"></div>
                    </div>
                </label>
            </div>
            <div class="filter_cntr operator_checkbox   @if(Request::get('diff')){{ 'active' }}@endif">
                <label for="diff" class="label-cbx">
                    <input id="diff" name="diff"  type="checkbox" class="invisible"  @if(Request::get('diff')){{ 'checked' }}@endif>
                    <div class="filter_row_checkbox">
                        <div class="diff"><img src="images/minus.svg"></div>
                    </div>
                </label>
            </div>
        </div>
        <div class="filter_row">
            <div class="filter_cntr operator_checkbox @if(Request::get('mult')){{ 'active' }}@endif" >
                <label for="mult" class="label-cbx">
                    <input id="mult" name="mult"  type="checkbox" class="invisible"  @if(Request::get('mult')){{ 'checked' }}@endif>
                    <div class="filter_row_checkbox">
                        <div class="mult" style="transform: rotate(45deg); "><img src="images/plus.svg"></div>
                    </div>
                </label>
            </div>
            <div class="filter_cntr operator_checkbox @if(Request::get('div')){{ 'active' }}@endif">
                <label for="div" class="label-cbx">
                    <input id="div" name="div"  type="checkbox" class="invisible"  @if(Request::get('div')){{ 'checked' }}@endif>
                    <div class="filter_row_checkbox">
                        <div class="diff"><img src="images/diff.svg"></div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <div class="short_field">
        <label for="prom1">Промежуток вычислений</label>

        <div class="filter_prom_input">
            <div class="mental_filter_prom_input">
                <select class="form-control select" name="start" id="start" placeholder="От"
                        value="@if(Request::get('start')){{ Request::get('start') }}@endif">
                    @for($i = 0; $i <= 10; $i++)
                        @if(Request::get('start') == $i)
                            <option  value="{{$i}}" selected="selected">{{$i}}</option>
                        @else
                            <option  value="{{$i}}" >{{$i}}</option>
                        @endif
                    @endfor
                    @for($i = 1; $i <= 10; $i++)
                        @if(Request::get('start') == $i*10)
                            <option   value="{{$i*10}}"  selected>{{$i*10}}</option>
                        @else
                            <option value="{{$i*10}}" >{{$i*10}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="mental_filter_prom_input">
                <select class="form-control select" name="end" id="end" placeholder="До"
                        value="@if(Request::get('end')){{ Request::get('end') }}@endif">
                    @for($i = 0; $i <= 20; $i++)
                        @if(Request::get('end') == $i)
                            <option  value="{{$i}}" selected="selected">{{$i}}</option>
                        @else
                            <option  value="{{$i}}" >{{$i}}</option>
                        @endif
                    @endfor
                    @for($i = 1; $i <= 10; $i++)
                        @if(Request::get('end') == $i*10)
                            <option   value="{{$i*10}}"  selected>{{$i*10}}</option>
                        @else
                            <option value="{{$i*10}}" >{{$i*10}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        </div>
    </div>
    <div class="short_field">
        <label for="count">Количество примеров</label>
        <select class="form-control select" name="count" id="count" placeholder="@if(Request::get('count')){{ Request::get('count') }}@endif"
                value="@if(Request::get('count')){{ Request::get('count') }}@endif">
            @for($i = 0; $i <= 9; $i++)
                @if(Request::get('count') == $i)
                    <option  value="{{$i}}" selected="selected">{{$i}}</option>
                @else
                    <option  value="{{$i}}" >{{$i}}</option>
                @endif
            @endfor
            @for($i = 1; $i <= 10; $i++)
                @if(Request::get('count') == $i*10)
                    <option   value="{{$i*10}}"  selected>{{$i*10}}</option>
                @else
                    <option value="{{$i*10}}" >{{$i*10}}</option>
                @endif
            @endfor
        </select>
    </div>
    <div class="cntr">
        <label for="minus" class="label-cbx">
            <input id="minus" name="minus" type="checkbox" class="invisible" @if(Request::get('minus')){{ 'checked' }}@endif>
            <div class="checkbox">
                <svg width="20px" height="20px" viewBox="0 0 20 20">
                    <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>
                    <polyline points="4 11 8 15 16 6"></polyline>
                </svg>
            </div>
            <span>Отрицательные значения</span>
        </label>
    </div>

{{--    @if(Request::is('make'))--}}
{{--        <div class="cntr">--}}
{{--            <label for="ost" class="label-cbx">--}}
{{--                <input id="ost" name="ost" type="checkbox" class="invisible" @if(Request::get('ost')){{ 'checked' }}@endif>--}}
{{--                <div class="checkbox">--}}
{{--                    <svg width="20px" height="20px" viewBox="0 0 20 20">--}}
{{--                        <path d="M3,1 L17,1 L17,1 C18.1045695,1 19,1.8954305 19,3 L19,17 L19,17 C19,18.1045695 18.1045695,19 17,19 L3,19 L3,19 C1.8954305,19 1,18.1045695 1,17 L1,3 L1,3 C1,1.8954305 1.8954305,1 3,1 Z"></path>--}}
{{--                        <polyline points="4 11 8 15 16 6"></polyline>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <span>Деление без остатка</span>--}}
{{--            </label>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="filter_button"><button type="submit" class="btn btn-green ">Составить примеры</button></div>
</div>
