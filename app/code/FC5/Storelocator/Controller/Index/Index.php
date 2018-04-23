<?php

namespace FC5\Storelocator\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
//    protected $_resultPageFactory;
//
//    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
//    {
//        $this->_resultPageFactory = $resultPageFactory;
//        parent::__construct($context);
//    }
    public function __construct(
        \Magento\Framework\App\Action\Context $context)
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();

        return $resultPage;
    }
}
