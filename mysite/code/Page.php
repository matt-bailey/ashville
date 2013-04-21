<?php
class Page extends SiteTree
{
    public static $db = array(
        'ContentArea2' => 'HTMLText',
        'ContentArea3' => 'HTMLText',
        'SlideCaptionPosition' => "Enum('top, bottom')",
        //'ShowServicesSlides' => "Enum('yes, no')",
        //'ServicesSlidesPosition' => "Enum('right, below')"
    );

    static $has_one = array(
        "MainContentWidgetArea" => "WidgetArea",
        "SidebarWidgetArea" => "WidgetArea"
    );

    static $many_many = array(
        'SlideItems' => 'SlideItem'
    );
    
    static $many_many_extraFields = array(
        'SlideItems' => array(
            'SortID' => 'Int'
        )
    );

    // Set default values
    public function populateDefaults()
    {
        parent::populateDefaults();
        $this->ShowServicesSlides = 'yes';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Remove the blog module sidebar
        $fields->removeByName('SideBar');

        // Services Slides carousel position
        /*$fields->addFieldsToTab('Root.Main', array(
            new DropdownField(
                'ShowServicesSlides',
                'Show Services Slides',
                $this->owner->dbObject('ShowServicesSlides')->enumValues(),
                '',
                '',
                ''),
            new DropdownField(
                'ServicesSlidesPosition',
                'Services Slides Position<br />(Relative to main slideshow)',
                $this->owner->dbObject('ServicesSlidesPosition')->enumValues(),
                '',
                '',
                'Choose a position')
        ), 'Content');*/

        $fields->addFieldsToTab('Root.Main', array(
            new HtmlEditorField('ContentArea2', 'Content Area 2', 16),
            new HtmlEditorField('ContentArea3', 'Content Area 3', 16)
        ));
        $fields->addFieldToTab("Root.Widgets", new WidgetAreaEditor("MainContentWidgetArea"));
        $fields->addFieldToTab("Root.Widgets", new WidgetAreaEditor("SidebarWidgetArea"));

        /**
         * Slide caption position
         */
        $fields->addFieldsToTab('Root.SlideShow', array(
            new DropdownField(
                'SlideCaptionPosition',
                'Slide Caption Position',
                $this->owner->dbObject('SlideCaptionPosition')->enumValues(),
                '',
                '',
                'Choose a position')
        ));

        /**
         * Slide items
         */
        // Don't show Slideshow tab on Blog page types
        if($this->ClassName != 'BlogHolder' && $this->ClassName != 'BlogEntry' && $this->ClassName != 'BlogTree')
        {
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldSortableRows('SortID'));
            $slideItemsField = new GridField(
                'SlideItems',
                'Slide Items',
                $this->owner->SlideItems(),
                $config
            );      
            $fields->addFieldToTab('Root.SlideShow', $slideItemsField);
        }

        return $fields;
    }

    /**
     * Auto inherit widgets
     */
    function AutoInheritSidebar()
    {
        // If I have widgets, show then
        if ($this->SidebarWidgetArea()->Widgets()->Count())
        {
            return $this->SidebarWidgetArea();
        }
        // Else if my parent has widgets, show them
        else if ($this->parent()->exists() && $this->parent()->SidebarWidgetArea()->Widgets()->Count())
        {
            return $this->parent()->SidebarWidgetArea();
        }
        // Else show the home page widgets
        else
        {
            $home = DataObject::get_one("Page", "URLSegment = 'home'");
            return $home->SidebarWidgetArea();
        }
    }

    function sanitiseString($string)
    {
        //lower case everything
        $string = strtolower($string);
        //make alphaunermic
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

    public function getSiteNameString()
    {
        $config = SiteConfig::current_site_config();
        $string = $config->Title;
        //lower case everything
        $string = strtolower($string);
        //make alphaunermic
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
}

class Page_Controller extends ContentController
{

    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    public static $allowed_actions = array ();

    public function init()
    {
        parent::init();
        // Note: you should use SS template require tags inside your templates 
        // instead of putting Requirements calls here.  However these are 
        // included so that our older themes still work
        //Requirements::themedCSS('reset');
        //Requirements::themedCSS('layout'); 
        //Requirements::themedCSS('typography'); 
        //Requirements::themedCSS('form'); 
    }

    /**
     * Add a body class of ss-page ss-page-[pagetype]
     */
    public function BodyClass()
    {
        $class = '';
        if ($this->ClassName == 'Page') {
            $class = 'ss-page';
        } else {
            $class = 'ss-page ss-' . strtolower($this->ClassName);
        }
        if ($this->BodyCSSClass) {
            $class .= ' ' . $this->BodyCSSClass;
        }
        return $class;
    }

}