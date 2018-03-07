<?php

namespace GlobalStore\WebsiteSelector\Model;

class StoreManager extends \Magento\Store\Model\StoreManager
{
    public function getWebsites($withDefault = false, $codeKey = false)
    {
        $websites = [];
        foreach ($this->websiteRepository->getList() as $website) {
            if (!$withDefault && $website->getId() == 0) {
                continue;
            }
            if ($codeKey) {
                $websites[$website->getCode()] = $website;
            } else {
                $websites[$website->getSortOrder()] = $website;
            }
        }
        
        ksort($websites);
        return $websites;
    }  
}
