<?php
class CaseStudyCategory extends DataObject
{
    static $db = array(
        'SortID' => 'Int',
        'Category' => 'Varchar(200)'
    );
    
    static $has_one = array(
        'CaseStudyHolder' => 'CaseStudyHolder'
    );
    
    static $default_sort = 'SortID';

    public static $summary_fields = array(
        'Category' => 'Category'
    );
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField('Category', new TextField('Category', 'Category Name'));
        $fields->removeByName('SortID');
        $fields->removeByName('CaseStudyHolderID');
        return $fields;
    }
    
    public function validate()
    {
        $result = parent::validate();
        if (empty($this->Category)) {
            $result->error('Category name must be specified');
        }
        return $result;
    }
    
    /**
     * Get case study categories associated with current case study
     * @return DataList 
     */
    public function GetCaseStudyCats()
    {
        $caseStudyCatsDataList = new DataList('CaseStudyPage');
        $caseStudyCatsDataList->where('CaseStudyCategoryID = ' . $this->ID);
        $caseStudyCatsDataList->innerJoin('CaseStudyPage_CaseStudyCategories', 'CaseStudyPageID = SiteTree_Live.ID');      
        return $caseStudyCatsDataList;
    }
    
    /**
     * Check if current case study category has case study pages associated with it
     * @return boolean 
     */
    public function HasCaseStudies()
    {
        return ($this->GetCaseStudyCats()->Count()) ? true : false;
    }
}