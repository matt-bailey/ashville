<?php

class CaseStudyPage extends Page
{
    static $many_many = array(
        'FloorPlanItems' => 'FloorPlanItem'
    );

    static $many_many_extraFields = array(
        'FloorPlanItems' => array(
            'SortID' => 'Int'
        )
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('ContentArea2');
        $fields->removeByName('ContentArea3');
        $fields->removeByName('MainContentWidgetArea');

        /**
         * Slide items
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $floorPlanItemsField = new GridField(
            'FloorPlanItems',
            'Floor Plans',
            $this->owner->FloorPlanItems(),
            $config
        );      
        $fields->addFieldToTab('Root.FloorPlans', $floorPlanItemsField);

        return $fields;
    }
}

class CaseStudyPage_Controller extends Page_Controller
{

}
