@extends('layouts.desktop')

@section('title')
    Страница не найдена
@endsection

@section('content')
    <div class="page-404">
        <div class="container page-404__content">
            <img src="{{ URL::asset('images/404_text.png') }}" alt="" class="page-404__title-image" />
{{--            <div class="page-404__title">--}}
{{--                Страница не найдена--}}
{{--            </div>--}}
            <div class="page-404__subtitle">
                Извините, страница временно недоступна<br>или не найдена
            </div>
        </div>
    </div>
@endsection
