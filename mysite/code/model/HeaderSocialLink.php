<?php

class HeaderSocialLink extends DataObject
{
    static $db = array(
        'Description' => 'Varchar(255)',
        'IconKeyword' => 'Varchar(255)',
        'IconColour' => 'Varchar(255)',
        "IconType" => "Enum('Regular, Circle')",
        'URL' => 'Varchar(255)'
    );

    static $has_one = array(
        'Image' => 'Image'
    );
	
    static $default_sort = 'SortID';
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            new TextField('Description', 'Description'),
            new TextField('IconKeyword', 'Icon Keyword'),
            new ColorField('IconColour', 'Icon Colour'),
            new DropdownField('IconType','Choose Icon Type', singleton('HeaderSocialLink')->dbObject('IconType')->enumValues()),
            new TextField('URL', 'Link URL'),
            new UploadField('Image', 'Image <br>(optional - only required if Icon Keyword above is not used)'),
            new LiteralField('SSSocial', '<div class="field"><label class="left"></label><div class="middleColumn"><a class="fancybox-ajax" href="/mysite/symbolset/ss-social/documentation.html">Click here to view available icons and their keywords</a></div></div>')
        ));

        return $fields;
    }

    function obfuscatedEmail()
    { 
        return Email::obfuscate('my@email.com', 'direction'); 
    }

    public function getThumbnail()
    { 
        return $this->Image()->CMSThumbnail(); 
    }
}