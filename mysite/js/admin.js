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

function initialiseTinyMCE() {
    tinyMCE.init({
        mode: "specific_textareas",
        editor_selector: "textarea",
        width: "356",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,justifyleft,justifycenter,justifyright,justifyfull,separator,bullist,numlist",
        theme_advanced_buttons2 : "outdent,indent,undo,redo,separator,link,unlink,image,cleanup,help,code,hr,removeformat",
        theme_advanced_buttons3 : "formatselect",
        extended_valid_elements: "img[class|id|src|alt|title|onmouseover|onmouseout|name|usemap]",
        theme_advanced_blockformats : "p,div,h1,h2,h3,h4,h5,h6,blockquote"
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
    initialiseTinyMCE();
});

/**
 * After ajaxStop calls
 */
jQuery(document).ajaxStop(function() {
    // Manipulate the interface
    renameWidgetTitle();
    hideWidgetAreaType();
    initialiseTinyMCE();
});
