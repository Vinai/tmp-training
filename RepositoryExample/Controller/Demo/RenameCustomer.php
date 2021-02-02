<?php

namespace Training\RepositoryExample\Controller\Demo;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\App\ActionInterface;

class RenameCustomer implements ActionInterface
{
    private $request;

    private $customerRepository;

    private $jsonFactory;

    private $dataObjectProcessor;

    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
    )
    {
        $this->request = $request;
        $this->customerRepository = $customerRepository;
        $this->jsonFactory = $jsonFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
    }
    
    public function execute()
    {
        $json = $this->jsonFactory->create();
        try {
            $customerId = (int) $this->request->getParam('id', 1);
            $newName = $this->request->getParam('name', '');

            $renamedCustomer = $this->renameCustomer($newName, $customerId);
            $customerDataArray = $this->dataObjectProcessor->buildOutputDataArray($renamedCustomer, CustomerInterface::class);
            $json->setData(['customer' => $customerDataArray]);

        } catch (\Exception $exception) {
            $json->setData(['error' => $exception->getMessage()]);
        }
        return $json;
    }

    private function renameCustomer(string $newName, int $customerId): CustomerInterface
    {
        if (! $newName) { // if empty or '0'
            throw new \RuntimeException('No new Customer name specified');
        }
        
        $customer = $this->customerRepository->getById($customerId);
        $customer->setFirstname($newName);

        return $this->customerRepository->save($customer);
    }
}

