@extends('layouts.desktop')

@section('title')
    Уроки математики онлайн
@endsection

@section('description')Теория по математике онлайн бесплатно@endsection

@section('keywords')матем, математический,задачи обучения,математика онлайн теория,математика онлайн с нуля,математика онлайн для детей,математика онлайн решение,
математика онлайн 1 класс,математика онлайн обучение,математика онлайн игры,математика онлайн калькулятор@endsection

@section('text')Перед тем как решать примеры и заниматься на тренажерах по математике</br> Изучите теорию по математике онлайн, вспомните формулы и правила@endsection
@section('link')href="/teoriya"@endsection
@section('linktext')Уроки математики с нуля@endsection

@section('header')
    Теоретическая математика онлайн
@endsection

@section('content')
    @include('desktop.includes.banner')
    <div class="desktop  big_reclama" style="position:absolute;
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
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list order_1">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <section  id="chislo">
                                <div class="quotes">
                                    <h2>Сборник правил по математике</h2>
                                    <br>
                                    <p>Этот раздел поможет самым маленьким впервые познакомиться с простейщей математикой,
                                        быстро и легко запомнить самое важное и научиться применять на практике!</p>
                                    <p>Также здесь начинающие школьники смогут еще раз повторить темы,
                                        которые были не поняты в школе или взглянуть на изученные темы под новым углом.</p>
                                    <p>Ну а взрослые изучая теорию по математике смогут вспонить давно забытое и освежить воспоминания,
                                        которые наверняка понадобиться им для того чтобы всегда помочь своим детям!</p>
                                    <p>Не забудьте  сказать спасибо за занятие! Это можно сделать в самом низу сайта, так вы помогаете нам развиваться и дополнять сайт новой и полезной информацией</p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                @include('desktop.includes.teoriya_menu')
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection
