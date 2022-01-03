@extends('layouts.account')
@section('text')Чтобы получить доступ ко всем тренажерам и отключить рекламу надо авторизоваться@endsection
@section('link')href="/sisgnin"@endsection
@section('linktext')Войти@endsection

@section('header')
    Здесь ты можешь создать ЛК или войти если он уже есть
@endsection
@section('content')

    @include('account.includes.banner')
    <section class="about-area section-gap post-content-area" style="    padding: 0;">
        <div class="container">
            <div class="row align-items-center justify-content-center single-post-area" style="padding-top: 40px;">
                <div class="row quotes" style=" width: 100%;">
                    <div class="col-lg-12 form-group" style="text-align: center"><h2>Добро пожаловать<br> в личный кабинет пользователя <b>Mathsimple</b></h2></div>
                    <div class="col-lg-12 form-group" style="text-align: center;">
                        @if(Auth::user()['pay_status'] ==1 )
                            <p>Теперь можно пользоваться всеми тренажерами без ограничений!</p>
                        <a href="/" class="primary-btn">Скорей заниматься</a>
                        @else
                            <p>Оформите подписку и пользуйтесь всеми тренажерами без ограничений и без рекламы!</p>
                            <a href="/tarifs" class="primary-btn">Ознакомиться с тарифами</a>
                        @endif
                    </div>
                </div>
                <div class="row quotes" style=" width: 100%;">
                    <form class="form-area contact-form text-right home_form" id="myForm"  method="POST" action="/auth/update"  style=" width: 100%;">
                        {!! csrf_field() !!}
                        <div class="col-lg-12 form-group" style="text-align: left"><h2>Личные данные</h2></div>
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-6" style="padding: 0px;">
                                <div class="form-horizontal">
                                    <div class="form-group" style="display: flex;">
                                        <label for="inputPassword3" class="col-sm-2  col-lg-2 control-label">Имя</label>
                                        <div class="col-sm-10 col-lg-10">
                                            <input type="text" class="form-control" style="background-color: #f4fdff;border: none;"
                                                   id="inputPassword3" value="{{Auth::user()['name'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" style="display: flex;">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" style="background-color: #f4fdff;border: none;"
                                                   id="inputEmail3" value="{{Auth::user()['email'] }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group" style="display: flex;">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Подписка</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" style="background-color: #f4fdff;border: none;"
                                                   id="inputEmail3" value="
                                                       @if(Auth::user()['pay_status'] ==1 )Оформлена до {{Auth::user()['pay_to'] }}
                                            @elseif(Auth::user()['pay_status'] ==2) На модерации
                                                @else Не оформлена @endif" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
