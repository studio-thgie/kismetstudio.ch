
$(function(){

    $('body').addClass('loaded');

    $('.gallery').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true
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
    })

    $('.bookable_course_button').on('click', function(){
        $('.bookable_course_button').removeClass('active');
        $('.bookable_course').addClass('hide');
        $(this).addClass('active');
        $('.bookable_course.'+$(this).data('target')).removeClass('hide');
    })

    $('.bookable_course_button').eq(0).click();
});