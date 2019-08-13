<?php

class Bricks_Catalogfilters_Model_Mysql4_Catalogfilters_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	   public function _construct()
	   {
			parent::_construct();
			$this->_init('catalogfilters/catalogfilters');
	   }

}
