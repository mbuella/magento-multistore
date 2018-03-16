<?php

namespace GlobalStore\Shopping\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use GlobalStore\Shopping\Model\Quote\Booking as QuoteBooking;
use GlobalStore\Shopping\Model\Order\Booking as OrderBooking;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();        
        
        // table definition
        
        /**
         * Create table 'gs_quote_booking'
         */        
        $gsQuoteBookingTable = $installer->getConnection()->newTable(
            $installer->getTable(QuoteBooking::GS_QUOTE_BOOKING)
        )->addColumn(	
            QuoteBooking::BOOKING_ID,
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
            'Quote Booking Number id'
        )->addColumn(	
            QuoteBooking::QUOTE_ID,
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'unsigned' => true,
                'nullable' => false,
                'primary' => false
            ],
            'Quote ID'
        )->addColumn(	
            QuoteBooking::BOOKING_NUMBER,
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [
                'length' => 10
            ],
            'Quote Booking Number value'
        )->addIndex(
            $installer->getIdxName(QuoteBooking::GS_QUOTE_BOOKING, [QuoteBooking::QUOTE_ID]), //generates index name
            [QuoteBooking::QUOTE_ID] // column/s to index
        )->addForeignKey(
            $installer->getFkName(QuoteBooking::GS_QUOTE_BOOKING, QuoteBooking::QUOTE_ID, 'quote', 'entity_id'), //generates foreign key name
            QuoteBooking::QUOTE_ID, //the column to join
            $installer->getTable('quote'), //the reference table
            'entity_id', // the reference column
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->setComment(
            'Quote Booking Number'
        );
        
        
        /**
         * Create table 'gs_order_booking'
         */        
        $gsOrderBookingTable = $installer->getConnection()->newTable(
            $installer->getTable(OrderBooking::GS_ORDER_BOOKING)
        )->addColumn(	
            OrderBooking::BOOKING_ID,
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
            'Order Booking Number id'
        )->addColumn(	
            OrderBooking::ORDER_ID,
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [
                'unsigned' => true,
                'nullable' => false,
                'primary' => false
            ],
            'Order ID'
        )->addColumn(	
            OrderBooking::BOOKING_NUMBER,
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [
                'length' => 10
            ],
            'Order Booking Number value'
        )->addIndex(
            $installer->getIdxName(OrderBooking::GS_ORDER_BOOKING, [OrderBooking::ORDER_ID]), //generates index name
            [OrderBooking::ORDER_ID] // column/s to index
        )->addForeignKey(
            $installer->getFkName(OrderBooking::GS_ORDER_BOOKING, OrderBooking::ORDER_ID, 'sales_order', 'entity_id'), //generates foreign key name
            OrderBooking::ORDER_ID, //the column to join
            $installer->getTable('sales_order'), //the reference table
            'entity_id', // the reference column
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->setComment(
            'Order Booking Number'
        );

        // trigger table creation
        $installer->getConnection()->createTable($gsQuoteBookingTable);
        $installer->getConnection()->createTable($gsOrderBookingTable);
        
        $installer->endSetup();
    }
}