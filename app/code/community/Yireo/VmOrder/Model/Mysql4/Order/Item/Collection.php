<?php
/**
 * VmOrder
 *
 * @author Yireo
 * @package VmOrder
 * @copyright Copyright 2013
 * @license Open Source License
 * @link http://www.yireo.com
 */

class Yireo_VmOrder_Model_Mysql4_Order_Item_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init('vmorder/order_item');
    }
}
