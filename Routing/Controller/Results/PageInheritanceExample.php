<?php

namespace Training\Routing\Controller\Results;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class PageInheritanceExample extends \Magento\Framework\App\Action\Action
{
    private $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * To access this page, go to /routing-examples/results/pageInheritanceExample
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}