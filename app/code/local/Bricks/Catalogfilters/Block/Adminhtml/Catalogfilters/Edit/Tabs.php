<?php

class Bricks_Catalogfilters_Block_Adminhtml_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('catalogfilters_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('catalogfilters')->__('Review Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('catalogfilters')->__('Review Information'),
          'title'     => Mage::helper('catalogfilters')->__('Review Information'),
          'content'   => $this->getLayout()->createBlock('catalogfilters/adminhtml_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}