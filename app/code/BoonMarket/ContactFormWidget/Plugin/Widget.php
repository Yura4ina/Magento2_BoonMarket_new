<?php

namespace  BoonMarket\ContactFormWidget\Plugin;
use Magento\Backend\Helper\Data;

class Widget
{
    /**
     * @var Data
     */
    protected $backendData;
    /**
     * Widget constructor.
     *
     * @param Data $backendData
     */
    public function __construct(
        Data $backendData
    ) {
        $this->backendData = $backendData;
    }
}
