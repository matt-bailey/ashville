<?php
/**
 * an extension to the @see DataObject class
 * Blog Categories are created and maintained through
 * the BlogHolder class through a has_many relationship.
 * BlogCategories can then be assigned to individual
 * blog entires through a many_many relationship
 * @author Ryan McLaren
 * @package model
 *
 */
class BlogCategory extends DataObject {
    
    public static $db=array(
                            'URLSegment' => 'Varchar(255)',
                            'Title'=>'Varchar(250)'                          
                        );
    
    public static $has_one=array(
                                    'Parent'=>'BlogHolder'
                                );
    
    public static $belongs_many_many=array(
                                            'BlogEntry'=>'BlogEntry'
                                        );
    
    public static $summary_fields=array(
                                        'Title'=>'Title'                                        
                                    );
    
    /**
     * fields used the in the CMS
     * @see DataObject::getCMSFields()
     * @return {FieldList}
     */
    public function getCMSFields(){
        return new FieldList(
                            new TextField('Title','Title')
                        );
    }
    
    //Set URLSegment to be unique on write
    function onBeforeWrite(){
        // If there is no URLSegment set, generate one from Title
        if((!$this->URLSegment || $this->URLSegment == 'new-product') && $this->Title != 'New Product')
        {
            $siteTree = DataList::create('SiteTree')->first();
            $this->URLSegment = $siteTree->generateURLSegment($this->Title);
        }
        else if($this->isChanged('URLSegment'))
        {
            // Make sure the URLSegment is valid for use in a URL
            $segment = preg_replace('/[^A-Za-z0-9]+/','-',$this->URLSegment);
            $segment = preg_replace('/-+/','-',$segment);
    
            // If after sanitising there is no URLSegment, give it a reasonable default
            if(!$segment) {
                $segment = "product-$this->ID";
            }
            $this->URLSegment = $segment;
        }
    
        // Ensure that this object has a non-conflicting URLSegment value.
        $count = 2;
        while($this->LookForExistingURLSegment($this->URLSegment))
        {
            $this->URLSegment = preg_replace('/-[0-9]+$/', null, $this->URLSegment) . '-' . $count;
            $count++;
        }
    
        parent::onBeforeWrite();
    }
    
    //Test whether the URLSegment exists already on another Product
    public function LookForExistingURLSegment($URLSegment){
        if(DataList::create('BlogCategory')->where("URLSegment = '" . $URLSegment ."' AND ID != " . $this->ID)->count() >= 1){
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * returns the the full URL to this category
     * @return string
     */
    public function getLink(){
        return Controller::join_links(Director::get_current_page(), $this->Parent()->Link(), 'category', $this->URLSegment);
    }
          
}
?>
