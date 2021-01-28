<?php

namespace Training\Routing\Controller\Results;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Json implements ActionInterface
{
    private $jsonFactory;

    public function __construct(JsonFactory $jsonFactory)
    {
        $this->jsonFactory = $jsonFactory;
    }

    public function execute()
    {
        $json = $this->jsonFactory->create();
        $json->setData([
            'name' => 'Example',
            'foo' => date('Y-m-d H:i:s')
        ]);

        return $json;
    }
}
