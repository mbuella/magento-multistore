<?php

namespace GlobalStore\Shopping\Model\Order\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;
use GlobalStore\Shopping\Model\Order\Booking as BookingModel;

class Booking extends AbstractDb
{    
    protected function _construct()
    {
        $this->_init(
            BookingModel::GS_ORDER_BOOKING,
            BookingModel::BOOKING_ID
        );
    }

}