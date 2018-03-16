<?php

namespace GlobalStore\Shopping\Model\Order;

use Magento\Framework\Model\AbstractExtensibleModel;

class Booking extends AbstractExtensibleModel implements \GlobalStore\Shopping\Api\Order\Data\BookingInterface
{
     
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(\GlobalStore\Shopping\Model\Order\ResourceModel\Booking::class);
    }    

    /**
     * {@inheritdoc}
     */
    public function getBookingNumber()
    {
        return $this->getData(self::BOOKING_NUMBER);
    }

    /**
     * {@inheritdoc}
     */
    public function setBookingNumber($bookingNumber)
    {
        return $this->setData(self::BOOKING_NUMBER, $bookingNumber);
    }
    
    /**
     * {@inheritdoc}
     */
    public function getOrderId()
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }
    
    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(
        \GlobalStore\Shopping\Api\Order\Data\BookingExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}