
$(document).ready(function () {
    "use strict";

    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;


    $(".fullscreen").css("height", window_height)
    $(".fitscreen").css("height", fitscreen);


    // Wow Js
    new WOW().init();


    if (document.getElementById("default-select")) {
        $('select').niceSelect();
    };

    $('.img-pop-up').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });


    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    /* ---------------------------------------------
        scroll body to 0px on click
     --------------------------------------------- */
    $('#back-top a').on("click", function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });


    //  Counter Js

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });


    // Initiate superfish on nav menu
    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });

    // Mobile Navigation
    if ($('#nav-menu-container').length) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function (e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function (e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
            $('#mobile-body-overly').toggle();
        });

        $(document).click(function (e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-cross lnr-menu');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    // Smooth scroll for the menu and links with .scrollto classes
    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if ($('#header').length) {
                    top_space = $('#header').outerHeight();

                    if (!$('#header').hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });




    // Header scroll class
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
            $('#back-top').fadeIn(500);
        } else {
            $('#header').removeClass('header-scrolled');
            $('#back-top').fadeOut(500);
        }
    });


    // Rocket Scroll
    $(window).scroll(function () {
        if ($(this).scrollTop() > 10) {
            $('.rocket-img').addClass('go-top');
            $('#back-top').fadeIn(500);
        } else {
            $('.rocket-img').removeClass('go-top');
            $('#back-top').fadeOut(500);
        }
    });


    // Owl Carousel
    if ($('.testi-slider').length) {
        $('.testi-slider').owlCarousel({
            loop: false,
            margin: 30,
            items: 1,
            nav: false,
            autoplay: false,
            smartSpeed: 1500,
            dots: true,
            responsiveClass: true,
            thumbs: true,
            thumbsPrerendered: true,
            navText: ["<i class='lnr lnr-arrow-left'></i>", "<i class='lnr lnr-arrow-right'></i>"]
        })
    }


    //  Start Google map

    // When the window has finished loading create our google map below

    if (document.getElementById("map")) {

        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.6700, -73.9400), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: 'Snazzy!'
            });
        }
    }

    $('#mc_embed_signup').find('form').ajaxChimp();
    $('#print').click(function (){
        printJS('docs/PrintJS.pdf');
    });
    $('.print_button').click(function() {
        $('.print_text').val($('.table_print').html());

        // $('.print_text_value').val($('.table_print_value').html());

        $('.print_form').submit();
        return false;
    });
    $('.filter_button').click(function () {
        if(confirm("Вы подтверждаете операцию?") ){
            $('.filter_button button').submit();
            return(true);
        }else{
            return(false);
        }
    });
    var href = $(location).attr('pathname');


    // $('.tarifs_oplata').click(function() {
    //     $.ajax({
    //         url: '/pay_query',
    //         method: 'post',
    //         dataType: 'html',
    //         data: $(this).parents('form').serialize(),
    //         success: function(data){
    //             console.log(data);
    //         }
    //     });
    //     return false;
    // });

    ////////////////calk//////////////////
    var tablo_primers = [];
    var tablo_values = [];
    var tablo_current = 1;
    $('.tablo_primer_text_double').hide();
    if($('.table_view_td')!=null){
        var i=0;
        $('.table_view .table_view_tr').each(function(idx, val){
            i=idx+1;
            $( ".tablo_primer_buttons" ).append( '<div class="count_button count_button'+i+' btn">'+i+'</div>' );
            if(idx==0){
                $('.count_button'+tablo_current).addClass('btn-wight');

                if(href=='/comp'){
                    $('.tablo_primer_text_double').text($(this).find('.comp_text_primer1').text()+"__"+$(this).find('.comp_text_primer2').text());
                    $('.tablo_primer_text').text($(this).find('.comp_text_primer1').text()+"__"+$(this).find('.comp_text_primer2').text());
                }else{
                    $('.tablo_primer_text_double').text($(this).text());
                    $('.tablo_primer_text').text($(this).text());
                }
            }
            if(href=='/comp'){
                tablo_primers.push($(this).find('.comp_text_primer1').text()+"__"+$(this).find('.comp_text_primer2').text()+" ");
            }else{
                tablo_primers.push($(this).text()+" ");
            }

            tablo_values.push($(val).find('.value').val());
        })
    }
    if($('.primer-show').length > 0){

        if($('.mera').length>0){
            var primer = tablo_primers[tablo_current-1].split("…");
            $('.primer-show').html(primer[0]);
            $('.mera_otvet').html(primer[1]);
        }else{
            $('.primer-show').html(tablo_primers[tablo_current-1]);
        }
    }

