<?php

class CaseStudyPage extends Page
{
    static $description = 'Case study page';

    static $many_many = array(
        'FloorPlans' => 'FloorPlan',
        'FloorPlanAreas' => 'FloorPlanArea',
        'FloorPlanAreaImages' => 'FloorPlanAreaImage',
        'CaseStudyCategories' => 'CaseStudyCategory'
    );

    static $many_many_extraFields = array(
        'FloorPlans' => array(
            'SortID' => 'Int'
        ),
        'FloorPlanAreas' => array(
            'SortID' => 'Int'
        ),
        'FloorPlanAreaImages' => array(
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
         * Floor plans
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $floorPlansField = new GridField(
            'FloorPlans',
            'Floor Plans',
            $this->owner->FloorPlans(),
            $config
        );      
        $fields->addFieldToTab('Root.FloorPlans', $floorPlansField);

        /**
         * Floor plan areas
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $floorPlanAreasField = new GridField(
            'FloorPlanAreas',
            'Floor Plan Areas',
            $this->owner->FloorPlanAreas(),
            $config
        );      
        $fields->addFieldToTab('Root.FloorPlanAreas', $floorPlanAreasField);

        /**
         * Floor plan area images
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $floorPlanAreaImagesField = new GridField(
            'FloorPlanAreaImages',
            'Floor Plan Area Images',
            $this->owner->FloorPlanAreaImages(),
            $config
        );      
        $fields->addFieldToTab('Root.FloorPlanAreaImages', $floorPlanAreaImagesField);

        /**
         * Case study categories
         */
        $caseStudyCats = DataObject::get("CaseStudyCategory", "CaseStudyHolderID = '" . $this->ParentID . "'");
        if ($caseStudyCats) {
            $fields->addFieldToTab("Root.CaseStudyCategories", new HeaderField("Select case study categories", 2));
            $map = $caseStudyCats->map("ID", "Category");
            $fields->addFieldToTab("Root.CaseStudyCategories", new CheckboxSetField('CaseStudyCategories', 'Case Study Categories', $map));
        }

        return $fields;
    }
}

class CaseStudyPage_Controller extends Page_Controller
{}
