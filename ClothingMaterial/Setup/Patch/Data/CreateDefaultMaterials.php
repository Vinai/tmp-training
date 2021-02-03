<?php

namespace Training\ClothingMaterial\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class CreateDefaultMaterials implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $db = $this->moduleDataSetup->getConnection();
        $db->insertMultiple('clothing_materials', [
            ['material' => 'cotton'],
            ['material' => 'wool'],
            ['material' => 'linen'],
            ['material' => 'viscose'],
        ]);
    }

    public function getAliases()
    {
        return [];
    }

    public static function getDependencies()
    {
        return [];
    }

}