///////////////////////calc/////////////////////
    var keys = document.querySelectorAll('.calculator span');
    var operators = ['+', '-', 'x', '÷'];
    var decimalAdded = false;


    for(var i = 0; i < keys.length; i++) {
        keys[i].onclick = function(e) {

            var input = document.querySelector('.screen');
            var inputVal = input.innerHTML;
            var btnVal = this.innerHTML;
            var total;
            if(btnVal == 'C') {
                input.innerHTML = '';
                if($(location).attr('pathname') == '/comp'){
                    input.innerHTML = '__';
                }
                decimalAdded = false;
            }

            else if(btnVal == '=' && $(location).attr('pathname') !== '/comp') {
                var equation = inputVal;
                var lastChar = equation[equation.length - 1];

                equation = equation.replace(/x/g, '*').replace(/÷/g, '/');

                if(operators.indexOf(lastChar) > -1 || lastChar == '.')
                    equation = equation.replace(/.$/, '');

                if(equation){
                    total = eval(equation);
                    if(total.toString().indexOf('.') != -1)
                        total= total.toFixed(2);
                    input.innerHTML = total;
                }

                decimalAdded = false;
            }
            else if(operators.indexOf(btnVal) > -1) {
                var lastChar = inputVal[inputVal.length - 1];
                if(inputVal != '' && operators.indexOf(lastChar) == -1){
                    input.innerHTML += btnVal;
                }else if(inputVal == '' && btnVal == '-'){
                    input.innerHTML += btnVal;
                }
                if(operators.indexOf(lastChar) > -1 && inputVal.length > 1) {
                    input.innerHTML = inputVal.replace(/.$/, btnVal);
                }
                decimalAdded =false;
            }
            else if(btnVal == '.') {
                if(!decimalAdded) {
                    input.innerHTML += btnVal;
                    decimalAdded = true;
                }
            }
            else {
                if( $(location).attr('pathname') == '/comp'){
                    input.innerHTML = btnVal;
                }else{
                    input.innerHTML += btnVal;
                }
            }
            if($(location).attr('pathname') == '/tasks'){
                var tablo_primer_text = $('.tablo_primer_text_double').text();
                let text;
                if (tablo_primer_text.indexOf('x') > -1){
                    text = tablo_primer_text.split('x');
                }
                $('.tablo_primer_text').html(text[0]+$('.screen').text()+text[1]);
            }
            if(href == '/tasks'){
                var tablo_primer_text = $('.tablo_primer_text_double').text();
                let text;
                if (tablo_primer_text.indexOf('x') > -1){
                    text = tablo_primer_text.split('x');
                }
                $('.primer-show').html(text[0]+$('.screen').text()+text[1]);
            }
            if(href == '/comp'){
                var tablo_primer_text = $('.tablo_primer_text_double').text();
                let text;
                if (tablo_primer_text.indexOf('__') > -1){
                    text = tablo_primer_text.split('__');
                }
                $('.primer-show').html(text[0]+$('.screen').text()+text[1]);
            }
            if(href == '/mera'){
                var tablo_primer_text = $('.tablo_primer_text_double').text();

                let text;
                if (tablo_primer_text.indexOf('…') > -1){
                    text = tablo_primer_text.split('…');
                }
                $('.primer-show').html(text[0]);
                $('.mera_otvet').html(text[1]);
            }
            e.preventDefault();
        }
    }
    $('.tablo_check_button').click(function(){

        if($('.mera').length > 0 && $(this).hasClass('disabled')){
            return false;
        }
        $(".table_view .table_view_tr:nth-child("+tablo_current+") .primer_value_check").val($('.screen').text());

        $('.screen').text($('.screen').text().replace('\t', ''));
        if($('.screen').text() == tablo_values[tablo_current-1]){
            var t = parseInt($('.tablo_rezult_true').text());
            $('.tablo_rezult_true').text(t+1);
            $('.text-result').text("Верно. Молодец!");
            $(".table_view .table_view_tr:nth-child("+tablo_current+1+") .primer_value_check").val($('.screen').text());
            tablo_current++;
            if($('.mental_chislo').length>0){
                count_mental_primer++;
                show_primer(count_mental_primer);
            }
            $('.primer-show').text(tablo_primers[tablo_current-1]);
            if(href == '/mera'){
                var tablo_primer_text = tablo_primers[tablo_current-1];

                let text;
                if (tablo_primer_text.indexOf('…') > -1){
                    text = tablo_primer_text.split('…');
                }
                $('.primer-show').html(text[0]);
                $('.mera_otvet').html(text[1]);
            }
            $('.tablo_primer_text_double').text(tablo_primers[tablo_current-1]);
            $('.screen').text('');

            if(tablo_current == '11'){
                let result = '';
                if($('.tablo_rezult_false').text() == '0'){
                    result = "Верно. Молодец!";
                } else if($('.tablo_rezult_false').text() == '1'){
                    result = $('.tablo_rezult_false').text()+' ошибка';
                }else if($('.tablo_rezult_false').text() == '2' ||
                    $('.tablo_rezult_false').text() == '3' ||
                    $('.tablo_rezult_false').text() =='4'){
                    result = $('.tablo_rezult_false').text()+' ошибки';
                }else{
                    result = $('.tablo_rezult_false').text()+' ошибок';
                }
                $('.tablo_check_button').addClass('disable');
                $('.primer-quotes').text(result);
                $('.text-result').addClass('hidden');
                clock.stop();
                return false;
            }
        }else{
            var t = parseInt($('.tablo_rezult_false').text());
            $('.tablo_rezult_false').text(t+1);
            $('.text-result').text("Подумай еще");
            $('.screen').text('');
        }
        return false;
    });
    $('.tablo_buttons .right').click(function(){
        $(".table_view .table_view_tr:nth-child("+tablo_current+") .primer_value_check").val($('.screen').text());
        tablo_current++;
        $('.primer-show').text(tablo_primers[tablo_current-1]);
        $('.tablo_primer_text_double').text(tablo_primers[tablo_current-1]);
        $('.screen').text('');
        return false;
    });


