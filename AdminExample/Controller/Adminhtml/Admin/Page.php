<?php

namespace Training\AdminExample\Controller\Adminhtml\Admin;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Page extends Action
{
    const ADMIN_RESOURCE = 'Training_AdminExample::resource';

    private $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->pageFactory->create();

        $page->getConfig()->getTitle()->prepend(__('Example'));

        return $page;
    }
}

