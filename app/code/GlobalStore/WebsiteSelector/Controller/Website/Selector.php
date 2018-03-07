<?php

namespace GlobalStore\WebsiteSelector\Controller\Website;

class Selector extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
    protected $storeManager;
    protected $httpRequest;
    
    public function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Store\Model\StoreManager $storeManager,
        \Magento\Framework\App\Request\Http $httpRequest,
        
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->storeManager = $storeManager;
        $this->httpRequest = $httpRequest;
        
        parent::__construct($context);
    }
    
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        
        if($this->httpRequest->isAjax() && !empty($post)) {        
            $selectedWebsiteUrl = $this->storeManager
                                       ->getWebsite($post['website_code'])
                                       ->getDefaultStore()->getBaseUrl();
            
            return $this->resultJsonFactory
                        ->create()->setData(
                            ['website_url' => $selectedWebsiteUrl]
                        );                    
        }
        return $this->_redirect($this->storeManager->getStore()->getBaseUrl());
    }
}
