@extends('layouts.account')
@section('text')Чтобы получить доступ ко всем тренажерам и отключить рекламу надо авторизоваться@endsection
@section('link')href="/sisgnin"@endsection
@section('linktext')Войти@endsection

@section('header')
    Здесь ты можешь создать ЛК или войти если он уже есть
@endsection
@section('content')

    @include('desktop.includes.banner')

<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="comment-form">
                    <h4>Еще нет аккаунта? <a href="/start">Зарегистрируйся</a></h4>
                    <form method="POST" action="/auth/login">
                        {!! csrf_field() !!}
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-12 name">
                                <input type="email" class="form-control" id="email" placeholder="Email"  name="email"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>
                            <div class="form-group col-lg-6 col-md-12 email">
                                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Пароль'">

                            </div>
                        </div>
                        @if($errors->any())
                            {{--                            <p>{{$errors->first()}}</p>--}}
                            <p>Пользователь с такими данными не найден</p>
                        @endif
                        <button type="submit"  class="primary-btn">Войти</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                    <div class="single-sidebar-widget ads-widget">
                        <!-- Yandex.RTB R-A-741366-14 -->
                        <div id="yandex_rtb_R-A-741366-14"></div>
                        <script>window.yaContextCb.push(()=>{
                                Ya.Context.AdvManager.render({
                                    renderTo: 'yandex_rtb_R-A-741366-14',
                                    blockId: 'R-A-741366-14'
                                })
                            })</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
