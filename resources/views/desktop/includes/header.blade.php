<!-- Start Header Area -->
<header id="header">
    <input type="hidden" class="guest" value="@if (isset(Auth::user()->pay_status) && Auth::user()->pay_status==1) 0 @else 1 @endif">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="/"><img src="img/logo.png" alt="" title="" height="40px"/></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="/">Главная</a></li>
                    <li class="menu-has-children"><a href="#" class="false_link">Тренажеры</a>
                        <ul>
                            <li><a href="/table">Таблица умножения</a></li>
                            <li><a href="/tasks">Уравнения</a></li>
                            <li><a href="/make">Устный счет</a></li>
                            <li><a href="/mental">Ментальная математика</a></li>
                            <li><a href="/comp">Неравенства</a></li>
                            <li><a href="/mera">Меры измерения</a></li>
                            <li><a href="/clock">Часы</a></li>
                            <li><a href="/rim">Римские числа</a></li>
                        </ul>
                    </li>
                    <li><a href="/shop">Магазин</a></li>
                    <li><a href="/tarifs">Тарифы</a></li>
                    <li><a href="/teoriya">Математика онлайн</a></li>
                    <li><a href="/contact">Контакты</a></li>
                    <li><a href="/review">Отзывы</a></li>
                    <li>
                        @if (Auth::guest())
                            <a href="/signin">Войти</a>
                        @else
                        <li class="menu-has-children"><a href="/tarifs">Личный кабинет</a>
                            <ul>
                                <li><a href="/tarifs">Тарифы</a></li>
                                <li><a href="/home">Настройки</a></li>
                                <li><a href="/auth/logout">Выйти</a></li>
                            </ul>
                        </li>
                        @endif
                        </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header>
<!-- End Header Area -->
