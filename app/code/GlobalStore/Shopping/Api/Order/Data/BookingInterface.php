<?php

namespace GlobalStore\Shopping\Api\Order\Data;

interface BookingInterface
{
    const GS_ORDER_BOOKING = 'gs_order_booking';
    const BOOKING_ID = 'booking_id';
    const BOOKING_NUMBER = 'booking_number';
    const ORDER_ID = 'order_id';

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
    public function getOrderId();
    
    /**
     * @inheritDoc
     */
    public function setOrderId($orderId);
    
    /**
     * @inheritDoc
     */
    public function getExtensionAttributes();

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(
        \GlobalStore\Shopping\Api\Order\Data\BookingExtensionInterface $extensionAttributes
    );
}