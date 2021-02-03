<?php

namespace Training\AdminExample\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class TrainingConfigViewModel implements ArgumentInterface
{
    private $scopeConfig;

    /**
     * @param \Magento\Framework\View\Asset\FileFactory
     */
    private $mediaFileFactory;

    /**
     * @param \Magento\Framework\Encryption\EncryptorInterface
     */
    private $encryptor;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\View\Asset\FileFactory $mediaFileFactory,
        \Magento\Framework\Encryption\EncryptorInterface $encryptor
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->mediaFileFactory = $mediaFileFactory;
        $this->encryptor = $encryptor;
    }
    
    public function getTestValue(): bool
    {
        $value = $this->scopeConfig->getValue('training/general/test', 'store');
        return (bool) $value;
    }

    public function getUploadedImagePath(): string
    {
        $value = $this->scopeConfig->getValue('training/general/image_file', 'store');
        return (string) $value;
    }

    public function getUploadedImageUrl(): string
    {
        return 'will come later...';
    }

    public function getPasswordValue(): string
    {
        $value = $this->scopeConfig->getValue('training/general/password', 'store');
        return $this->encryptor->decrypt($value);
    }
}
