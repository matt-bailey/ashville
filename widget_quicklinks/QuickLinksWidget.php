<?php

class QuickLinksWidget extends Widget
{
    static $cmsTitle = "Quick Links Widget";
    static $description = "Displays a list of links";
    static $db = array(
        'WidgetTitle' => 'Varchar(255)',
        'WidgetLinks' => 'Text'
    );
    
    function getCMSFields(){
        return new FieldList(
			new TextField('WidgetTitle', 'Widget Title'),
			new TextareaField('WidgetLinks', 'Links <br>Link format: URL [space] text')
		);
    }

    function getNiceLinks() {
        if ($this->WidgetLinks) {
            $entries = explode("\n", $this->WidgetLinks);
            $set = new ArrayList();
            foreach ($entries as $entry) {
                $link = explode(" ", $entry, 2);
                $set->push(new ArrayData(array('URL' => $link[0], 'Text' => ($link[1]) ? $link[1] : $link[0])));
            }
            return $set;
        }
    }
	
	public function Title() {
		return $this->WidgetTitle;
	}
}