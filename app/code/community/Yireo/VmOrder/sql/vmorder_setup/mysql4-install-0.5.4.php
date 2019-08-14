<?php
/**
 * Yireo VmOrder for Magento 
 *
 * @author Yireo
 * @package VmOrder
 * @copyright Copyright 2013
 * @license Open Source License
 * @link http://www.yireo.com
 */

$installer = $this;
$installer->startSetup();
$installer->run("

CREATE TABLE IF NOT EXISTS {$this->getTable('vmorder_order')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  `order_number` varchar(32) DEFAULT NULL,
  `order_total` decimal(15,5) DEFAULT NULL,
  `order_subtotal` decimal(15,5) DEFAULT NULL,
  `order_tax` decimal(10,2) DEFAULT NULL,
  `order_tax_details` mediumtext NOT NULL,
  `order_shipping` decimal(10,2) DEFAULT NULL,
  `order_shipping_tax` decimal(10,2) DEFAULT NULL,
  `order_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `order_currency` varchar(16) DEFAULT NULL,
  `order_status` char(1) DEFAULT NULL,
  `order_status_name` varchar(255) DEFAULT NULL,
  `coupon_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) DEFAULT NULL,
  `ship_method_id` varchar(255) DEFAULT NULL,
  `create_date` int(11) DEFAULT NULL,
  `modify_date` int(11) DEFAULT NULL,
  `customer_note` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_orders_customer_id` (`customer_id`),
  KEY `idx_orders_order_number` (`order_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS {$this->getTable('vmorder_order_item')} (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_item_id` int(11) DEFAULT '0',
  `order_id` int(11) DEFAULT '0',
  `product_id` int(11) DEFAULT '0',
  `product_name` varchar(64) DEFAULT NULL,
  `product_sku` varchar(64) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT '0',
  `product_item_price` int(11) DEFAULT '0',
  `product_final_price` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_orders_order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");
$installer->endSetup();
