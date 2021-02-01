<?php

namespace Training\Pets\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class DefaultPetRecordsPatch implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }


    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $db = $this->moduleDataSetup->getConnection();
        $db->insert('training_pets', ['pet_name' => 'Catty']);
        $db->insert('training_pets', ['pet_name' => 'Doge', 'pet_type' => 'Dog']);
    }

    public static function getDependencies()
    {
        return [];
    }

}

