<?php

class FloorPlan extends DataObject
{
    static $db = array(
        'Title' => 'Varchar(255)',
        'Description' => 'HTMLText'
    );
	
    static $has_one = array(
        'Image' => 'Image'
    );

    public static $summary_fields = array(
        'Thumbnail' => 'Thumbnail',
        'Title' => 'Title',
        'Description' => 'Description'
    );

    static $default_sort = 'SortID';
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $ImageUpload = new UploadField('Image', 'Floor plan');
        $ImageUpload->setFolderName('Uploads/FloorPlans');

        return new FieldList(
            new TextField('Title', 'Floor plan name'),
            new HtmlEditorField('Description', 'Description'),
            new LiteralField('ImgUploadInstructions', '<div><p>Recommended image width at least 767px.</p></div>'),
            $ImageUpload
        );
    }

    public function getFloorPlanAreas()
    {
        $floorPlanID = $this->ID;

        $records = DB::query(
            "SELECT `FloorPlan`.*, `FloorPlanArea`.* 
            FROM `FloorPlan` 
            LEFT JOIN `FloorPlanArea` ON `FloorPlan`.`ID` = `FloorPlanArea`.`LinkedFloorPlan` 
            WHERE `FloorPlan`.`ID` = $floorPlanID
            "
        );

        /*foreach($records as $record)
        {
            $objects[] = new $record['ClassName']($record);

            if(isset($objects))
            {
                $doSet = new ArrayList($objects);
                $doSet->push(array('foo' => 'bar'));
            }
            else
            {
                $doSet = new ArrayList();
                $doSet->push(array('foo' => 'bar'));
            }
        }*/

        // return $doSet;

        $output = new ArrayList();

        foreach($records as $record)
        {
            $output->push(new ArrayData($record));
        }

        return $output;
    }
    
	public function getThumbnail()
    { 
		return $this->Image()->CMSThumbnail(); 
	}

    public function getTitleKey()
    {
        return strtolower(str_replace(' ', '-', $this->Title));
    }
}