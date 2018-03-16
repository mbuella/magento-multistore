<?php

namespace GlobalStore\Shopping\Model\Quote;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;

class BookingRepository implements \GlobalStore\Shopping\Api\Quote\BookingRepositoryInterface
{    
    private $bookingFactory;
    
    public function __construct(
        \GlobalStore\Shopping\Model\Quote\BookingFactory $bookingFactory
    ) {
        $this->bookingFactory = $bookingFactory;
    }

    public function create(array $bookingData = [])
    {
        $booking = $this->bookingFactory->create();
        
        $booking->setDataArray($bookingData);
        
        return $booking;
    }
        
    public function save(
        \GlobalStore\Shopping\Api\Quote\Data\BookingInterface $booking,
        array $bookingData = []
    ) {        
        $booking->setDataArray($bookingData);
        
        try {
            $booking->save();          
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __('Could not add attribute to quote: "%1"', $e->getMessage()),
                $e
            );
        }
        
        return $this;
    }
    
    public function getById($bookingId)
    {
        $booking = $this->bookingFactory->create();
        $booking->load($bookingId);
        if(is_null($booking->getId())){
            // throw new NoSuchEntityException(__('Booking number with that quote id doesn\'t exist'));
            return false;
        }
        
        return $booking;
    }
    
    public function getByQuoteId($quoteId)
    {
        $booking = $this->bookingFactory->create();
        $booking->load($quoteId,$booking::QUOTE_ID);
        if(is_null($booking->getId())){
            // throw new NoSuchEntityException(__('Booking number with that quote id doesn\'t exist'));
            return false;
        }
        return $booking;
    }

    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    ) {
        
    }

    public function delete(
        \GlobalStore\Shopping\Api\Quote\Data\BookingInterface $booking
    ) {
        
    }

    public function deleteById($bookingId)
    {
        
    }
}