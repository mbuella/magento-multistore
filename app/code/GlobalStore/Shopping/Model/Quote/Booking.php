<?php

namespace GlobalStore\Shopping\Model\Quote;

use Magento\Framework\Model\AbstractExtensibleModel;

class Booking extends AbstractExtensibleModel implements \GlobalStore\Shopping\Api\Quote\Data\BookingInterface
{
     
    /**
     * {@inheritdoc}
     */
    protected function _construct()
    {
        $this->_init(\GlobalStore\Shopping\Model\Quote\ResourceModel\Booking::class);
    }    

    public function setDataArray(array $bookingData) {        
        foreach($bookingData as $field => $value) {
            $this->setData($field,$value);
        }
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
    public function getQuoteId()
    {
        return $this->getData(self::QUOTE_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setQuoteId($quoteId)
    {
        return $this->setData(self::QUOTE_ID, $quoteId);
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
        \GlobalStore\Shopping\Api\Quote\Data\BookingExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}