////////////////////////calc///////////////////

    let clock;
    if($('#confirm-switch-time').is(':checked')){
        $('.clock').removeClass('hidden');
        // Instantiate a counter
        clock = new FlipClock($('.clock'), {
            clockFace: 'MinuteCounter'
        });
    }else{
        $('.clock').addClass('hidden');
    }
    $('#confirm-switch-time').change(function(){
        if($('#confirm-switch-time').is(':checked')){
            $('.clock').removeClass('hidden');
            var clock;
            // Instantiate a counter
            clock = new FlipClock($('.clock'), {
                clockFace: 'MinuteCounter'
            });
        }else{
            $('.clock').addClass('hidden');
        }
    });
    ////////////////////////clock///////////////////

    if(href == '/tasks' || href=='/comp'){
        $('.screen').hide();
    }

    var count_mental_primer = 0;

    ////////////////mental//////////////////
    if($('.mental_chislo').length>0){

        $('.repeat').on('click',function () {
            show_primer(count_mental_primer);
            return false;
        });
        show_primer(count_mental_primer);
    }
    function show_primer(count_mental_primer){
        if(tablo_primers[count_mental_primer] == undefined){
            $('.calc_onlain').addClass('hlop');
            $('.mental_chislo_result').text('В '+ $('#count').val() + ' примерах '+ $('.tablo_rezult_false').text() + ' ошибок')
            $('.mental_chislo_result').removeClass('hidden');
        }
        tablo_primers[count_mental_primer] = tablo_primers[count_mental_primer].replace('=','');
        let value_array = tablo_primers[count_mental_primer].split('+');
        let count_value = 3;
        $('.screen').text("");
        $('.screen').addClass('hidden');
        for (let j = 0; j<=count_value; j++){
            (function(j){
                setTimeout(function() {
                    //console.log(value_array);
                    $('.mental_chislo .tablo_primer_text').text(value_array[j]);
                    $('.tablo_primer_text').removeClass('hidden');
                    //console.log(count_mental_primer);
                    if(j==count_value){
                        $('.tablo_primer_text').addClass('hidden');
                        $('.mental_chislo .tablo_primer_text').text('');
                        $('.screen').removeClass('hidden');
                    }
                }, 1000 * (j + 1));
            })(j);
        }
        return false;
    }

    $('.content_toggle').click(function(){
        $('.content_block').slideToggle(300);
        return false;
    });
    // $(window).scroll(function () {
    //     //set scroll position in session storage
    //     sessionStorage.scrollPos = $(window).scrollTop();
    // });
    // var init = function () {
    //     //return scroll position in session storage
    //     $(window).scrollTop(sessionStorage.scrollPos || 0)
    // };
    // window.onload = init;

    $('.oglavlenie a').on('click', function() {

        let href = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(href).offset().top
        }, {
            duration: 370,   // по умолчанию «400»
            easing: "linear" // по умолчанию «swing»
        });
        return false;
    });

    // $("#nav-menu-container a").each(function() {
    //     if($(this).attr('href') == window.location.href) {
    //         $(this).parent('li').addClass('menu-active');
    //     }
    // });

    if($('#nav-menu-container').length>0){
        $("#nav-menu-container a").removeClass('menu__link--active');
        var href = $(location).attr('pathname');
        if(href == '/'){
            $("a[href*='/make']").addClass('menu__link--active');
        }else{
            $("a[href*='"+href+"']").addClass('menu__link--active');
        }

    }

    $('#print').click(function (){
        printJS('docs/PrintJS.pdf');
    });
    $('.print_button').click(function() {
        $('.print_text').val($('.table_print').html());
        $('.print_form').submit();
        return false;
    });

    if($('.book_dounload').length>0){
        $('.print_text').val($('.table_print').html());
        $('.print_form').submit();
    }

    $('.false_link').click(function(){
        return false;
    });
    $('.time_halve').click(function(){
        //console.log($(this).text() );
        if($(this).text() == "PM"){
            $(this).text("AM");
            $('.pm').addClass('hidden');
            $('.am').removeClass('hidden');
        }else{
            $(this).text("PM");
            $('.am').addClass('hidden');
            $('.pm').removeClass('hidden');
        }
        return false;
    });
    let hour = 10;
    let minute = 10;
    if($('.guest').val() == 1){

    }else{
        $('.guest').addClass('hidden');
        $('.clock_button span.hour').click(function(){
            hour = $(this).data("hour");
            $('#clock .hour').text(hour);
            displayCanvas();
        });
        $('.clock_button span.minute').click(function(){
            minute = $(this).data("minute");
            $('#clock .minute').text(minute);
            displayCanvas();
        });
    }
    if($('#myCanvas').length>0){
        displayCanvas();
    }
    function displayCanvas(){
        var canvasHTML = document.getElementById('myCanvas');
        var contextHTML = canvasHTML.getContext('2d');
        contextHTML.strokeRect(0,0,canvasHTML.width, canvasHTML.height);

        //Расчет координат центра и радиуса часов
        var radiusClock = canvasHTML.width/2 - 10;
        var xCenterClock = canvasHTML.width/2;
        var yCenterClock = canvasHTML.height/2;

        //Очистка экрана.
        contextHTML.fillStyle = "#f9f9ff";
        contextHTML.fillRect(0,0,canvasHTML.width,canvasHTML.height);

        //Рисуем контур часов
        contextHTML.strokeStyle =  "#4fc7c8";
        contextHTML.lineWidth = 2;
        contextHTML.beginPath();
        contextHTML.arc(xCenterClock, yCenterClock, radiusClock, 0, 2*Math.PI, true);
        contextHTML.moveTo(xCenterClock, yCenterClock);
        contextHTML.stroke();
        contextHTML.closePath();

        //Рисуем рисочки часов
        var radiusNum = radiusClock - 10; //Радиус расположения рисочек
        var radiusPoint;
        for(var tm = 0; tm < 60; tm++){
            contextHTML.beginPath();
            if(tm % 5 == 0){radiusPoint = 2;}else{radiusPoint = 1;} //для выделения часовых рисочек
            var xPointM = xCenterClock + radiusNum * Math.cos(-6*tm*(Math.PI/180) + Math.PI/2);
            var yPointM = yCenterClock - radiusNum * Math.sin(-6*tm*(Math.PI/180) + Math.PI/2);
            contextHTML.arc(xPointM, yPointM, radiusPoint, 0, 2*Math.PI, true);
            contextHTML.stroke();
            contextHTML.closePath();
        }

        //Оцифровка циферблата часов
        for(var th = 1; th <= 12; th++){
            contextHTML.beginPath();
            contextHTML.font = 'bold 25px sans-serif';
            var xText = xCenterClock + (radiusNum - 30) * Math.cos(-30*th*(Math.PI/180) + Math.PI/2);
            var yText = yCenterClock - (radiusNum - 30) * Math.sin(-30*th*(Math.PI/180) + Math.PI/2);
            if(th <= 9){
                contextHTML.strokeText(th, xText - 5 , yText + 10);
            }else{
                contextHTML.strokeText(th, xText - 15 , yText + 10);
            }
            contextHTML.stroke();
            contextHTML.closePath();
        }


        //Рисуем стрелки
        var lengthSeconds = radiusNum - 10;
        var lengthMinutes = radiusNum - 15;
        var lengthHour = lengthMinutes / 1.5;
        var d = new Date();                //Получаем экземпляр даты
        d = new Date('1995-12-17T'+hour+':'+minute+':00');
        var t_sec = 6*d.getSeconds();                           //Определяем угол для секунд
        var t_min = 6*(d.getMinutes() + (1/60)*d.getSeconds()); //Определяем угол для минут
        var t_hour = 30*(d.getHours() + (1/60)*d.getMinutes()); //Определяем угол для часов

        //Рисуем секунды
        contextHTML.beginPath();
        contextHTML.strokeStyle =  "#4fc7c8";
        contextHTML.moveTo(xCenterClock, yCenterClock);
        contextHTML.lineTo(xCenterClock + lengthSeconds*Math.cos(Math.PI/2 - t_sec*(Math.PI/180)),
            yCenterClock - lengthSeconds*Math.sin(Math.PI/2 - t_sec*(Math.PI/180)));
        contextHTML.stroke();
        contextHTML.closePath();

        //Рисуем минуты
        contextHTML.beginPath();
        contextHTML.strokeStyle =  "#000000";
        contextHTML.lineWidth = 3;
        contextHTML.moveTo(xCenterClock, yCenterClock);
        contextHTML.lineTo(xCenterClock + lengthMinutes*Math.cos(Math.PI/2 - t_min*(Math.PI/180)),
            yCenterClock - lengthMinutes*Math.sin(Math.PI/2 - t_min*(Math.PI/180)));
        contextHTML.stroke();
        contextHTML.closePath();

        //Рисуем часы
        contextHTML.beginPath();
        contextHTML.lineWidth = 5;
        contextHTML.moveTo(xCenterClock, yCenterClock);
        contextHTML.lineTo(xCenterClock + lengthHour*Math.cos(Math.PI/2 - t_hour*(Math.PI/180)),
            yCenterClock - lengthHour*Math.sin(Math.PI/2 - t_hour*(Math.PI/180)));
        contextHTML.stroke();
        contextHTML.closePath();

        //Рисуем центр часов
        contextHTML.beginPath();
        contextHTML.strokeStyle =  "#000000";
        contextHTML.fillStyle = "#ffffff";
        contextHTML.lineWidth = 3;
        contextHTML.arc(xCenterClock, yCenterClock, 5, 0, 2*Math.PI, true);
        contextHTML.stroke();
        contextHTML.fill();
        contextHTML.closePath();

        return;
    }
    //
    // window.setInterval(
    //     function(){
    //         var d = new Date();
    //         document.getElementById("clock").innerHTML =     d.toLocaleTimeString();
    //         displayCanvas();
    //     }
    //     , 1000);


$('.widget-wrap .lnr').click(function(){
    $('.popular-post-list').toggle();
});
    if($('.test_arrea').length){
        $('.test_arrea').hide();
        $('.result_arrea').hide();
        $('.end_test').hide();
    }

    $('.start_test').click(function (){
        $('.test_arrea').show();
        $('.start_description').hide();
        $('html, body').animate({
            scrollTop: $(".test_arrea").offset().top }, 1000);
        return false;
    });
    $('.end_test').click(function (){
        $('.test_arrea').hide();
        $('.result_arrea').show();
        return false;
    });
    $('.test_arrea li').click(function (){
        $(this).parent('ul').find('li').removeClass('active');
        $(this).addClass('active');
        if($('li.active').length==5){
            $('.end_test').show();
        }
    });
    $('.to_start_test').click(function (){
        location.reload();
    });
});
