<?php

class FeatureWidget extends Widget
{
    static $cmsTitle = "Feature Widget";
    static $description = "Displays a feature (image and linked text)";

    static $db = array(
        'WidgetTitle' => 'Varchar(255)',
        'FeatureTitle' => 'Varchar(255)',
        'FeatureText' => 'HTMLText',
        'ButtonText' => 'Varchar(255)',
        'InternalLink' => 'Text',
        'ExternalLink' => 'Text',
        'WidgetLayoutType' => 'Int',
        'BackgroundFill' => 'Int'
    );

    static $has_one = array( 
        'FeatureImage' => 'Image' 
    );

    static $widget_layout_types = array(
        1 => '1/4 width',
        2 => '1/3 width',
        3 => '1/2 width',
        4 => 'Full width, image left',
        5 => 'Full width, image right'
    );

    static $background_fill = array(
        1 => 'Yes',
        2 => 'No'
    );

    // Set default values
    public function populateDefaults()
    {
        parent::populateDefaults();
        // Set WidgetLayoutType to so width defaults to span3 in sidebars
        $this->WidgetLayoutType = 2;
        $this->BackgroundFill = 1;
    }
    
    function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Get the current image if it exists
        $featureImageName = $this->FeatureImage->Name;
        if (!$featureImageName)
        {
            $featureImage = '<br /><br />(Upload images to the Features folder in the Files admin section)';
        } else {
            $featureImage = '<br /><br /><img src="/assets/Uploads/Features/'.$featureImageName.'" width="150">';
        }

        // Show images in Features folder
        $dropdown = array('0' => "Folder 'Features' does not exist");
        $folder = DataObject::get_one('Folder', "Title = 'Features'");
        if ($folder) {
            $images = DataObject::get('Image', 'ParentID = ' . $folder->ID);
            if ($images->count()) {
                $dropdown = $images->map('ID', 'Name', 'None');

            } else {
                $dropdown = array('0' => "No images in folder 'Features'");
            }
        }

        $fields->merge(
            new FieldList(
                new TextField('FeatureTitle', 'Feature Title'),
                new TextareaField('FeatureText', 'Feature Text<br />(HTML allowed)'),
                new DropdownField('FeatureImageID', 'Image'.$featureImage, $dropdown, '', null, 'No image'),
                new DropdownField('BackgroundFill', 'Background Fill', self::$background_fill),
                new DropdownField('InternalLink', 'Choose an internal link', SiteTree::get()->map(), '', null, 'No page selected'),
                new TextField('ExternalLink', 'Or, enter an external link'),
                new TextField('ButtonText', 'Button Text', 'Read More'),
                new DropdownField('WidgetLayoutType', 'Widget layout type', self::$widget_layout_types)
            )
        );
        
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
    }

    // Get image
    public function getFeatureImage()
    {
        return $this->FeatureImage();
    }

    // Get links
    public function FeatureLink()
    {
        if ($this->InternalLink) {
            return DataObject::get_by_id('SiteTree', $this->InternalLink)->Link();
        } elseif ($this->ExternalLink) {
            return $this->ExternalLink;
        } else {
            return null;
        }
    }

    public function getBackgroundFillType()
    {
        if ($this->BackgroundFill)
        {
            if ($this->BackgroundFill == 1) { return 'bg-fill'; }
            else if ($this->BackgroundFill == 2) { return 'no-bg-fill'; }
        }
    }

    public function getWidgetLayout()
    {
        // Get page type
        $current_page_type = Director::get_current_page()->ClassName;

        // Widget layout types for No sidebar pages
        if ($current_page_type == 'NoSidebarPage')
        {
            if ($this->WidgetLayoutType)
            {
                if ($this->WidgetLayoutType == 0) { return 'span-12'; }
                else if ($this->WidgetLayoutType == 1) { return 'span3'; }
                else if ($this->WidgetLayoutType == 2) { return 'span4'; }
                else if ($this->WidgetLayoutType == 3) { return 'span6'; }
                else if ($this->WidgetLayoutType == 4) { return 'span12 img-left'; }
                else if ($this->WidgetLayoutType == 5) { return 'span12 img-right'; }
            }
        }
        // Widget layout types for all other pages
        else
        {
            if ($this->WidgetLayoutType)
            {
                if ($this->WidgetLayoutType == 0) { return 'span-9'; }
                else if ($this->WidgetLayoutType == 1) { return 'span-quarter'; }
                else if ($this->WidgetLayoutType == 2) { return 'span3'; }
                else if ($this->WidgetLayoutType == 3) { return 'span-half'; }
                else if ($this->WidgetLayoutType == 4) { return 'span9 img-left'; }
                else if ($this->WidgetLayoutType == 5) { return 'span9 img-right'; }
            }
        }
    }
    
    public function Title()
    {
        return null;
    }
}
