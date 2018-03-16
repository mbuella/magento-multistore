<?php

namespace GlobalStore\Shopping\Plugin;

class QuoteSave
{  
    private $quoteBookingRepository;
    
    public function __construct(
        \GlobalStore\Shopping\Model\Quote\BookingRepository $quoteBookingRepository
    )
    {
        $this->quoteBookingRepository = $quoteBookingRepository;
    }
  
    public function afterSave(
        \Magento\Quote\Api\CartRepositoryInterface $cartRepository,
        \Magento\Quote\Api\Data\CartInterface $quote
    ) {
        $extensionAttributes = $quote->getExtensionAttributes();
        if (
            null == $extensionAttributes ||
            null == $extensionAttributes->getBooking()
        ) {
            $quoteBooking = $this->quoteBookingRepository->create([
                'quote_id' => $quote->getEntityId(),
            ]);
            
            $this->quoteBookingRepository->save($quoteBooking);        
        }

        return $quote;
    }
}