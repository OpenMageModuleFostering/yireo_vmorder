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

class Yireo_VmOrder_Model_Order_Item extends Mage_Core_Model_Abstract
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('vmorder/order_item');
    }
}
