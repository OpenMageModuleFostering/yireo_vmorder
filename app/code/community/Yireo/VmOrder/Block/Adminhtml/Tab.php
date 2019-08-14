<?php
/**
 * Yireo VmOrder for Magento
 *
 * @package     Yireo_VmOrder
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright 2015 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL v3)
 */

/**
 * VmOrder tab-block
 */
class Yireo_VmOrder_Block_Adminhtml_Tab extends Mage_Adminhtml_Block_Template
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

    public function __construct()
    {
        $this->setTemplate('vmorder/tab.phtml');

    }

    public function getCustomtabInfo(){

        $customer = Mage::registry('current_customer');
        return null;
    }

    /**
     * Return Tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('VirtueMart Orders');
    }

    /**
     * Return Tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('VirtueMart Orders');
    }

    /**
     * Can show tab in tabs
     *
     * @return boolean
     */
    public function canShowTab()
    {
        $customer = Mage::registry('current_customer');
        return (bool)$customer->getId();
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Defines after which tab, this tab should be rendered
     *
     * @return string
     */
    public function getAfter()
    {
        return 'tags';
    }

    public function getCustomer()
    {
        $customerId = Mage::app()->getRequest()->getParam('id');
        $customer = Mage::getModel('customer/customer')->load($customerId);
        return $customer;
    }

    public function getCustomerOrders()
    {
        $collection = Mage::getModel('vmorder/order')->getCollection();
        $collection->addFieldToFilter('customer_id', $this->getCustomer()->getId());

        return $collection;
    }
}
