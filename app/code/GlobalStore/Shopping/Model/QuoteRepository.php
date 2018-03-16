<?php

namespace GlobalStore\Shopping\Model;

class QuoteRepository extends \Magento\Quote\Model\QuoteRepository
{
    public function save(\Magento\Quote\Api\Data\CartInterface $quote)
    {
        parent::save($quote);
        
        //we need to return the quote in order to be used in our
        //afterGet plugin (\GlobalStore\Shopping\Plugin\QuoteSave)
        return $quote;
    }
}