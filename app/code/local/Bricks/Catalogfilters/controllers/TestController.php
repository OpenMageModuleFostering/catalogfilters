<?php
class Bricks_Catalogfilters_TestController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
     {
        $this->loadLayout();
        $this->renderLayout();  
     }
     public function loadAttribsAction()
     {
        $counter = 0;
        $cate_id = $_GET['cate_id'];
        $category  = Mage::getModel('catalog/category')->load($cate_id);
        $products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->addCategoryFilter($category)
            ->load();
        $model = Mage::getModel('catalogfilters/catalogfilters')->load(1);

        $array = explode(',', $model->getFilterAttributeCode());
        if($model->getFilterAttributeCode())
        {
            foreach ($array as $arr) {
                $result = array();
              if($arr!='price'){
                foreach ($products as $product) {
                  $producer = $product->getAttributeText($arr);
                  if(!empty($product->getData($arr)))
                    $beforedat = $product->getData($arr);
                      $result[$producer] = $product->getData($arr);
                      if($result[$producer]==0 || $result[$producer]=='')
                      {
                        unset($result[$producer]);
                      }
                }
               ksort($result); 
              }else
              {
                $result = array('0 - 100'=>'0-100', '100 - 200'=> '100-200','200 - 500'=>'200-500',
                      '500 - 1000'=> '500-1000','1000 - 2500'=>'1000-2500',
                       '2500 - 5000'=>'2500-5000','5000 - 10000'=>'5000-10000');
              }
              $data[$arr] = $result;
            }
        }else
        {
            $data['error'] = 'No Attributes selected';
        }
        // print_r($data);exit;
        // print_r($data);
        // exit;
        // $children = Mage::getModel('catalog/category')->getCategories($cate_id);

        // $data['brands'] = $result;
        // $data['cates'] = $this->getCategoryArray($children);
        echo json_encode($data);exit;   
     }
}
