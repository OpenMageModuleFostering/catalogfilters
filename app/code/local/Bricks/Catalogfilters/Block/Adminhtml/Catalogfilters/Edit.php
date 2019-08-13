<?php

class Bricks_Catalogfilters_Block_Adminhtml_Catalogfilters_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'catalogfilters';
        $this->_controller = 'adminhtml_catalogfilters';

        $this->_updateButton('save', 'label', Mage::helper('catalogfilters')->__('Save Settings'));
        $this->_updateButton('delete', 'label', Mage::helper('catalogfilters')->__('Delete Option'));

    }

    public function getHeaderText()
    {
        if( Mage::registry('catalogfilters_data') && Mage::registry('catalogfilters_data')->getId() ) {
            return Mage::helper('catalogfilters')->__("Edit Review");
        } else {
            return Mage::helper('catalogfilters')->__('Select Attributes To Filter');
        }

    }
}