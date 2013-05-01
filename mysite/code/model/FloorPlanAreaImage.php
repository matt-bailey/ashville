<?php

class FloorPlanAreaImage extends DataObject
{
    static $db = array(
        'Title' => 'Varchar(255)',
        'Description' => 'HTMLText',
        'LinkedFloorPlanArea' => 'Varchar(255)'
    );

    static $has_one = array(
        'Image' => 'Image'
    );

    public static $summary_fields = array(
        'Thumbnail'=>'Thumbnail',
        'Title' => 'Title',
        'Description' => 'Description'
    );
    
    static $default_sort = 'SortID';
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $floorPlanAreaDropdown = Dataobject::get('FloorPlanArea')->sort('Title')->map('ID', 'Title');

        $ImageUpload = new UploadField('Image', 'Image');
        $ImageUpload->setFolderName('Uploads/Casestudies');

        /*
        $leftJoinOneTable = 'FloorPlanAreaImage';
        $leftJoinOne = '"FloorPlanAreaImage"."LinkedFloorPlanArea" = "FloorPlanArea"."ID"';

        $floorPlanImage = DataList::create('FloorPlanArea')
            ->leftJoin($leftJoinOneTable, $leftJoinOne, null)
            ->where('FloorPlanArea.ID = '.$this->LinkedFloorPlanArea)
            ->sort('ID')
            ->toArray();

        // Get the linked floor plan id from array
        // foreach ($floorPlanImage as $inner)
        // {
        //     $floorPlanID = $inner->LinkedFloorPlan;
        // }
        $floorPlanID = $floorPlanImage[0]->LinkedFloorPlan;
        */

        return new FieldList(
            new TextField('Title', 'Image name'),
            new HtmlEditorField('Description', 'Image caption'),
            new DropdownField('LinkedFloorPlanArea', 'Choose a floor plan area', $floorPlanAreaDropdown,'','',''),
            $ImageUpload
        );
    }

    public function getThumbnail()
    { 
        return $this->Image()->CMSThumbnail();
    }
}
