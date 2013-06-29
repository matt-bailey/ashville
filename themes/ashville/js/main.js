/*
 * Main JS
 */

$(document).ready(function() {

    /* ==========================================================================
       Main navigation dropdown positioning
       ========================================================================== */

    // If submenu will go off the screen on the right move it back to fit
    $(".navigation > li").on('mouseover', function () {
        var elm = $('.submenu:first', this);
        var off = elm.offset();
        var l = off.left;
        var w = elm.width();
        // var docH = $(".navigation").height();
        var docW = $(".navigation").width();
        var isEntirelyVisible = (l + w <= docW);
        if (!isEntirelyVisible) {
            $(this).addClass('edge');
        } else {
            $(this).removeClass('edge');
        }
    });

    /* ==========================================================================
       Mobile menu
       ========================================================================== */

    $('.mini-menu-btn').click(function(e) {
        $('.navigation').slideToggle('fast');
        // return false;
        e.preventDefault();
    });

    /* Run function after window resize */
    $(window).resize(function() {
        clearTimeout(this.id);
        this.id = setTimeout(doneResizing, 250);
    });

    /* Manage mini menu on window resize */
    function doneResizing() {
        if ($(window).innerWidth() > 767) {
            // if ($('.navigation').is(":hidden")) {
            //     $('.navigation').slideDown('fast');
            // } else {
            //     return false;
            // }
            $(".navigation").removeAttr("style");
        }
    }

    /* Submenu toggle */
    $('.mega-menu .toggle').click(function(e) {
        $(this).next('.submenu').slideToggle('fast', function() {
            $(this).prev('.toggle').toggleClass('open');
        });
        // return false;
        e.preventDefault();
    });

    /* ==========================================================================
       Case studies
       ========================================================================== */

    $('.js-cs-area').each(function()
    {
        // Create the fancybox group ids
        var dataVal = $(this).data('fancybox-group').replace(/\s+/g, '-').toLowerCase();
        $(this).data('fancybox-group', dataVal);

        // Get new the data attribute values
        newDataVal = $(this).attr('data-fancybox-group');

        // Get the image urls
        $('.js-cs-imgurl').each(function()
        {
            if ($(this).data('fancybox-group') === newDataVal)
            {
                imgSrc = $(this).attr('href');
                imgTitle = $(this).attr('title');
                // Remove the item so it doesn't double up
                $(this).remove();
                // Stop after the first match is found
                return false;
            }
        });

        // Add the image urls to the matching area element
        $(this).attr('href', imgSrc).attr('title', imgTitle);
    });

    // Responsive image maps
    $('img[usemap]').rwdImageMaps();

    /* ==========================================================================
       Fancybox
       ========================================================================== */

    //$(".fancybox").fancybox();

    $('.fancybox').fancybox({
        padding: 5,
        closeBtn: false,
        autoPlay: true,
        helpers: {
            title: {
                type: 'inside'
            },
            buttons: {}
        }
    });


    /* ==========================================================================
       Carousel
       ========================================================================== */

    $('.carousel').carousel({
        interval: 7500,
        pause: "hover"
    });

    // Initialise slideshow pagination
    $('.carousel-thumbs, .carousel-buttons').slideshowPagination();


    /* ==========================================================================
       Back to top
       ========================================================================== */

    // initialise back to top
    $('#backtotop').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });

    // toggle back to top
    $(window).scroll(function(){
        // get the height
        var h = $('body').height();
        var y = $(window).scrollTop();
        if( y > (h*0.25) && y < (h*0.75) ){
            $("#backtotop").fadeIn('slow');
        } else {
            $('#backtotop').fadeOut('slow');
        }
    });

});
