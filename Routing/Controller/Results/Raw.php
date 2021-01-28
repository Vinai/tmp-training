<?php

namespace Training\Routing\Controller\Results;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Raw implements ActionInterface
{
    private $rawFactory;

    public function __construct(RawFactory $rawFactory)
    {
        $this->rawFactory = $rawFactory;
    }

    public function execute()
    {
        $rawResult = $this->rawFactory->create();
        $rawResult->setContents('<h1>Example Content</h1>');
        $rawResult->setHeader('Content-Type', 'text/plain', true);

        return $rawResult;
    }
}
