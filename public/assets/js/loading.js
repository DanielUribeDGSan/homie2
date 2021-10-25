$(window).on('load', function () {
    $(".status").fadeOut(1800);
    $(".preloader").delay(900).fadeOut("slow");
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(window).on("load", function () {
    /*
        Lines Animations
    */
    $('.lines').addClass('finish');
    setTimeout(function () {
        $('.lines').addClass('ready');
    }, 2000);

});

$('body').on('click', '.link_ref', function () {
    var link = $(this).attr('href');

    $('.lines').removeClass('finish');
    $('.lines').removeClass('ready');
    $('.lines').addClass('no-lines');
    setTimeout(function () {
        location.href = "" + link;
    }, 1000);

    setTimeout(function () {
        $('.lines').addClass('finish');
        $(".preloader").show();
        $(".status").show();
    }, 2000);


    return false;
});
