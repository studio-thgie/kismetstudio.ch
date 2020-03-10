
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
        $('main nav, .burger').toggleClass('open');
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
    })
});

function initMap() {

    if (document.querySelectorAll('#map').length) {
        document.querySelector('#map').style.height = '400px';

        geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': 'Nidaugasse 8, 2502 Bienne'
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var myOptions = {
                    zoom: 14,
                    center: results[0].geometry.location,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    styles: [{
                            "featureType": "administrative",
                            "elementType": "labels.text.fill",
                            "stylers": [{
                                "color": "#444444"
                            }]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [{
                                "color": "#f2f2f2"
                            }]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [{
                                    "saturation": -100
                                },
                                {
                                    "lightness": 45
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "simplified"
                            }]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.icon",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [{
                                    "color": "#505a65"
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        }
                    ]
                }
                map = new google.maps.Map(document.getElementById("map"), myOptions);

                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            }
        });
    }
}