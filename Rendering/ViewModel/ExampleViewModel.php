<?php

namespace Training\Rendering\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class ExampleViewModel implements ArgumentInterface
{
    public function getExampleData(): array
    {
        return range('a', 'z');
    }
}

