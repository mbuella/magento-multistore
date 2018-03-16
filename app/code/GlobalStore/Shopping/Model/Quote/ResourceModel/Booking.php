<?php

namespace GlobalStore\Shopping\Model\Quote\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;
use GlobalStore\Shopping\Model\Quote\Booking as BookingModel;

class Booking extends AbstractDb
{    
    protected function _construct()
    {
        $this->_init(
            BookingModel::GS_QUOTE_BOOKING,
            BookingModel::BOOKING_ID
        );
    }

}