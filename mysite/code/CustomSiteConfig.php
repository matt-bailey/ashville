<?php

class CustomSiteConfig extends DataExtension
{
    static $db = array(
        'CompanyName' => 'Varchar(255)',
        'CompanyAddress' => 'Text',
        'CompanyTelephone' => 'Varchar(255)',
        'CompanyEmail' => 'Varchar(255)',
        'CompanyNumber' => 'Varchar(255)',
        'CompanyVatNumber' => 'Varchar(255)'
        //'ServicesSlidesPosition' => "Enum('right, below')"
    );

    static $has_one = array(
        'Watermark' => 'Image'
    );
    
    static $many_many = array(
        'HeaderLinks' => 'HeaderLink',
        'HeaderSocialLinks' => 'HeaderSocialLink',
        'ServicesSlides' => 'ServicesSlide',
        'FooterButtons' => 'FooterButton',
        'FooterLogos' => 'FooterLogo',
        'MenuCallouts' => 'MenuCallout'
    );    
    
    static $many_many_extraFields = array(
        'HeaderLinks' => array(
            'SortID' => 'Int'
        ),
        'HeaderSocialLinks' => array(
            'SortID' => 'Int'
        ),
        'ServicesSlides' => array(
            'SortID' => 'Int'
        ),
        'FooterButtons' => array(
            'SortID' => 'Int'
        ),
        'FooterLogos' => array(
            'SortID' => 'Int'
        ),
        'MenuCallouts' => array(
            'SortID' => 'Int'
        )
    );
            
    public function updateCMSFields(FieldList $existingFields)
    {
        $fields = $existingFields;
        $fields->removeByName('CarouselPosition');
        
        // Capitalise 'title'
        $fields->removeByName('Title');
        $fields->addFieldToTab('Root.Main', new Textfield('Title', 'Site Title'), 'Tagline');

        /**
         * Company site globals
         */
        $fields->addFieldsToTab('Root.Main',
            array(
                new TextField('CompanyName', 'Company Name'),
                new TextareaField('CompanyAddress', 'Company Address'),
                new TextField('CompanyTelephone', 'Company Telephone Number'),
                new TextField('CompanyEmail', 'Company Email Address'),
                new TextField('CompanyNumber', 'Company Number'),
                new TextField('CompanyVatNumber', 'Company VAT Number')
            )
        );
        
        /**
         * Header links
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $headerLinksField = new GridField(
            'HeaderLinks',
            'Header Links',
            $this->owner->HeaderLinks(),
            $config
        );      
        $fields->addFieldToTab('Root.HeaderLinks.Header.CustomerService', $headerLinksField);

        /**
         * Header social links
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $headerSocialLinksField = new GridField(
            'HeaderSocialLinks',
            'Header Social Links',
            $this->owner->HeaderSocialLinks(),
            $config
        );      
        $fields->addFieldToTab('Root.HeaderSocialLinks.Header.CustomerService', $headerSocialLinksField);

        /**
         * Services slides
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $ServicesSlidesField = new GridField(
            'ServicesSlides',
            'Services Slides',
            $this->owner->ServicesSlides(),
            $config
        );      
        $fields->addFieldToTab('Root.ServicesSlides.Header.CustomerService', $ServicesSlidesField);

        /**
         * Services carousel position
         */
        /*$fields->addFieldsToTab('Root.Global.Header.CustomerService', array(
            new DropdownField(
                'ServicesSlidesPosition',
                'Services Slides Position<br />(Relative to hero slideshow)',
                $this->owner->dbObject('ServicesSlidesPosition')->enumValues(),
                '',
                '',
                'Choose a position')
        ));*/

        /**
         * Footer buttons
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $footerButtonsField = new GridField(
            'FooterButtons',
            'Footer Buttons',
            $this->owner->FooterButtons(),
            $config
        );      
        $fields->addFieldToTab('Root.FooterButtons.Header.CustomerService', $footerButtonsField);

        /**
         * Footer logos
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $footerLogosField = new GridField(
            'FooterLogos',
            'Footer Logos',
            $this->owner->FooterLogos(),
            $config
        );      
        $fields->addFieldToTab('Root.FooterLogos.Header.CustomerService', $footerLogosField);

        /**
         * Menu callouts
         */
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortID'));
        $menuCalloutsField = new GridField(
            'MenuCallouts',
            'Menu Callouts',
            $this->owner->MenuCallouts(),
            $config
        );      
        $fields->addFieldToTab('Root.MenuCallouts.Header.CustomerService', $menuCalloutsField);

        /**
         * Watermark
         */
        $WatermarkUpload = new UploadField('Watermark', 'Watermark');
        $WatermarkUpload->setFolderName('Uploads/Watermarks');
        $fields->addFieldToTab('Root.Watermark.Header.CustomerService', $WatermarkUpload);

        return $fields;
    }
}