<?php

namespace GlobalStore\Shopping\Model\Quote\Booking;

class ToOrder
{
    protected $objectCopyService;
    protected $dataObjectHelper;
    
    public function __construct(
      \Magento\Framework\DataObject\Copy $objectCopyService,
      \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
    ) {
        $this->objectCopyService = $objectCopyService;
        $this->dataObjectHelper = $dataObjectHelper;
    }
    
    /**
     * @param $quote \Magento\Quote\Api\Data\CartInterface
     * @param $order \Magento\Sales\Api\Data\Order
     */
    public function convertBooking($quote, $order)
    {
        dump($quote->getExtensionAttributes());
        
        $orderData = $this->objectCopyService->getDataFromFieldset(
            'sales_convert_quote_booking',
            'to_order',
            $quote
        );
        
        $this->dataObjectHelper->populateWithArray(
            $order,
            $orderData,
            \Magento\Sales\Api\Data\OrderInterface::class
        );
        
        $this->objectCopyService->copyFieldsetToTarget(
            'sales_convert_quote_booking',
            'to_order',
            $quote,
            $order
        );
        
        dump($order);die();
        
        
        
        $this->dataObjectHelper->populateWithArray(
            $order,
            $orderData,
            \Magento\Sales\Api\Data\OrderInterface::class
        );
        
        $order = $this->objectCopyService->copyFieldsetToTarget(
            'sales_convert_quote',
            'to_order',
            $quote,
            $order
        );
        
        return $order;
    }
}
