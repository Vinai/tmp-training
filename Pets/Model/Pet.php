<?php declare(strict_types=1);

namespace Training\Pets\Model;

use Magento\Framework\Model\AbstractModel;

class Pet extends AbstractModel
{
    protected $_eventPrefix = 'training_pet';
    
    protected $_eventObject = 'pet';
    
    protected function _construct()
    {
        $this->_init(ResourceModel\Pet::class);
    }
    
    public function setPetName(string $name): void
    {
        $this->setData('pet_name', $name);
    }
    
    public function getPetName(): ?string
    {
        return $this->_getData('pet_name');
    }
}