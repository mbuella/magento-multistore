<?php

namespace GlobalStore\Shopping\Controller\Booking;

class Save extends \Magento\Framework\App\Action\Action
{
    private $checkoutSession;
    private $quoteBookingRepository;

    public function __construct(
        \Magento\Checkout\Model\Session $checkoutSession,
        \GlobalStore\Shopping\Model\Quote\BookingRepository $quoteBookingRepository,
        \Magento\Framework\App\Action\Context $context
    ) {
      $this->checkoutSession = $checkoutSession;
      $this->quoteBookingRepository = $quoteBookingRepository;
      
      return parent::__construct($context);
    }

    public function execute()
    {
      // get quote booking info post data
      $quoteBookingInfo = $this->getRequest()->getPostValue();
      
      // get current booking from the quote in session
      $booking = $this->checkoutSession->getQuote()->getExtensionAttributes()->getBooking();
      
      // set booking number if exists
      if(isset($quoteBookingInfo['booking_number'])) {
          $booking->setBookingNumber($quoteBookingInfo['booking_number']);
      }
      
      // set data and save
      $this->quoteBookingRepository->save($booking);
      
      // return success/failure response
      // ... todo
    }
}