<?php

class CaseStudyHolder extends Page
{
    static $allowed_children = array('CaseStudyPage');

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('ContentArea2');
        $fields->removeByName('ContentArea3');
        $fields->removeByName('MainContentWidgetArea');
        return $fields;
    }
}

class CaseStudyHolder_Controller extends Page_Controller
{

}
