<?php

namespace Training\Routing\Controller\Results;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;

class Forward implements ActionInterface
{
    private $forwardFactory;

    public function __construct(ForwardFactory $forwardFactory)
    {
        $this->forwardFactory = $forwardFactory;
    }

    public function execute()
    {
        $forwardResult = $this->forwardFactory->create();
        return $forwardResult->forward('pageInterfaceOnly');
    }
}
