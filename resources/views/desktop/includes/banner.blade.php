
<!-- Start Banner Area -->
<section class="banner-area relative">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">@yield('header')</h1>
                <p>@yield('text')</p>
                <div class="link-nav">
						<span class="box">
							<a href="/">Главная </a>
							<i class="lnr lnr-arrow-right"></i>
							<a @yield('link') >@yield('linktext')</a>
						</span>
                </div>
            </div>
        </div>
    </div>
    <div class="rocket-img">
        <img src="img/rocket.png" alt="">
    </div>
</section>
<!-- End Banner Area -->
