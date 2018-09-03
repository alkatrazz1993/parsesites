$(document).on('ready', function() {
    $(".vertical-center-4").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 4,
    slidesToScroll: 2
    });
    $(".vertical-center-3").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 3,
    slidesToScroll: 3
    });
    $(".vertical-center-2").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    slidesToShow: 2,
    slidesToScroll: 2
    });
    $(".vertical-center").slick({
    dots: true,
    vertical: true,
    centerMode: true,
    });
    $(".vertical").slick({
    dots: true,
    vertical: true,
    slidesToShow: 3,
    slidesToScroll: 3
    });
    $(".regular").slick({
    dots: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3
    });
    $(".center").slick({
    dots: true,
    infinite: true,
    centerMode: true,
    slidesToShow: 5,
    slidesToScroll: 3
    });
    $(".variable").slick({
    dots: true,
    infinite: true,
    variableWidth: true
    });
    $(".lazy").slick({
    lazyLoad: 'ondemand', // ondemand progressive anticipated
    infinite: true
    });
    $('#slideOne').on('afterChange', function(event, slick, currentSlide){
        var number = currentSlide + 1;
        var el = document.getElementById('number');
        if (typeof el.innerText !== 'undefined') {
            // IE8-
            el.innerText = number + "/3";
        } else {
            // Нормальные браузеры
            el.textContent = number + "/3";
        }
    });
        $('#slideTwo').on('afterChange', function(event, slick, currentSlide){
        var number = currentSlide + 1;
        var el = document.getElementById('number_next');
        if (typeof el.innerText !== 'undefined') {
            // IE8-
            el.innerText = number + "/3";
        } else {
            // Нормальные браузеры
            el.textContent = number + "/3";
        }
    });
});