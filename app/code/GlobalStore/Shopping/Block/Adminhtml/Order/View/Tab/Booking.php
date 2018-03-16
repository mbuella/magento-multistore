<?php

namespace GlobalStore\Shopping\Block\Adminhtml\Order\View\Tab;

class Booking extends \Magento\Backend\Block\Template implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * Template
     *
     * @var string
     */
    protected $_template = 'order/view/tab/gs_booking.phtml';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Sales\Helper\Admin
     */
    private $adminHelper;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Sales\Helper\Admin $adminHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Sales\Helper\Admin $adminHelper,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
        $this->adminHelper = $adminHelper;
    }

    /**
     * Retrieve order model instance
     *
     * @return \Magento\Sales\Model\Order
     */
    public function getOrder()
    {
        return $this->_coreRegistry->registry('current_order');
    }
    
    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Booking');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Booking');
    }

    /**
     * Get Tab Class
     *
     * @return string
     */
    public function getTabClass()
    {
        return 'ajax only';
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }
    
    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Get order admin date
     *
     * @param int $createdAt
     * @return \DateTime
     */
    public function getOrderAdminDate($createdAt)
    {
        return $this->_localeDate->date(new \DateTime($createdAt));
    }
    
    public function getOrderBooking()
    {
        $orderBooking = $this->getOrder()->getExtensionAttributes()->getBooking();
        
        
        return ['booking_number' => $orderBooking->getBookingNumber()];
    }
}