<?php

class NoSidebarPage extends Page {

    static $description = "A generic content page without a sidebar";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('SidebarWidgetArea');
        return $fields;
    }

}

class NoSidebarPage_Controller extends Page_Controller {}
