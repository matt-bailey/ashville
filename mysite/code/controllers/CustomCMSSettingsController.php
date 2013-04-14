<?php

class CustomCMSSettingsController extends CMSSettingsController
{
    /*public function init()
	{
		Requirements::css('mysite/css/CustomCMSSettingsController.css');
		parent::init();
	}*/
    /**
     * Overwrite the Breadcrumbs on Settings Controller as they will the 'back'
     * button needed for grid fields. Otherwise the user gets stuck on the data
     * object edit page
     * 
     * @param bool $unlinked
     * @return ArrayList
     */
    public function Breadcrumbs($unlinked = false)
    {
        return LeftAndMain::Breadcrumbs($unlinked);
    }
}   