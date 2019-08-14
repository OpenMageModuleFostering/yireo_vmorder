<?php
/**
 * VmOrder extension for Magento 
 *
 * @package     Yireo_VmOrder
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright (c) 2013 Yireo (http://www.yireo.com/)
 * @license     Open Source License
 */

class Yireo_VmOrder_Block_Overview_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('vmorderGrid');
        $this->setDefaultSort('create_date');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);

    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('vmorder/order')->getCollection();
        $this->setCollection($collection);
        parent::_prepareCollection();

        $collection = $this->getCollection();
        foreach($collection as $item) {

            //$item->setOrderNumber('#'.Mage::helper('vmorder')->getOrderNumber($item));
            $item->setOrderNumber(strtoupper($item->getOrderNumber()));

            $customer = Mage::getModel('customer/customer')->load($item->getCustomerId());
            $item->setCustomerName($customer->getName());

            $item->setOrderTotal(Mage::helper('core')->currency($item->getOrderTotal()));
            $item->setCreateDate(date('d M Y H:i:s', $item->getCreateDate()));
            $item->setModifyDate(date('d M Y H:i:s', $item->getModifyDate()));
        }

        $this->setCollection($collection);
        return $this;
    }

    protected function _prepareColumns()
    {
        $this->addColumn('order_id', array(
            'header'=> Mage::helper('vmorder')->__('Order ID'),
            'width' => '50px',
            'index' => 'order_id',
            'type' => 'number',
        ));

        $this->addColumn('order_number', array(
            'header'=> Mage::helper('vmorder')->__('Order number'),
            'width' => '50px',
            'index' => 'order_number',
            'type' => 'text',
        ));

        $this->addColumn('customer_id', array(
            'header'=> Mage::helper('vmorder')->__('Customer'),
            'index' => 'customer_name',
        ));

        $this->addColumn('order_total', array(
            'header'=> Mage::helper('vmorder')->__('Order total'),
            'index' => 'order_total',
            'type' => 'text',
        ));

        $this->addColumn('order_status_name', array(
            'header'=> Mage::helper('vmorder')->__('Order status'),
            'index' => 'order_status_name',
            'type' => 'text',
        ));

        $this->addColumn('create_date', array(
            'header'=> Mage::helper('vmorder')->__('Created'),
            'index' => 'create_date',
            'type' => 'text',
        ));

        $this->addColumn('modify_date', array(
            'header'=> Mage::helper('vmorder')->__('Created'),
            'index' => 'modify_date',
            'type' => 'text',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('adminhtml/vmorder/view', array('id'=>$row->getId()));
    }
}
