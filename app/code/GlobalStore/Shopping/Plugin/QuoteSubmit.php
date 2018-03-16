<?php

namespace GlobalStore\Shopping\Plugin;

class QuoteSubmit
{  
    // private $quoteBookingToOrder;
    private $orderBookingFactory;
    
    public function __construct(
        // \GlobalStore\Shopping\Model\Quote\Booking\ToOrder $quoteBookingToOrder,
        \GlobalStore\Shopping\Model\Order\BookingFactory $orderBookingFactory
    )
    {
        // $this->quoteBookingToOrder = $quoteBookingToOrder;
        $this->orderBookingFactory = $orderBookingFactory;
        
    }  
      
    public function aroundSubmit(
        \Magento\Quote\Api\CartManagementInterface $cartManagement,
        callable $proceed,
        \Magento\Quote\Model\Quote $quote,
        $orderData = []
    ) {
        // get order
        $order = $proceed($quote,$orderData);
        
        if(
            null !== $quote->getExtensionAttributes() &&
            null !== $quote->getExtensionAttributes()->getBooking()
        ) {
            // get quote booking
            $quoteBooking = $quote->getExtensionAttributes()->getBooking();
            
            $this->convertSaveOrderBooking($quoteBooking,$order->getEntityId());
        }
        
        return $order;
      
        
        // convert quote booking to order booking
        // $newOrder = $this->quoteBookingToOrder->convertBooking($quote,$order);
        // dump($newOrder);
    }
    
    private function convertSaveOrderBooking($quoteBooking, $orderId)
    {        
        // create/initialize empty order booking
        $orderBooking = $this->orderBookingFactory->create();
        
        // set booking number value
        $orderBooking->setBookingNumber($quoteBooking->getBookingNumber());
        // set order id value
        $orderBooking->setOrderId($orderId);
        
        // save order booking to database
        $orderBooking->save();
    }
}