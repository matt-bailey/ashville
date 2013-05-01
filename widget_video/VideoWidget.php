<?php

class VideoWidget extends Widget
{
    static $cmsTitle = "Video Widget";
    static $description = "Displays a YouTube video";

    static $db = array(
        'YouTubeID' => 'Varchar(255)',
        'WidgetLayoutType' => 'Int',
    );

    static $widget_layout_types = array(
        1 => '1/4 width',
        2 => '1/3 width',
        3 => '1/2 width',
        4 => 'Full width'
    );

    // Set default values
    public function populateDefaults()
    {
        parent::populateDefaults();
        // Set WidgetLayoutType to so width defaults to span3 in sidebars
        $this->WidgetLayoutType = 2;
    }

    function getCMSFields()
    {
        return new FieldList(
            new TextField('YouTubeID', 'YouTube Video ID'),
            new DropdownField('WidgetLayoutType', 'Widget layout type', self::$widget_layout_types)
        );
    }

    public function getWidgetLayout()
    {
        // Get page type
        $current_page_type = Director::get_current_page()->ClassName;

        // Widget layout types for No sidebar pages
        if ($current_page_type == 'NoSidebarPage')
        {
            if ($this->WidgetLayoutType)
            {
                if ($this->WidgetLayoutType == 0) { return 'span-12'; }
                else if ($this->WidgetLayoutType == 1) { return 'span3'; }
                else if ($this->WidgetLayoutType == 2) { return 'span4'; }
                else if ($this->WidgetLayoutType == 3) { return 'span6'; }
                else if ($this->WidgetLayoutType == 4) { return 'span12'; }
            }
        }
        // Widget layout types for all other pages
        else
        {
            if ($this->WidgetLayoutType)
            {
                if ($this->WidgetLayoutType == 0) { return 'span-9'; }
                else if ($this->WidgetLayoutType == 1) { return 'span-quarter'; }
                else if ($this->WidgetLayoutType == 2) { return 'span3'; }
                else if ($this->WidgetLayoutType == 3) { return 'span-half'; }
                else if ($this->WidgetLayoutType == 4) { return 'span9'; }
            }
        }
    }

    public function Title()
    {
        return null;
    }
}