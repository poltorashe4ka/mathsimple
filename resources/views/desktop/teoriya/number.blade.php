@extends('layouts.desktop')

@section('title')
    Математика. Числа и цифры
@endsection

@section('description')Начните изучать математику онлайн прямо сейчас бесплатно@endsection

@section('keywords')число это, число 1, цифра это,
число это ряд символов,
число и цифра,
простое число,
число это в математике,
комплексные числа,
числа,
натуральное число это,
число это информатика,повторяющиеся цифры,трехзначное число@endsection

@section('text')Перед тем как решать примеры и заниматься на тренажерах по математике</br> Изучите теорию по математике онлайн, вспомните формулы и правила@endsection
@section('link')href="/number"@endsection
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
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <section  id="chislo">
                                <div class="quotes">
                                    <h2>Что такое Числа и цифры?</h2>
                                    <p>Число – это одно из основных понятий математики, используемое для количественной характеристики,
                                        сравнения, нумерации объектов и их частей. </p>
                                    Письменными знаками для обозначения чисел служат цифры, а также символы математических операций.
                                    Они возникли еще в первобытном обществе из потребностей счета, понятие числа с развитием науки значительно расширилось.</p>
                                    <p>С помощью палочек изображались числа предметов, задолго до появления цифр.</p>
                                    <p><img src="/img/clen.svg" width="30px" alt=""> Один листик</p>
                                    <p><img src="/img/clen.svg" width="30px" alt=""> <img src="/img/clen.svg" width="30px" alt=""> Два листика</p>
                                    <p><img src="/img/clen.svg" width="30px" alt=""> <img src="/img/clen.svg" width="30px" alt="">
                                        <img src="/img/clen.svg" width="30px" alt=""> Три листика</p>
                                    <p><img src="/img/clen.svg" width="30px" alt=""> <img src="/img/clen.svg" width="30px" alt="">
                                        <img src="/img/clen.svg" width="30px" alt=""> <img src="/img/clen.svg" width="30px" alt=""> Четыре листика</p>
                                    <p><img src="/img/clen.svg" width="30px" alt=""><img src="/img/clen.svg" width="30px" alt="">
                                        <img src="/img/clen.svg" width="30px" alt=""><img src="/img/clen.svg" width="30px" alt="">
                                        <img src="/img/clen.svg" width="30px" alt=""> Пять листиков</p>
                                    <p>Став более грамотными люди осознали, что большее число предметов палочками не отобразить,
                                        тогда на смену палочкам пришли цифры.</p>
                                    <p>Это арабские цифры 0, 1, 2, 3, 4, 5, 6, 7, 8, 9. В большинстве случаев дети боятся математики.
                                        Цифры у школьников ассоциируются со «страшными формулами». На самом деле ничего страшного нет. </p>
                                    <p>Цифры это просто набор символов, которые предназначены для обозначения чисел.
                                        Как и в древности это всего лишь отображение предметов.</p>
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
