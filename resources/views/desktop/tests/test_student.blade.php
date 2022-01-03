@extends('layouts.desktop')

@section('title')
    Тест. Какой ты ученик?
@endsection

@section('description')Самый легкий способ узнать какой же ты все таки ученик - пройти быстрый тест!@endsection
@section('keywords')
    тесты для детей
@endsection

@section('header')Тест. Какой ты ученик?@endsection
@section('text')@endsection
@section('link')href="/test_student"@endsection
@section('linktext')Тесты@endsection

@section('content')
    @include('desktop.includes.banner')

    <!--Start Feature Area -->
    <section class="feature-area shop_block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section-title text-center start_description">
                        <h1>Пройди быстрый тест из 5 вопросов и <br>узнай, какой ты ученик?</h1>
                        <img src="/img/pupol.png"  alt="pupol" width="auto"   height="300px">
                        <p style="text-align: center;"><b>Внимание!</b>
                            Данный тест не носит никакого научного, медицинского, психологического или иного смысла</p>
                        <a href="#" class="primary-btn start_test">Начать</a>
                    </div>
                </div>
            </div>

            <!-- Start Testimonials Area -->
            <section class="testimonials-area section-gap test_arrea">
                <div class="container">
                    <div class="testi-slider owl-carousel" data-slider-id="1">
                        @foreach($questions as $key => $question)
                            <div class="item">
                                <div class="testi-item">
                                    <h4>{{$question->questions}}</h4>
                                    <ul class="list">
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                    <div class="wow fadeIn" data-wow-duration="1s">
                                        <?php $values = explode(";", $question->value); ?>
                                        <ul>
                                            @foreach($values as $k => $value)
                                                @if(!empty($value))
                                                    <li>{{$k+1}}. {{$value}}</li>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                        @foreach($questions as $key => $question)
                            <div class="owl-thumb-item">
                                <div class="primary-btn" style="font-weight: bold;"> {{$key+1}}  </div>
                                <div class="overlay overlay-grad"></div>
                            </div>
                        @endforeach
                        <br>
                        <div class="primary-btn end_test"  style="font-weight: bold;">Завершить</div>
                    </div>
                </div>
            </section>
            <!-- End Testimonials Area -->
            <!-- Start post-content Area -->
            <section class="post-content-area single-post-area result_arrea" style="background-color: #fff;">
                <div class="container">
                    <div class="row">
                        <div class="posts-list">
                            <div class="single-post row">
                                <div class="col-lg-12">
                                    <div class="feature-img">
                                        <img class="img-fluid" style="    width: auto; max-height: 300px;"
                                             src="{!! \App\Models\TestResult::images_path!!}{{$result->img}}" alt="">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <h3 class="mt-20 mb-20">{{$result->person}}</h3>
                                    <p class="excert">
                                        {{$result->description}}
                                    </p>
                                </div>
                                <a href="#" class="primary-btn to_start_test">Еще разок</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End post-content Area -->
        </div>
    </section>
    <!-- End Feature Area -->
@endsection
