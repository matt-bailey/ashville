<?php

class SlideItem extends DataObject
{
    static $db = array(
        'Title' => 'Varchar(255)',
        'Caption' => 'Text',
        'SlideCaptionPosition' => "Enum('top, bottom')",
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