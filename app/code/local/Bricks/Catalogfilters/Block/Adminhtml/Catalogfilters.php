<?php
class Bricks_Catalogfilters_Block_Adminhtml_Catalogfilters extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_catalogfilters';
        $this->_blockGroup = 'catalogfilters';
        $this->_headerText = Mage::helper('Catalogfilters')->__('Reward Manager');
        $this->_addButtonLabel = Mage::helper('Catalogfilters')->__('Add Reward');
        parent::__construct();
    }
}