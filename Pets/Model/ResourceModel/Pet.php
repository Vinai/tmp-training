<?php declare(strict_types=1);

namespace Training\Pets\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pet extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('training_pets', 'pet_id');
    }
}