<?php

namespace Training\Rendering\Controller\Block;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Element\Text as TextBlock;

class TextBlockExample implements ActionInterface
{
    private $rawFactory;
    private $layout;

    public function __construct(RawFactory $rawFactory, LayoutInterface $layout)
    {
        $this->rawFactory = $rawFactory;
        $this->layout = $layout;
    }

    public function execute()
    {
        /** @var TextBlock $block */
        $block = $this->layout->createBlock(TextBlock::class);
        $block->setText('This is the new output of the text block now.');
        $output = $block->toHtml();

        $rawResult = $this->rawFactory->create();
        $rawResult->setContents($output);
        $rawResult->setHeader('Content-Type', 'text/plain', true);

        return $rawResult;
    }
}