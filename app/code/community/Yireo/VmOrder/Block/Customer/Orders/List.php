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

class Yireo_VmOrder_Block_Customer_Orders_List extends Mage_Core_Block_Template
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
        $session = Mage::getSingleton('customer/session');

        $orders = Mage::getResourceModel('vmorder/order_collection')
            ->addFieldToFilter('customer_id', $session->getCustomerId())
            ->addOrder('create_date', 'desc');

        foreach($orders as $order) {
            //$product = Mage::getModel('catalog/product')->load($item->getProductId());
        }

        $this->setOrders($orders);
    }

    /*
     * Method to get the right order-number (with 8 digits)
     */
    public function getOrderNumber($order)
    {
        return Mage::helper('vmorder')->getOrderNumber($order);
    }

    /*
     * Method to get the right order-link
     */
    public function getOrderLink($order)
    {
        return $this->getUrl('vmorder/customer/order', array('id' => $order->getId()));
    }

    /*
     * Method to format a certain price
     */
    public function getFormattedPrice($order)
    {
        return Mage::helper('core')->currency($order->getOrderTotal());
    }
}
