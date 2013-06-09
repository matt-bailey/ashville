<?php

class CaseStudyHolder extends Page
{
    static $description = 'Page containing case studies';
    
    static $db = array();

    static $has_one = array(
        "Subsite" => "Subsite"
    );
    
    static $has_many = array(
        'CaseStudyCategories' => 'CaseStudyCategory',
    );

    static $allowed_children = array('CaseStudyPage');

    static $icon = 'mysite/images/icons/casestudyicon';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('ContentArea2');
        $fields->removeByName('ContentArea3');
        $fields->removeByName('MainContentWidgetArea');

        /**
         * Case study categories
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $caseStudyCategoriesField = new GridField(
            'CaseStudyCategories',
            'Case Study Categories',
            $this->CaseStudyCategories(),
            $config
        );      
        $fields->addFieldToTab('Root.CaseStudyCategories', $caseStudyCategoriesField);
        
        return $fields;
    }
}

class CaseStudyHolder_Controller extends Page_Controller
{

}
