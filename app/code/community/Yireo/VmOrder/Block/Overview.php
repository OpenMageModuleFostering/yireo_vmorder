<?php
/**
 * VmOrder extension for Magento 
 *
 * @package     Yireo_VmOrder
 * @author      Yireo (http://www.yireo.com/)
 * @copyright   Copyright (c) 2009 Yireo (http://www.yireo.com/)
 * @license     VmOrder EULA (http://www.yireo.com/)
 */

class Yireo_VmOrder_Block_Overview extends Mage_Adminhtml_Block_Widget_Container
{
    /*
     * Constructor method
     */
    public function _construct()
    {
        $this->setTemplate('vmorder/overview.phtml');
        parent::_construct();
    }

    protected function _prepareLayout()
    {
        $this->setChild('grid', $this->getLayout()
            ->createBlock('vmorder/overview_grid', 'vmorder.grid')
            ->setSaveParametersInSession(true)
        );
        return parent::_prepareLayout();
    }

    public function getGridHtml()
    {
        return $this->getChildHtml('grid');
    }

    /*
     * Helper to return the header of this page
     */
    public function getHeader($title = null)
    {
        return 'VirtueMart orders - '.$this->__($title);
    }
}
