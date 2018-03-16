<?php

namespace GlobalStore\Shopping\Plugin;

class OrderGet
{
    private $bookingRepository;
    private $orderExtensionFactory;
    
    public function __construct(
        \Magento\Sales\Api\Data\OrderExtensionFactory $orderExtensionFactory,
        \GlobalStore\Shopping\Model\Order\BookingRepository $bookingRepository
    )
    {
        $this->bookingRepository = $bookingRepository;
        $this->orderExtensionFactory = $orderExtensionFactory;
    }  
    /* 
    public function afterGet(
        \Magento\Sales\Api\OrderRepositoryInterface  $orderRepository,
        \Magento\Sales\Api\Data\OrderInterface $order
    )
    {
        $booking = $this->bookingRepository->getByOrderId($order->getId());
        
        if($booking) {
            // $bookingNumber = $booking->getBookingNumber();
            
            $extensionAttributes = $order->getExtensionAttributes();
            $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();
                                
            $orderExtension->setBooking($booking);
            $order->setExtensionAttributes($orderExtension);
        }
        
        // dump($quote->getExtensionAttributes());
        
        return $order;
    } */
    
    public function aroundGet(
        \Magento\Sales\Api\OrderRepositoryInterface  $orderRepository,
        callable $proceed,
        $id
    ) {
        $order = $proceed($id);
        
        $booking = $this->bookingRepository->getByOrderId($order->getId());
        
        if($booking) {
            // $bookingNumber = $booking->getBookingNumber();
            
            $extensionAttributes = $order->getExtensionAttributes();
            $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();
                                
            $orderExtension->setBooking($booking);
            $order->setExtensionAttributes($orderExtension);
        }
        
        return $order;
    }
}