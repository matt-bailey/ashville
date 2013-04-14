/* Admin js */

/**
 * Custom functions
 */

function renameWidgetTitle() {
    // Replace default widget area editor name with actual widget area name
    jQuery('.WidgetAreaEditor').each(function() {
        var name = jQuery(this).attr('name');
        var value = name.replace(/([a-z])([A-Z])/g, '$1 $2');
        jQuery('.usedWidgetsHolder h2', this).text(value);
    });
}

function hideWidgetAreaType() {
    // I know this is sooo hacky, but at the moment I can't find any other way to remove the
    // widget area type dropdown from widgets in the sidebar widget area
    jQuery('.FeatureWidget[id*=SidebarWidgetArea]').each(function() {
        if (jQuery('.field[id*=WidgetLayoutType]', this)) {
            jQuery('.field[id*=WidgetLayoutType]', this).hide();
        }
    });
}

/**
 * After document ready calls
 */
jQuery(document).ready(function() {
    // Fancybox for icons preview
    jQuery('.fancybox-ajax').fancybox({ type: 'ajax' });
    // Manipulate the interface
    renameWidgetTitle();
    hideWidgetAreaType();
});

/**
 * After ajaxStop calls
 */
jQuery(document).ajaxStop(function() {
    // Manipulate the interface
    renameWidgetTitle();
    hideWidgetAreaType();
});
