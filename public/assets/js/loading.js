$(window).on('load', function () {
    $(".status").fadeOut(1800);
    $(".preloader").delay(900).fadeOut("slow");
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})



$('body').on('click', '.link_ref', function () {
    var link = $(this).attr('href');

    $(".preloader").show();
    $(".status").show();

    setTimeout(function () {
        location.href = "" + link;
    }, 1000);

    return false;
});
