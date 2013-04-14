<?php

class ContentAreaWidget extends Widget
{
    static $cmsTitle = 'Content Area Placement';
    static $description = 'This is a content area placement Widget';

    static $db = array(
        'ContentArea' => 'Int',
        'WidgetLayoutType' => 'Int'
    );

    static $content_areas = array(
        1 => 'Content Area 1',
        2 => 'Content Area 2',
        3 => 'Content Area 3'
    );

    static $widget_layout_types = array(
        1 => '1/4 width',
        2 => '1/3 width',
        3 => '1/2 width',
        4 => 'Full width, image left',
        5 => 'Full width, image right'
    );

    function getCMSFields()
    {
        return new FieldList(
            new DropdownField('ContentArea', 'Choose a content area', self::$content_areas),
            new HiddenField('WidgetLayoutType', 'Widget layout type', 0)
        );
    }

    function getParsedContentArea()
    {
        $return = '';
        $page = Director::get_current_page();
        /*if ($this->ContentArea)
        {
            switch ($this->ContentArea)
            {
                case 1:
                    $return = $page->Content;
                    break;
                case 2:
                    $return = $page->ContentArea2;
                    break;
                case 3:
                    $return = $page->ContentArea3;
                    break;
                default:
                    $return = $page->Content;
            }
            return ShortcodeParser::get('default')->parse($return);
        }*/
        if ($this->ContentArea)
        {
            if ($this->ContentArea == 1) { $return = $page->Content; }
            else if ($this->ContentArea == 2) { $return = $page->ContentArea2; }
            else if ($this->ContentArea == 3) { $return = $page->ContentArea3; }
            return ShortcodeParser::get()->parse($return);
        }
    }

    public function getWidgetLayout()
    {
        // Check page type
        $current_page_type = Director::get_current_page()->ClassName;
        if ($current_page_type != 'NoSidebarPage') { return 'span9'; }
        else { return 'span12'; }
    }

    public function Title()
    {
        return null;
    }
}