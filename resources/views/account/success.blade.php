@extends('layouts.account')
@section('text')Чтобы получить доступ ко всем тренажерам и отключить рекламу надо авторизоваться@endsection
@section('link')href="/sisgnin"@endsection
@section('linktext')Войти@endsection

@section('header')
    Здесь ты можешь создать ЛК или войти если он уже есть
@endsection
@section('content')
    @include('account.includes.banner')
    <!--Start Feature Area -->
    <section class="feature-area" id="#tarifs">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h1>Спасибо за подписку<br> пользуйтесь всеми тренажерами без ограничений</h1>
                        <div class="row">
                            <div class="col-md-6"><a href="/" class="primary-btn btn margin_bottom">Скорей заниматься</a></div>
                            <div class="col-md-6"><a href="/home" class="primary-btn btn">Личный кабинет</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Area -->
@endsection
