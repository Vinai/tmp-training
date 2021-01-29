<?php

namespace Training\Rendering\Controller\Block;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Element\Template as TemplateBlock;
use Magento\Framework\Controller\Result\RawFactory;

class TemplateBlockExample implements ActionInterface
{
    private $layout;

    /**
     * @var RawFactory
     */
    private $rawFactory;

    public function __construct(LayoutInterface $layout, RawFactory $rawFactory)
    {
        $this->layout = $layout;
        $this->rawFactory = $rawFactory;
    }

    /**
     * URL Path: /render/block/templateBlockExample
     */
    public function execute()
    {
        /** @var TemplateBlock $block */
        $block = $this->layout->createBlock(TemplateBlock::class);
        $block->setTemplate('Training_Rendering::example-template.phtml');
        $output = $block->toHtml();

        $rawResult = $this->rawFactory->create();
        $rawResult->setContents($output);
        $rawResult->setHeader('Content-Type', 'text/html', true);

        return $rawResult;
    }
}