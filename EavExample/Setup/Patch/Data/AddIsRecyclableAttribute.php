<?php

namespace Training\EavExample\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetup;

class AddIsRecyclableAttribute implements DataPatchInterface
{
    private $eavSetup;

    public function __construct(EavSetup $eavSetup)
    {
        $this->eavSetup = $eavSetup;
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->eavSetup->addAttribute('catalog_product', 'is_recyclable', [
            'type'  => 'int',
            'input' => 'boolean',
            'label' => 'Is Recyclable?',
            'source' => \Magento\Eav\Model\Entity\Attribute\Source\Boolean::class,
            'required' => 0,
            'user_defined' => 1,
            'note' => 'A nice little note explaining how to use this attribute.',
            'filterable' => 1,
            'visible_on_front' => 1,
            'position' => 100, // the position in the layered filter navigation
            'sort_order' => 30, // the position in the attribute group in the admin UI
            'group' => 'Product Details'
        ]);
    }

    public static function getDependencies()
    {
        return [];
    }
}
