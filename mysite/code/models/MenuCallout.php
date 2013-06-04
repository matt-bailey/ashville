<?php

class MenuCallout extends DataObject
{
    static $db = array(
        'MenuItem' => 'Varchar(255)'
    );
	
    static $has_one = array(
        'Image' => 'Image'
    );

    public static $summary_fields = array(
        'Thumbnail' => 'Thumbnail',
        'MenuItem' => 'MenuItem'
    );
	
    static $default_sort = 'SortID';
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('MenuItem');

        $fields->addFieldsToTab('Root.Main', array(
            new DropdownField(
                'MenuItem',
                'Associated Menu Item',
                Dataobject::get("SiteTree")
                    ->where('ParentID = 0 and ShowInMenus = 1')
                    ->map("URLSegment", "Title", "Please Select")
            )
            // new TreeDropdownField(
            //     'MenuItem',
            //     'Select Associated Menu Item',
            //     'SiteTree',
            //     'URLSegment',
            //     'MenuTitle'
            // )

        ));

        $menuItem = $this->MenuItem;

        $fields->addFieldToTab(
            "Root.Main",
            $ImageUpload = new UploadField(
                'Image',
                'Menu Callout'
            )
        );
        $ImageUpload->setFolderName('Uploads/MenuCallouts');

        return $fields;
    }

    public function Link()
    {
        return DataObject::get_by_id('SiteTree', $this->InternalLink)->Link();
    }
    
	public function getThumbnail()
    { 
		return $this->Image()->CMSThumbnail(); 
	}
}