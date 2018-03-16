<?php

namespace GlobalStore\Shopping\Plugin;

class QuoteGet
{
    private $bookingFactory;
    private $bookingRepository;
    private $cartExtensionFactory;
    
    public function __construct(
        \GlobalStore\Shopping\Model\Quote\BookingFactory $bookingFactory,
        \Magento\Quote\Api\Data\CartExtensionFactory $cartExtensionFactory,
        \GlobalStore\Shopping\Model\Quote\BookingRepository $bookingRepository
    )
    {
        $this->bookingFactory = $bookingFactory;
        $this->bookingRepository = $bookingRepository;
        $this->cartExtensionFactory = $cartExtensionFactory;
    }  
    
    public function afterGet(
        \Magento\Quote\Api\CartRepositoryInterface $cartRepository,
        \Magento\Quote\Api\Data\CartInterface $quote
    )
    {
        $booking = $this->bookingRepository->getByQuoteId($quote->getId());
        
        if($booking) {
            // $bookingNumber = $booking->getBookingNumber();
            
            $extensionAttributes = $quote->getExtensionAttributes();
            $quoteExtension = $extensionAttributes ? $extensionAttributes : $this->cartExtensionFactory->create();
                                
            $quoteExtension->setBooking($booking);
            $quote->setExtensionAttributes($quoteExtension);
        }
        
        // dump($quote->getExtensionAttributes());
        
        return $quote;
    }
}