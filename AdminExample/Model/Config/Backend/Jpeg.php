<?php

namespace Training\AdminExample\Model\Config\Backend;

class Jpeg extends \Magento\Config\Model\Config\Backend\File
{
    protected function _getAllowedExtensions()
    {
        return ['jpg', 'jpeg'];
    }
}