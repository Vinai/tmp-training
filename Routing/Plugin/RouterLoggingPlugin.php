<?php

namespace Training\Routing\Plugin;

use Magento\Framework\App\FrontControllerInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\App\RouterListInterface;
use Psr\Log\LoggerInterface;

class RouterLoggingPlugin
{
    /**
     * @var RouterListInterface
     */
    private $routerList;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(RouterListInterface $routerList, LoggerInterface $logger)
    {
        $this->routerList = $routerList;
        $this->logger = $logger;
    }

    public function afterDispatch(FrontControllerInterface $subject, $result, RequestInterface $request)
    {
        $routerClasses = array_map(function (RouterInterface $router): string {
            return get_class($router);
        }, iterator_to_array($this->routerList));

        $this->logger->info('[Routers] ' . implode(', ', $routerClasses));

        return $result;
    }
}
