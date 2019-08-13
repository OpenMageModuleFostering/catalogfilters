<?php

class Bricks_Catalogfilters_Block_Adminhtml_Catalogfilters_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('catalogfiltersGrid');
      $this->setDefaultSort('catalogfilters_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      // $collection = Mage::getModel('catalogfilters/catalogfilters')->getCollection()->setOrder('reward_id','DESC');
      
      //$collection->addFieldToSelect('*');
      //$collection->getSelect()->where("parent_forum_id != 0");
      
      //$collection->addAttributeToSort('forum_id', 'DESC');
       
      // $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
     $this->addColumn('catalogfilters_id', array(
          'header'    => Mage::helper('catalogfilters')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'catalogfilters_id',
      ));

      $this->addColumn('catalogfilters_name', array(
          'header'    => Mage::helper('catalogfilters')->__('catalogfilters Name'),
          'align'     =>'left',
          'index'     => 'catalogfilters_name',
      ));
      
      $this->addColumn('catalogfilters_count', array(
	  'header'    => Mage::helper('catalogfilters')->__('Review Count'),
          'align'     => 'left',
          'index'     => 'catalogfilters_count',
          'sortable'  => false,
          'filter'    => false,
      ));   
      
      $this->addColumn('message', array(
          'header'    => Mage::helper('catalogfilters')->__('Message'),
          'align'     =>'left',
          'index'     => 'message',
      ));

      $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('catalogfilters')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('catalogfilters')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
      ));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('catalogfilters_id');
        $this->getMassactionBlock()->setFormFieldName('catalogfilters');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('catalogfilters')->__('Delete'),
             'url'      => $this->getUrl('*/*/massdelete'),
             'confirm'  => Mage::helper('catalogfilters')->__('Are you sure?')
        ));


        return $this;
    }


}