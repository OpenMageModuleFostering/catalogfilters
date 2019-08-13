<?php
class Bricks_Catalogfilters_Model_Observer{
    public function changeColletion(Varien_Event_Observer $observer)
    {
        $collection = $observer->getCollection();
        $model = Mage::getModel('catalogfilters/catalogfilters')->load(1);
        $array = explode(',', $model->getFilterAttributeCode());
        foreach ($array as $key => $value) {
            if(isset($_GET) && in_array($value, $array))
            {
                if($_GET[$value])
                {
                    if($_GET['price'])
                    {
                        $ar = explode('-', $_GET['price']);
                        $collection->addFieldToFilter('price', 
                             array(array('from'=>trim($ar[0]),'to'=>trim($ar[1])))
                         );
                    }else
                    {
                        $collection->addAttributeToSelect(array('*'))
                            ->addAttributeToFilter($value, array('eq' => $_GET[$value]))->load();
                    }
                }
            }
        }
        // echo $_GET[$value];
        // print_r($array);
        // exit;
        return $collection;
    }
}
