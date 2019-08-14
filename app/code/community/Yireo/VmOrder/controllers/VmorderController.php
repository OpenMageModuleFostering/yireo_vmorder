<?php
/**
 * VmOrder extension for Magento 
 *
 * @package     Yireo_VmOrder
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright (c) 2013 Yireo (http://www.yireo.com/)
 * @license     Open Source License (OSL)
 */

/**
 * VmOrder admin controller
 */
class Yireo_VmOrder_VmorderController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Common method
     */
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('sales/order/vmorder')
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Sales'), Mage::helper('adminhtml')->__('Sales'))
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('Orders'), Mage::helper('adminhtml')->__('Orders'))
            ->_addBreadcrumb(Mage::helper('adminhtml')->__('VirtueMart orders'), Mage::helper('adminhtml')->__('VirtueMart orders'))
        ;
        return $this;
    }

    /**
     * Overview page
     */
    public function indexAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('vmorder/overview'))
            ->renderLayout();
    }

    /**
     * Detail page
     */
    public function viewAction()
    {
        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('vmorder/order_view'))
            ->renderLayout();
    }
}
