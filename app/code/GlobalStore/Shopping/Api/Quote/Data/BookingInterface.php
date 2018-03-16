<?php

namespace GlobalStore\Shopping\Api\Quote\Data;

interface BookingInterface
{
    const GS_QUOTE_BOOKING = 'gs_quote_booking';
    const BOOKING_ID = 'booking_id';
    const BOOKING_NUMBER = 'booking_number';
    const QUOTE_ID = 'quote_id';

    
    public function setDataArray(array $bookingData);
    
    /**
     * Return value.
     *
     * @return string|null 
     */
    public function getBookingNumber();

    /**
     * Set value.
     *
     * @param string|null $value
     * @return $this
     */
    public function setBookingNumber($booking);
    
    /**
     * @inheritDoc
     */
    public function getQuoteId();
    
    /**
     * @inheritDoc
     */
    public function setQuoteId($quoteId);
    
    /**
     * @inheritDoc
     */
    public function getExtensionAttributes();

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(
        \GlobalStore\Shopping\Api\Quote\Data\BookingExtensionInterface $extensionAttributes
    );
}