<?php

class FloorPlanArea extends DataObject
{
    static $db = array(
        'Title' => 'Varchar(255)',
        'LinkedFloorPlan' => 'Varchar(255)',
        'X1' => 'Int',
        'Y1' => 'Int',
        'X2' => 'Int',
        'Y2' => 'Int'
    );

    //static $default_sort = 'SortID';
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $linkedFloorPlan = $this->LinkedFloorPlan;
        $floorPlanDropdown = Dataobject::get('FloorPlan')->map('ID', 'Title');

        $leftJoinOneTable = 'FloorPlan';
        $leftJoinOne = '"FloorPlan"."ImageID" = "File"."ID"';
        $leftJoinTwoTable = 'FloorPlanArea';
        $leftJoinTwo = '"FloorPlanArea"."LinkedFloorPlan" = "FloorPlan"."ID"';

        if ($this->LinkedFloorPlan != null)
        {
            $floorPlanImage = DataList::create('File')
                ->leftJoin($leftJoinOneTable, $leftJoinOne, null)
                ->leftJoin($leftJoinTwoTable, $leftJoinTwo, null)
                ->where('FloorPlan.ID = '.$this->LinkedFloorPlan)
                ->sort('ID')
                ->toArray();
            
            // Get image filename from array
            foreach ($floorPlanImage as $inner)
            {
                $imgFilename = $inner->Filename;
            }

            // Return the FieldList with selected floor plan image
            return new FieldList(
                new TextField('Title', 'Floor plan area name'),
                new DropdownField('LinkedFloorPlan', 'Choose a floor plan', $floorPlanDropdown,'','',''),
                new LiteralField('ImgAreaSelectInstructions', '<div><p>Click and drag on image to create an area map.</p></div>'),
                new LiteralField('ImgAreaSelect', '<div><img id="floorplan" src="' . $imgFilename . '"></div>'),
                new HiddenField('X1', 'X1'),
                new HiddenField('Y1', 'Y1'),
                new HiddenField('X2', 'X2'),
                new HiddenField('Y2', 'Y2')
            );
        }
        else
        {
            // Return the FieldList without a floor plan image
            return new FieldList(
                new TextField('Title', 'Floor plan area name'),
                new DropdownField('LinkedFloorPlan', 'Choose a floor plan', $floorPlanDropdown,'','',''),
                new LiteralField('ImgAreaSelectInstructions', '<div><p>You will be able to define a floor plan area once you have saved the record for the first time.</p></div>'),
                new HiddenField('X1', 'X1'),
                new HiddenField('Y1', 'Y1'),
                new HiddenField('X2', 'X2'),
                new HiddenField('Y2', 'Y2')
            );
        }
    }

    public function getFloorPlanAreaImages()
    {
        $floorPlanAreaID = $this->ID;

        $records = DB::query(
            "SELECT `FloorPlanArea`.*, `FloorPlanAreaImage`.* 
            FROM `FloorPlanArea` 
            LEFT JOIN `FloorPlanAreaImage` ON `FloorPlanArea`.`ID` = `FloorPlanAreaImage`.`LinkedFloorPlanArea` 
            WHERE `FloorPlanArea`.`ID` = $floorPlanAreaID
            "
        );

        $output = new ArrayList();

        foreach($records as $record)
        {
            $output->push(new ArrayData($record));
        }

        return $output;
    }
}
