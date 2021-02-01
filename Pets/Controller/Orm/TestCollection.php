<?php declare(strict_types=1);

namespace Training\Pets\Controller\Orm;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Training\Pets\Model\Pet;
use Training\Pets\Model\ResourceModel\Pet\CollectionFactory;

class TestCollection implements ActionInterface
{
    private $jsonFactory;

    private $petCollectionFactory;

    public function __construct(JsonFactory $jsonFactory, CollectionFactory $petCollectionFactory)
    {
        $this->jsonFactory          = $jsonFactory;
        $this->petCollectionFactory = $petCollectionFactory;
    }

    public function execute()
    {
        $collection   = $this->petCollectionFactory->create();
        $jsonResponse = $this->jsonFactory->create();
        $jsonResponse->setData(array_map(fn(Pet $p): array => $p->getData(), $collection->getItems()));
        
        return $jsonResponse;
    }
}