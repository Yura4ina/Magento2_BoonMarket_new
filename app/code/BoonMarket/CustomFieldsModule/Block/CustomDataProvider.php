<?php

namespace BoonMarket\CustomFieldsModule\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class CustomDataProvider extends Template
{

    const XML_PATH_CUSTOM_FIELDS_MODULE = 'customfieldsmodule/';

    /** @var ScopeConfigInterface */
    public ScopeConfigInterface $scopeConfig;

    public function __construct(Context $context, ScopeConfigInterface $scopeConfig, array $data = [])
    {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_CUSTOM_FIELDS_MODULE . 'general/' . $code, $storeId);
    }

}
