<?php declare(strict_types=1);

namespace Training\Pets\Model\ResourceModel\Pet;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\Pets\Model\Pet as PetModel;
use Training\Pets\Model\ResourceModel\Pet as PetResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(PetModel::class, PetResourceModel::class);
    }
}