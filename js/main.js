$(document).ready(function () {
    $('.button-xs-menu').click(function () {
        
        $('.button-xs-menu').toggleClass('is-active');
        if ($('.button-xs-menu').hasClass('is-active')) {
            $('body').animate({
                right: '250px'
            }, 500);
            $('#smallNav').removeClass('xs-nav-menu');
            $('#smallNav').addClass('xs-nav-menu-active');
            $('#smallNav').animate({
                opacity: '1'
            }, 1200)
        } else {
            $('body').animate({
                right: '0'
            }, 500);
            $('#smallNav').animate({
                opacity: '0'
            }, 1200)
            $('#smallNav').addClass('xs-nav-menu');
            $('#smallNav').removeClass('xs-nav-menu-active');
        }
    })
})