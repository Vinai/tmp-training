<?php declare(strict_types=1);

namespace Training\HelloWorld\Override\Block\Theme\Html;

use Magento\Theme\Block\Html\Footer;

class HelloWorldFooter extends Footer
{
    public function getCopyright()
    {
        return parent::getCopyright() . ' Hello World [from preference override]';
    }

}
