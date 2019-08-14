<?php
/**
 * Yireo VmOrder for Magento 
 *
 * @package     Yire_VmOrder
 * @author      Jisse Reitsma (Jira ICT)
 * @copyright   Copyright (c) 2009 Jira ICT (http://www.jira.nl/)
 * @license     Open Software License
 */

/**
 * Customer account controller
 */
class Yireo_VmOrder_CustomerController extends Mage_Core_Controller_Front_Action
{
    /**
     * Check customer authentication
     */
    public function preDispatch()
    {
        parent::preDispatch();
        $action = $this->getRequest()->getActionName();
        $loginUrl = Mage::helper('customer')->getLoginUrl();

        if (!Mage::getSingleton('customer/session')->authenticate($this, $loginUrl)) {
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }

    /**
     * Display orders 
     *
     */
    public function ordersAction()
    {
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        if ($block = $this->getLayout()->getBlock('vmorder_customer_orders_list')) {
            $block->setRefererUrl($this->_getRefererUrl());
        }
        $this->renderLayout();
    }

    /**
     * Display a single order
     *
     */
    public function orderAction()
    {
        $this->loadLayout();
        $this->_initLayoutMessages('customer/session');
        if ($block = $this->getLayout()->getBlock('vmorder_customer_order_view')) {
            $block->setRefererUrl($this->_getRefererUrl());
        }
        $this->renderLayout();
    }

    /*
     * Check if this product is owned by this customer
     */
    public function checkAccess($item_id = 0)
    {
        if ($this->_getSession()->isLoggedIn() == false) {
            $this->_getSession()->addError($this->__('You need to login'));
            return false;
        }

        $item = Mage::getModel('software/item')->load($item_id);
        if(empty($item) || $item_id == 0) {
            $this->_getSession()->addError($this->__('Empty request'));
            return false;
        } elseif($item->getCustomerId() != $this->_getSession()->getCustomerId()) {
            $this->_getSession()->addError($this->__('Access denied: '.$item_id));
            return false;
        }

        return true;
    }

    /*
     * Helper-method to get the current customer-session
     */
    public function _getSession()
    {
        return Mage::getModel('customer/session');
    }
}
