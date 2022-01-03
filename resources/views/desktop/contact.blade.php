@extends('layouts.desktop')

@section('title')
    Mathsimple Напишите нам чтобы мы стали лучше
@endsection

@section('description')Оставьте отзыв или просто напишите свои пожелания и мы обязательно прислушаемся!@endsection

@section('keywords')изучение математики онлайн, математические сайты, оналйн калькуляторы по математике@endsection


@section('text')Мы планируем запускать новые онлайн-тренажёры, которые будут полезны и удобны, а также
планируем улучшать режимы и оформление сайта</br> Ты  пожешь подсказать нам как сделать
сайт лучше оставив свой отзыв или пожелание@endsection
@section('link')href="/contact"@endsection
@section('linktext')Контакты@endsection

@section('header')
    Контакты Mathsimple
@endsection

@section('content')
    @include('desktop.includes.banner')

    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex flex-column address-wrap">
                    <!-- Yandex.RTB R-A-741366-14 -->
                    <div id="yandex_rtb_R-A-741366-14"></div>
                    <script>window.yaContextCb.push(()=>{
                            Ya.Context.AdvManager.render({
                                renderTo: 'yandex_rtb_R-A-741366-14',
                                blockId: 'R-A-741366-14'
                            })
                        })</script>
                </div>
                <div class="col-lg-8">
                    <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input name="name" placeholder="Имя" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Имя'"
                                       class="common-input mb-20 form-control" required="" type="text">

                                <input name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Email'" class="common-input mb-20 form-control" required="" type="email">
                            </div>
                            <div class="col-lg-6 form-group">
								<textarea class="common-textarea form-control" name="message" placeholder="Сообщение" onfocus="this.placeholder = ''"
                                          onblur="this.placeholder = 'Сообщение'" required=""></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="alert-msg" style="text-align: left;"></div>
                                <button class="primary-btn" style="float: right;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact-page Area -->
@endsection
