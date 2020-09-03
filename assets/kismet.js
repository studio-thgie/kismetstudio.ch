
$(function(){

    $('body').addClass('loaded');

    $('.gallery').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        arrows: false
    });

    $('.course-gallery').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false
    });

    $('.video-gallery').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        draggable: false,
        arrows: true
    });

    $('.plan').on('click', function(){
        $('.plan').removeClass('active');
        $(this).addClass('active');

        $('.plan-table tbody td').removeClass('active');

        var plan = plans[$(this).data('plan')];
        for(var d = 0; d < 5; d++){

            var day = plan[d];

            for(var t = 0; t < day.length; t++){
                var time = day[t];
                $('.plan-table tbody tr:nth-child('+(time)+') td:nth-child('+(d+2)+')').addClass('active');
            }
        }
    });

    $('.plan').eq(0).click();

    $('.burger').on('click', function(){
        if($(window).width() >= 768){
            document.getElementById('navigation').scrollIntoView(true);
        } else {
            $('main nav, .burger').toggleClass('open');
        }
    })
    $('main nav a').on('click', function(){
        $('main nav, .burger').removeClass('open');
    })

    /* animated buttons */
    var booking_btn_params = {
        container: document.getElementById('booking-btn'),
        renderer: 'svg',
        loop: false,
        autoplay: false,
        animationData: booking_btn_data
    };
    
    var booking_btn_animation;
    
    booking_btn_animation = lottie.loadAnimation(booking_btn_params);
    
    document.querySelector('#booking-btn').addEventListener('mouseenter', function(){
        booking_btn_animation.setDirection(1)
        booking_btn_animation.play();
    })
    
    document.querySelector('#booking-btn').addEventListener('mouseout', function(){
        booking_btn_animation.setDirection(-1)
        booking_btn_animation.play();
    })

    /* animated buttons */
    var tryout_btn_params = {
        container: document.getElementById('tryout-btn'),
        renderer: 'svg',
        loop: false,
        autoplay: false,
        animationData: tryout_btn_data
    };
    
    var tryout_btn_animation;
    
    tryout_btn_animation = lottie.loadAnimation(tryout_btn_params);
    
    document.querySelector('#tryout-btn').addEventListener('mouseenter', function(){
        tryout_btn_animation.setDirection(1)
        tryout_btn_animation.play();
    })
    
    document.querySelector('#tryout-btn').addEventListener('mouseout', function(){
        tryout_btn_animation.setDirection(-1)
        tryout_btn_animation.play();
    })


    var body = document.body,
        html = document.documentElement,
        height = Math.max( body.scrollHeight, body.offsetHeight, 
                    html.clientHeight, html.scrollHeight, html.offsetHeight );

    $(window).on('scroll', function(){
        var scrolltop = document.querySelector('html').scrollTop
                        || document.querySelector('body').scrollTop;

        var prcntg = 100 / (height - + window.innerHeight) * scrolltop;

        $('.decoration img').css('transform', 'translateY('+Math.round(800 - 1600 / 100 * prcntg).toString() + 'px)');

        var _nav_top = $('#navigation').offset().top + $('#navigation').height() + 30;
        var _booking_top = $('#Booking').offset().top + $('#Booking').height() / 2;
        var _navigation_top = $('.hero-header').offset().top + $('.hero-header').height() / 2;

        if(_nav_top < $(document).scrollTop() && $(window).width() >= 768){
            $('.burger').addClass('show');
        } else {
            $('.burger').removeClass('show');
        }

        if(_booking_top < $(document).scrollTop()){
            $('#booking-btn').addClass('show');
        } else {
            $('#booking-btn').removeClass('show');
        }

        if(_navigation_top < $(document).scrollTop()){
            $('#tryout-btn').addClass('show');
        } else {
            $('#tryout-btn').removeClass('show');
        }
    })

    $('.bookable_course_button').on('click', function(){
        $('.bookable_course_button').removeClass('active');
        $('.bookable_course').addClass('hide');
        $(this).addClass('active');
        $('.bookable_course.'+$(this).data('target')).removeClass('hide');
    })

    $('.bookable_course_button').eq(0).click();

    $('.diplomes-btn').on('click', function(){

        $(this).siblings('.diplomes').toggleClass('hide');
    
    });
        
});