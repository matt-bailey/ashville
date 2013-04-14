<?php

class PageDividerWidget extends Widget
{
    static $cmsTitle = 'Page Divider Widget';
    static $description = 'This Widget places a horizontal divider on the page';

    static $db = array(
        'ShowHorizontalRule' => 'Int'
    );

    static $show_horizontal_rule = array(
        1 => 'Yes',
        2 => 'No'
    );

    // Set default values
    public function populateDefaults()
    {
        // Set the default value for the widget layout type
        parent::populateDefaults();
        $this->ShowHorizontalRule = 2;
    }

    function getCMSFields()
    {
        return new FieldList(
            new DropdownField('ShowHorizontalRule', 'Show a horizontal rule', self::$show_horizontal_rule)
        );
    }

    function getHorizontalRule()
    {
        if ($this->ShowHorizontalRule == 1) { return '<hr>'; }
        else if ($this->ShowHorizontalRule == 2) { return false; }
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