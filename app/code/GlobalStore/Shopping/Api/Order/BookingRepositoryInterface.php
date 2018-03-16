<?php

namespace GlobalStore\Shopping\Api\Order;

interface BookingRepositoryInterface
{        
    public function create(array $bookingData = []);

    public function save(
        \GlobalStore\Shopping\Api\Order\Data\BookingInterface $booking,
        array $bookingData = []
    );
    
    public function getById($bookingId);
    
    public function getByOrderId($orderId);

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
    
    public function delete(\GlobalStore\Shopping\Api\Order\Data\BookingInterface $booking);

    public function deleteById($bookingId);
}