<?php

namespace Training\RepositoryExample\Controller\Demo;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Hoodies implements ActionInterface
{
    private $productRepository;
    private $searchCriteriaBuilder;
    private $rawFactory;
    private $sortOrderBuilder;

    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        RawFactory $rawFactory,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->rawFactory = $rawFactory;
        $this->sortOrderBuilder = $sortOrderBuilder;
    }

    public function execute()
    {
        $this->searchCriteriaBuilder->addFilter('name', '%hoodie%', 'like');
        
        $this->searchCriteriaBuilder->setPageSize(20);

        $sortOrder = $this->sortOrderBuilder->setDescendingDirection()->setField('created_at')->create();
        $this->searchCriteriaBuilder->addSortOrder($sortOrder);

        $searchCritera = $this->searchCriteriaBuilder->create();
        $result = $this->productRepository->getList($searchCritera);

        $rawResult = $this->rawFactory->create();

        $resultData = array_map(function (ProductInterface $p): string {
            return $p->getSku() . ', ' . $p->getName() . ', ' . $p->getCreatedAt();
        }, $result->getItems());

        $rawResult->setContents(implode(PHP_EOL, $resultData));
        $rawResult->setHeader('Content-Type', 'text/plain', true);

        return $rawResult;
    }
}
