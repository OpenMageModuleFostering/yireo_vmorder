<?php
/**
 * Yireo VmOrder for Magento 
 *
 * @author Yireo
 * @package VmOrder
 * @copyright Copyright 2014
 * @license Open Source License
 * @link http://www.yireo.com
 */

/**
 * VmOrder helper
 */
class Yireo_VmOrder_Helper_Data extends Mage_Core_Helper_Abstract
{
    /*
     * Method to get the right order-number (with 8 digits)
     */
    public function getOrderNumber($order)
    {
        $id = $order->getOrderId();
        while(strlen($id) < 8) {
            $id = (string)'0'.$id;
        }
        return $id;
    }
}
