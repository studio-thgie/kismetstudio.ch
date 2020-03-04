
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
});