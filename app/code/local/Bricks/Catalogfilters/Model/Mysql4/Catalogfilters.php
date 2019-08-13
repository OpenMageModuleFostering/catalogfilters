<?php

class Bricks_Catalogfilters_Model_Mysql4_Catalogfilters extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the review_id refers to the key field in your database table.
        $this->_init('catalogfilters/catalogfilters', 'id');
    }
    
    	 /**
     * Process page data before saving
     *
     * @param Mage_Core_Model_Abstract $object
     */
    // protected function _beforeSave(Mage_Core_Model_Abstract $object)
    // {
    	
    //     if (! $object->getId() && $object->getCreationTime() == "") {
    //         $object->setCreationTime(Mage::getSingleton('core/date')->gmtDate());
    //     }
        
    //     $format = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
    //     if ($date = $object->getData('creation_time')) {
	   //      $object->setData('creation_time', Mage::app()->getLocale()->date($date, $format, null, false)
    // 		        ->toString(Varien_Date::DATETIME_INTERNAL_FORMAT)
    //     );
    //     }
    //     $object->setUpdateTime(Mage::getSingleton('core/date')->gmtDate());
        
    //     return $this;
    // }
    
    /**
     * Assign page to store views
     *
     * @param Mage_Core_Model_Abstract $object
     */
    protected function _afterSave(Mage_Core_Model_Abstract $object)
    {
        return parent::_afterSave($object);
    }    
}