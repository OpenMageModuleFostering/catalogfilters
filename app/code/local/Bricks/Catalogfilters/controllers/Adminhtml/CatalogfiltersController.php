<?php
class Bricks_Catalogfilters_Adminhtml_CatalogfiltersController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('catalogfilters/items')
			->_addBreadcrumb(Mage::helper('adminhtml')->__('Items Manager'), Mage::helper('adminhtml')->__('Item Manager'));
		
		return $this;
	}
	public function indexAction() {

	}

	public function editAction() {
		$collection = Mage::getModel('catalogfilters/catalogfilters')->getCollection();
		$model = Mage::getModel('catalogfilters/catalogfilters');
		if(empty($collection->getData()))
		{
			$filter_attribute_code = '';
			$array['filter_attribute_code'] = $filter_attribute_code;
            $model->setData($array);
            $model->save();
		}
		$this->loadLayout();
		 $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

		$this->_addContent($this->getLayout()->createBlock('catalogfilters/adminhtml_catalogfilters_edit'));

		$this->renderLayout();
	}
 
	public function newAction() {
        $this->_forward('edit');
	}

    public function updateAction()
    {
        $model = Mage::getModel('catalogfilters/catalogfilters')->load(1);
        // echo "<pre>";
        // print_r($model);exit;
        if(!empty($model->getData()))
        {
	        if ($data = $this->getRequest()->getPost()) {
				$filter_attribute_code = implode(',',$data['filter_attribute_code']);
				if($filter_attribute_code=='')
				{
					$filter_attribute_code = "";
				}
				$array['filter_attribute_code'] = $filter_attribute_code;
	            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item successfully updated'));
	            $model->setData($array)->setId(1);
	            $model->save();
	        }
    	}
        $this->_redirect('*/*/edit');
    }
}
