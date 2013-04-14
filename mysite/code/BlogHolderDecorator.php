<?php
class BlogHolderDecorator extends DataExtension
{
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $this->extend('updateCMSFields', $fields);
        return $fields;
    }

    /**
     * Remove unneeded widget areas
     */
    public function updateCMSFields(FieldList $fields)
    {
        //$fields->removeByName('UseParentWidgets');
        $fields->removeByName('SideBar');
        $fields->removeByName('InheritSideBar');
        $fields->removeByName('MainContentWidgetArea');
        return $fields;
    }
}