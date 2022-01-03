@extends('layouts.desktop')

@section('title')
    Отзывы о бесплатном онлайн тренажере mathsimple.ru
@endsection

@section('description')Отличный тренажер по математике. Здесь вы можете прочитать много отзывов и скорей начать заниматься@endsection

@section('keywords')тренажер по математике бесплатно, тренажер по математике онлайн, математика тренажер примеры,
математика комплексный тренажер, программы тренажеры по математике, тренажер по математике сложение, отзывы@endsection


@section('text')Мы планируем запускать новые онлайн-тренажёры, которые будут полезны и удобны, а также
планируем улучшать режимы и оформление сайта</br> Ты  пожешь подсказать нам как сделать
сайт лучше оставив свой отзыв или пожелание@endsection
@section('link')href="/review"@endsection
@section('linktext')Отзывы@endsection

@section('header')
    Отзывы о Mathsimple
@endsection

@section('content')
    @include('desktop.includes.banner')
    @if (Auth::guest())
        <div class="desktop big_reclama" style="position:absolute;
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
    @endif

    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="comments-area">
                        <h4>Уже  {{count($feedbacks)}} пользователей оставили свои комментарии!</h4>
                        @foreach ($feedbacks as $feedback)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/c1.jpg" width="50px" height="50px" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">{{ $feedback->author }}</a></h5>
                                            <p class="date">{{ $feedback->date->format('d.m.Y') }}</p>
                                            <p class="comment">
                                                {{ $feedback->text }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="comment-form">
                        <h4>Не забудь оставить свой отзыв</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-12 name">
                                    <input type="text" class="form-control" id="name" placeholder="Имя" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Имя'">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 email">
                                    <input type="email" class="form-control" id="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                </div>
                            </div>
                            <div class="form-group">
								<textarea class="form-control mb-10" rows="5" name="message" placeholder="Отзыв" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Отзыв'"
                                          required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn">Отправить отзыв</a>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        @include('desktop.includes.reclama')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
