<?php

namespace Training\Routing\Controller\Results;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Redirect implements ActionInterface
{
    private $redirectFactory;

    public function __construct(RedirectFactory $redirectFactory)
    {
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $redirect = $this->redirectFactory->create();
        $redirect->setPath('*/*/json');
        return $redirect;
    }
}
