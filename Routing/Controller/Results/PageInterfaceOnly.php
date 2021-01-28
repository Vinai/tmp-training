<?php

namespace Training\Routing\Controller\Results;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\View\Result\PageFactory;

class PageInterfaceOnly implements HttpGetActionInterface, HttpPostActionInterface
{
    private $pageFactory;

    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }
    
    public function execute()
    {
        return $this->pageFactory->create();
    }
}
