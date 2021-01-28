<?php declare(strict_types=1);

namespace Training\HelloWorld\Plugin;

use Magento\Theme\Block\Html\Footer;

class FooterHelloWorldPlugin
{
    public function afterGetCopyright(Footer $subject, $result): string
    {
        return $result . ' Hello World [from plugin]';
    }
}
