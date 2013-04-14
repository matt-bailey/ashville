/*
 * Main JS
 */

$(document).ready(function() {

    /* ==========================================================================
       Fancybox
       ========================================================================== */

    $(".fancybox").fancybox();

    // Fancybox
    /*$(".fancybox").fancybox({
        padding: 0,
        helpers:  {
            title : {
                type : 'inside'
            }
        }
    });*/


    /* ==========================================================================
       Carousel
       ========================================================================== */

    $('.carousel').carousel({
        interval: 7500,
        pause: "hover"
    });

    // Initialise slideshow pagination
    $('.carousel-thumbs, .carousel-buttons').slideshowPagination();

});