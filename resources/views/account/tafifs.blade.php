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
    <section class="feature-area tarifs" id="tarifs">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h1>Подключите подписку <br> и пользуйтесь всеми тренажерами</h1>
                        <p>
                            Подключая подписку вы получаете доступ к расширенному функционалу тренажеров, а также можете заниматься без рекламы
                        </p>
                    </div>
                </div>
            </div>
            <div class="feature-inner row">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <h4>Подключить подписку на 3 месяца 200<i class="fa fa-rub" style="font-size: 19px;" aria-hidden="true"></i></h4>
                        <ul class="unordered-list">
                            <li><span>Реклама на сайте</span></li>
                            <li class="black"><span>Тренажер изучения времени</span></li>
                            <li class="black"><span>Римские цифры</span></li>
                            <li class="black"><span>Тренажер мер измерения</span></li>
                            <li class="black"><span>Ментальная математика</span></li>
                            <li class="black"><span>Решение уравнений</span></li>
                            <li class="black"><span>Тренажер устного счета</span></li>
                            <li class="black"><span>Тренажер задач на сравнения</span></li>
                            <li class="black"><span>Таблица умножения</span></li>
                        </ul>
                        <br>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".3s">
                            <a href="/pay?pay=200" class="genric-btn primary">Купить</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <h4>Подключить подписку на 1 месяц 100<i class="fa fa-rub" style="font-size: 19px;" aria-hidden="true"></i></h4>
                        <ul class="unordered-list">
                            <li><span>Реклама  на сайте</span></li>
                            <li class="black"><span>Тренажер изучения времени</span></li>
                            <li class="black"><span>Римские цифры</span></li>
                            <li class="black"><span>Тренажер мер измерения</span></li>
                            <li class="black"><span>Ментальная математика</span></li>
                            <li class="black"><span>Решение уравнений</span></li>
                            <li class="black"><span>Тренажер устного счета</span></li>
                            <li class="black"><span>Тренажер задач на сравнения</span></li>
                            <li class="black"><span>Таблица умножения</span></li>
                        </ul>
                        <br>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
                            <a href="/pay?pay=100" class="genric-btn primary">Купить</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-item">
                        <h4>Бесплатный режим (ограниченный доступ)</h4>
                        <ul class="unordered-list">
                            <li class="black"><span>Реклама на сайте</span></li>
                            <li><span>Тренажер изучения времени</span></li>
                            <li><span>Римские цифры</span></li>
                            <li><span>Тренажер мер измерения</span></li>
                            <li class="black"><span>Ментальная математика</span></li>
                            <li class="black"><span>Решение уравнений</span></li>
                            <li class="black"><span>Тренажер устного счета</span></li>
                            <li class="black"><span>Тренажер задач на сравнения</span></li>
                            <li class="black"><span>Таблица умножения</span></li>
                        </ul>
                        <br>
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay=".1s">
                            <a href="/" class="genric-btn primary">Скорей заниматься</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End Feature Area -->

@endsection
