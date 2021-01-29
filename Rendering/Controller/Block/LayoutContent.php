<?php

namespace Training\Rendering\Controller\Block;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class LayoutContent implements ActionInterface
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

