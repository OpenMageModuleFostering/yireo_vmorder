<?php
/**
 * VmOrder
 *
 * @author Yireo
 * @package VmOrder
 * @copyright Copyright 2009
 * @license Yireo EULA (www.yireo.com)
 * @link http://www.yireo.com
 */

class Yireo_VmOrder_Block_Order_View extends Mage_Core_Block_Template
{
    /**
     * Class constructor
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('vmorder/order/view.phtml');

        $id = (int)$this->getRequest()->getParam('id', 0);

        $order = Mage::getModel('vmorder/order')->load($id, 'id');
        $order_items = Mage::getResourceModel('vmorder/order_item_collection')
            ->addFieldToFilter('order_id', $order->getOrderId())
        ;

        $this->setOrder($order);
        $this->setOrderItems($order_items);
    }

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

    /*
     * Method to format a certain price
     */
    public function getFormattedPrice($price)
    {
        if(empty($price)) {
            return null;
        }
        return $this->getOrder()->getOrderCurrency().' '.number_format($price, 2);
    }

    /*
     * Method to get the shipping information
     */
    public function getShippingMethod($order)
    {
        $method = $order->getShipMethodId();
        if(!empty($method)) {
            $m = explode('|', $method);
            if(isset($m[1])) return $m[1];
            if(isset($m[0])) return $m[0];
        }
        return $method;
    }

    /*
     * Method to get the right orders-link
     */
    public function getOrdersLink()
    {
        return $this->getUrl('vmorder/customer/orders');
    }

    /*
     * Method to get the customer-link
     */
    public function getCustomerLink($customer)
    {
        return Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/customer/edit', array('id' => $customer->getId()));
    }
}
