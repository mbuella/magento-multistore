<?php

namespace GlobalStore\Shopping\Api\Quote;

interface BookingRepositoryInterface
{        
    public function create(array $bookingData = []);

    public function save(
        \GlobalStore\Shopping\Api\Quote\Data\BookingInterface $booking,
        array $bookingData = []
    );
    
    public function getById($bookingId);
    
    public function getByQuoteId($quoteId);

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
    
    public function delete(\GlobalStore\Shopping\Api\Quote\Data\BookingInterface $booking);

    public function deleteById($bookingId);
}