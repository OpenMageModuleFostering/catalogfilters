<?php

class Bricks_Catalogfilters_Block_Adminhtml_Catalogfilters_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _construct()
    {
    parent::_construct();
    }

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/update', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post'
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        
        $model = Mage::getModel('catalogfilters/catalogfilters')->load(1);
        $array = explode(',', $model->getFilterAttributeCode());
        $attributes = Mage::getResourceModel('catalog/product_attribute_collection')->getItems();
        $attrbArray = array();
        foreach ($attributes as $attribute){
            if($attribute->getIsFilterable() && $attribute->getIsVisible())
            {
                $attrbArray[] = array(
                'value' => $attribute->getAttributecode(),
                'label' => $attribute->getFrontendLabel(),
                );
            }
        }
        $fieldset = $form->addFieldset('new_reward', array('legend' => 'Catagory Filters'));

        $fieldset->addField('attributes', 'multiselect', array(
            'label' => 'Select Attributes',
            'name' => 'filter_attribute_code',
            'multiple'  =>"multiple",
            'required' => false,
            'values' => $attrbArray,
            'value' =>$array
        ));
        return parent::_prepareForm();
    }
}