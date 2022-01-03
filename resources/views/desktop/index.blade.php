@extends('layouts.desktop')

@section('title')
    Бесплатный онлайн тренажер по математике
@endsection

@section('description')Тренировка устного счета быстро и легко. Ребенок может заниматься сам всего по 15 минут каждый день...@endsection
@section('keywords')бесплатный тренажер по математике онлайн, решать задачи по математике онлайн, бесплатный тренажер по математике онлайн,
онлайн калькулятор для решения примеров, онлайн калькулятор по математике бесплатно,
решать задачи онлайн по математике бесплатно, математика для школьников онлайн бесплатно, математические тренажеры онлайн бесплатно,
задачи по математике решать онлайн, математические задачи онлайн бесплатно, тренажеры по арифметике бесплатно онлайн,
тренажеры без регистрации по математике бесплатно, тренажёры без регистрации по математике онлайн,
скачать примеры по математике бесплатно, логические задачи онлайн бесплатно
@endsection

@section('content')
    @include('desktop.includes.banner_for_index')

    <!-- Start Courses Area -->
    <section class="courses-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 about-right">
                    <h1>
                        Как научить ребенка считать <br> быстро и легко?
                    </h1>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <p>
                            При первой встречи ребенка с математикой каждый родитель задается такими вопросами
                        </p>
                        <p>
                            Каждый родитель хочет чтобы знакомство ребенка с математикой, примерами и заданиями различной
                            сложности и логическими задачами разного типа прошло "безболезненно" и легко
                        </p>
                    </div>
                    <a href="/signin" class="primary-btn ">Зарегистрироваться</a>
                </div>
                <div class="offset-lg-1 col-lg-6">
                    <div class="courses-right">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <ul class="courses-list">
                                    <li>
                                        <a class="wow " href="/table" data-wow-duration="1s" data-wow-delay=".1s">
                                            <i class="fa fa-book"></i> Учить таблицу умножения
                                        </a>
                                    </li>
                                    <li>
                                        <a class="wow " href="/tasks" data-wow-duration="1s" data-wow-delay=".3s">
                                            <i class="fa fa-book"></i> Решать задачи на уравнения
                                        </a>
                                    </li>
                                    <li>
                                        <a class="wow " href="/mera" data-wow-duration="1s" data-wow-delay=".5s">
                                            <i class="fa fa-book"></i> Изучать меры измерения
                                        </a>
                                    </li>
                                    <li>
                                        <a class="wow " href="/clock" data-wow-duration="1s" data-wow-delay="1.1s">
                                            <i class="fa fa-book"></i> Изучать часы со стрелками
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <ul class="courses-list">
                                    <li>
                                        <a class="wow " href="/make" data-wow-duration="1s" data-wow-delay="1.3s">
                                            <i class="fa fa-book"></i> Тренировка устного счета
                                        </a>
                                    </li>
                                    <li>
                                        <a class="wow " href="/mental" data-wow-duration="1s" data-wow-delay=".9s">
                                            <i class="fa fa-book"></i> Ментальная арифметика
                                        </a>
                                    </li>
                                    <li>
                                        <a class="wow " href="/comp" data-wow-duration="1s" data-wow-delay=".7s">
                                            <i class="fa fa-book"></i> Задачи на сравнения
                                        </a>
                                    </li>
                                    <li>
                                        <a class="wow " href="/rim" data-wow-duration="1s" data-wow-delay=".5s">
                                            <i class="fa fa-book"></i> Учить римские числа
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Courses Area -->

{{--    <div class="desktop">--}}
{{--        <!-- Yandex.RTB R-A-741366-4 -->--}}
{{--        <div id="yandex_rtb_R-A-741366-4"></div>--}}
{{--        <script>window.yaContextCb.push(()=>{--}}
{{--                Ya.Context.AdvManager.render({--}}
{{--                    renderTo: 'yandex_rtb_R-A-741366-4',--}}
{{--                    blockId: 'R-A-741366-4'--}}
{{--                })--}}
{{--            })</script>--}}
{{--    </div>--}}
{{--    <div class="mobile">--}}
{{--        <!-- Yandex.RTB R-A-741366-16 -->--}}
{{--        <div id="yandex_rtb_R-A-741366-16"></div>--}}
{{--        <script>window.yaContextCb.push(()=>{--}}
{{--                Ya.Context.AdvManager.render({--}}
{{--                    renderTo: 'yandex_rtb_R-A-741366-16',--}}
{{--                    blockId: 'R-A-741366-16'--}}
{{--                })--}}
{{--            })</script>--}}
{{--    </div>--}}
    <!-- Start About Area -->
    <section class="about-area section-gap">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-5 col-md-6 about-left desktop">
                    <img class="img-fluid" src="img/about.jpg" alt="">
                </div>
                <div class="offset-lg-1 col-lg-6 offset-md-0 col-md-12 about-right">
                    <h1>Теоретические основы  <br> базовой математики</h1>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <p>
                            Если сомневаетесь, забыли или не знакомы с теорией, перед решением задач и примеров
                            на тренажерах по математике ознакомтесь с правилами.
                            Пошаговое изучение математики для начинающих подходит как тем кто забыл основы и хочет вспомнить,
                            так и для самых маленьких быстро и легко научиться считать, выучить таблицу умножения и многое другое...
                        </p>
                    </div>
                    <a href="/teoriya" class="primary-btn">Теория по математике онлайн</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

@endsection
