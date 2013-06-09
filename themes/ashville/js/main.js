/*
 * Main JS
 */

$(document).ready(function() {

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
