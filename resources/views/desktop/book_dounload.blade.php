@extends('layouts.desktop')

@section('content')
    <form class="print_form" action="{{ route('print') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="print_text" class="print_text">
        <input type="hidden" name="print_text_value" class="print_text_value">
        <div class="row book_dounload">
            <div class="col-md-12 table_print">
                <h1>Примеры</h1>
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
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            @if(($i+1)%2==0 && $i!=0)
                    </tr><tr>
                        @endif
                        @endforeach
                    </tr>
                </table>
                <h1>Ответы</h1></br>
                <table class="table">
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
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @endif
                            </td>
                            @if(($i+1)%2==0 && $i!=0)
                    </tr><tr>
                        @endif
                        @endforeach
                    </tr>
                </table>
            </div>
        </div>
    </form>
@endsection
