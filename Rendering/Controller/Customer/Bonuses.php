<?php

namespace Training\Rendering\Controller\Customer;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Bonuses implements ActionInterface
{
    private $pageFactory;

    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend('My Bonuses');

        return $page;
    }
}

