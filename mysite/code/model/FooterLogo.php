<?php

class FooterLogo extends DataObject
{
    static $db = array(
        'Description' => 'Varchar(255)',
        'LinkType' => "Enum('internal, external')",
        'InternalLink' => 'Text',
        'ExternalLink' => 'Text'
    );
	
    static $has_one = array(
        'Image' => 'Image'
    );
	
    static $default_sort = 'SortID';
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('InternalLink');
        $fields->removeByName('ExternalLink');
        $fields->removeByName('LinkType');

        $fields->addFieldsToTab('Root.Main', array( 
            new LiteralField('LinkWrapStart', '<div class="field"><label class="left">Link</label><div class="middleColumn">'),
            new SelectionGroup(
                'LinkType',
                array(
                    'external//External URL (Including http://)' => new TextField('ExternalLink', ''),
                    'internal//Internal Page' => new TreeDropdownField(
                        'InternalLink',
                        '',
                        'SiteTree',
                        'ID',
                        'TreeTitle'
                    )
                )
            ),
            new LiteralField('LinkWrapEnd', '</div></div>'),
        ));

        $fields->addFieldToTab(
            "Root.Main",
            $ImageUpload = new UploadField(
                'Image',
                'Logo'
            )
        );
        $ImageUpload->setFolderName('Uploads/Logos');

        return $fields;
    }

    public function Link()
    {
        if ($this->LinkType === 'internal' && $this->InternalLink) {
            return DataObject::get_by_id('SiteTree', $this->InternalLink)->Link();
        } elseif ($this->LinkType === 'external' && $this->ExternalLink) {
            return $this->ExternalLink;
        }
    }
    
	public function getThumbnail()
    { 
		return $this->Image()->CMSThumbnail(); 
	}
}