
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
    });
});