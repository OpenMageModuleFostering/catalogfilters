<?php
class Bricks_Catalogfilters_Model_Catalogfilters extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('catalogfilters/catalogfilters');
    }
}