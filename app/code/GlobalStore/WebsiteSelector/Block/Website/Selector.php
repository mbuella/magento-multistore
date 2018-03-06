<?php

namespace GlobalStore\WebsiteSelector\Block\Website;

use Magento\Framework\View\Element as Element;

class Selector extends Element\Template
{  
    protected $_gsStoreManager;
    protected $postDataHelper;
    
    public function __construct(
        \GlobalStore\WebsiteSelector\Model\StoreManager $storeManager,
        \Magento\Framework\Data\Helper\PostHelper $postDataHelper,
        
        Element\Template\Context $context,
        array $data = []
    )
    {
        // DI instances here
        $this->_gsStoreManager = $storeManager;
        $this->postDataHelper = $postDataHelper;
        
        parent::__construct($context,$data);
    }
    
    public function getWebsites()
    {
        return $this->_gsStoreManager->getWebsites();
    }
    
    public function getCurrentWebsite()
    {
        return $this->_storeManager->getWebsite();
    }
    
    public function getWebsiteUrl($website)
    {
        return $this->postDataHelper->getPostData(
            $website->getDefaultStore()->getBaseUrl(),
            []
        );
    }
}