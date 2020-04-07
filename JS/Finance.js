//javascript

 $(window).scroll(function () {
    $('.animation-test').each(function () {
        var imagePos = $(this).offset().top;
        var imageHeight = $(this).height();
        var topOfWindow = $(window).scrollTop();

        if (imagePos < topOfWindow + imageHeight && imagePos + imageHeight > topOfWindow) {
            $(this).addClass("slideRight");
        } else {
            $(this).removeClass("slideRight");
        }
    });
});


//jquery
(function ($) {
 $(document).ready(function(){
 // hide .navbar first
$(".navbar").hide();
// fade in .navbar
$(function () {
$(window).scroll(function () {
    // set distance user needs to scroll before we fadeIn navbar
    if ($(this).scrollTop() > 100) {
    $('.navbar').fadeIn();
            } else {
            $('.navbar').fadeOut();
}
}); 
});
});
}(jQuery));