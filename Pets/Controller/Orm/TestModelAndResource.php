<?php declare(strict_types=1);

namespace Training\Pets\Controller\Orm;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Training\Pets\Model\PetFactory;
use Training\Pets\Model\ResourceModel\Pet;

class TestModelAndResource implements ActionInterface
{
    private JsonFactory $jsonFactory;

    private Pet $petResource;

    private PetFactory $petFactory;

    public function __construct(JsonFactory $jsonFactory, Pet $petResource, PetFactory $petFactory)
    {
        $this->jsonFactory = $jsonFactory;
        $this->petResource = $petResource;
        $this->petFactory  = $petFactory;
    }

    public function execute()
    {
        $testData = [
            'pet_type' => 'Test',
            'pet_name' => 'Testy',
        ];
        $pet = $this->petFactory->create();
        $pet->setData($testData);
        $this->petResource->save($pet);
        
        $json = $this->jsonFactory->create();
        $json->setData($pet->getData());
        
        $this->petResource->delete($pet);
        
        return $json;
    }
}