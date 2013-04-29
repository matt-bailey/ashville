/* Admin js */

/**
 * Custom functions
 */

/**
 * Element exists function
 * by Chris Goodchild
 */

jQuery.fn.exists = function(callback) {
    var args = [].slice.call(arguments, 1);
    if (this.length) {
        callback.call(this, args);
    }
    return this;
};

// Rename the widget area titles so they are more specific
function renameWidgetTitle() {
    // Replace default widget area editor name with actual widget area name
    jQuery('.WidgetAreaEditor').each(function() {
        var name = jQuery(this).attr('name');
        var value = name.replace(/([a-z])([A-Z])/g, '$1 $2');
        jQuery('.usedWidgetsHolder h2', this).text(value);
    });
}

// Nasty hacky function for doing naughty things
function hideWidgetAreaType() {
    // I know this is sooo hacky, but at the moment I can't find any other way to remove the
    // widget area type dropdown from widgets in the sidebar widget area
    jQuery('.FeatureWidget[id*=SidebarWidgetArea]').each(function() {
        if (jQuery('.field[id*=WidgetLayoutType]', this)) {
            jQuery('.field[id*=WidgetLayoutType]', this).hide();
        }
    });
}

// Initialise TinyMCE on textareas
function initialiseTinyMCE() {
    // Only do it if the textarea is on the widgets tab
    jQuery('#Root_Widgets').exists(function() {
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
    });
}

// imgAreaSelect - Auto populate inputs with values
function preview(img, selection) {
    if (!selection.width || !selection.height) { return; }
    jQuery('#Form_ItemEditForm_X1').val(selection.x1);
    jQuery('#Form_ItemEditForm_Y1').val(selection.y1);
    jQuery('#Form_ItemEditForm_X2').val(selection.x2);
    jQuery('#Form_ItemEditForm_Y2').val(selection.y2);
}

// Initialise imgAreaSelect
function initialiseImgAreaSelect() {
    var xOne = jQuery('#Form_ItemEditForm_X1').val();
    var yOne = jQuery('#Form_ItemEditForm_Y1').val();
    var xTwo = jQuery('#Form_ItemEditForm_X2').val();
    var yTwo = jQuery('#Form_ItemEditForm_Y2').val();
    jQuery('#floorplan').imgAreaSelect({
        x1: xOne,
        y1: yOne,
        x2: xTwo,
        y2: yTwo,
        handles: true,
        fadeSpeed: 200,
        parent: '.cms-content-fields',
        onSelectChange: preview
    });
}

/**
 * After document ready calls
 */
jQuery(document).ready(function() {

    // Fancybox for icons preview
    jQuery('.fancybox-ajax').fancybox({ type: 'ajax' });

    // Do stuff
    renameWidgetTitle();
    hideWidgetAreaType();
    initialiseTinyMCE();
    initialiseImgAreaSelect();

});

/**
 * After ajaxStop calls
 */
jQuery(document).ajaxStop(function() {

    // Do stuff
    renameWidgetTitle();
    hideWidgetAreaType();
    initialiseTinyMCE();
    initialiseImgAreaSelect();

});
