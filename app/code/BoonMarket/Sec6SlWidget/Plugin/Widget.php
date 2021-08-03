<?php
namespace  BoonMarket\Sec6SlWidget\Plugin;

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
    public function beforeGetWidgetDeclaration(
        \Magento\Widget\Model\Widget $subject,
        $type,
        $params = [],
        $asIs = true
    ) {
        foreach ($params as $name => $value) {
            if (preg_match('/(___directive\/)([a-zA-Z0-9,_-]+)/', $value, $matches)) {
                $directive = base64_decode(strtr($matches[2], '-_,', '+/='));
                $params[$name] = str_replace(['{{media url="', '"}}'], ['', ''], $directive);
            }
        }
        return [$type, $params, $asIs];
    }
}
