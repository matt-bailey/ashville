<?php

class ImageBannerWidget extends Widget
{
    static $cmsTitle = "Image Banner Widget";
    static $description = "Displays an image banner (image and text link)";

    static $db = array(
        'WidgetTitle' => 'Varchar(255)',
        'ImageBannerTitle' => 'Varchar(255)',
        'InternalLink' => 'Text',
        'ExternalLink' => 'Text'
    );

    static $has_one = array( 
        'ImageBannerImage' => 'Image' 
    );
    
    function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Get the current image if it exists
        $imageBannerImageName = $this->ImageBannerImage->Name;
        if (!$imageBannerImageName)
        {
            $imageBannerImage = '<br /><br />(Upload images to the Banners folder in the Files admin section)';
        } else {
            $imageBannerImage = '<br /><br /><img src="/assets/Uploads/Banners/'.$imageBannerImageName.'" width="150">';
        }

        // Show images in Banners folder
        $dropdown = array('0' => "Folder 'Banners' does not exist");
        $folder = DataObject::get_one('Folder', "Title = 'Banners'");
        if ($folder) {
            $images = DataObject::get('Image', 'ParentID = ' . $folder->ID);
            if ($images->count()) {
                $dropdown = $images->map('ID', 'Name', 'None');

            } else {
                $dropdown = array('0' => "No images in folder 'Banners'");
            }
        }

        $fields->merge(
            new FieldList(
                new TextField('ImageBannerTitle', 'Image Banner Title'),
                new DropdownField('ImageBannerImageID', 'Image'.$imageBannerImage, $dropdown, '', null, 'No image'),
                new DropdownField('InternalLink', 'Choose an internal link', SiteTree::get()->map(), '', null, 'No page selected'),
                new TextField('ExternalLink', 'Or, enter an external link')
            )
        );
        
        $this->extend('updateCMSFields', $fields);
        
        return $fields;
    }

    // Get image
    public function getImageBannerImage()
    {
        return $this->ImageBannerImage();
    }

    // Get links
    public function ImageBannerLink()
    {
        if ($this->InternalLink) {
            return DataObject::get_by_id('SiteTree', $this->InternalLink)->Link();
        } elseif ($this->ExternalLink) {
            return $this->ExternalLink;
        } else {
            return null;
        }
    }
    
    public function Title()
    {
        return null;
    }
}
