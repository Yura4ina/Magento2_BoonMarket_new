<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Block\Form\BookEntity;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\UrlInterface;

/**
 * Generic (form) button for BookEntity entity.
 */
class GenericButton
{
    /**
     * @var Context
     */
    private $context;

    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    )
    {
        $this->context = $context;
        $this->urlBuilder = $context->getUrlBuilder();
    }

    /**
     * Get BookEntity entity id.
     *
     * @return int
     */
    public function getBookEntityId(): int
    {
        return (int)$this->context->getRequest()->getParam(BookEntityInterface::BOOK_ENTITY_ID);
    }

    /**
     * Wrap button specific options to settings array.
     *
     * @param string $label
     * @param string $class
     * @param string $onclick
     * @param array $dataAttribute
     * @param int $sortOrder
     *
     * @return array
     */
    protected function wrapButtonSettings(
        string $label,
        string $class,
        string $onclick = '',
        array  $dataAttribute = [],
        int    $sortOrder = 0
    ): array
    {
        return [
            'label' => $label,
            'on_click' => $onclick,
            'data_attribute' => $dataAttribute,
            'class' => $class,
            'sort_order' => $sortOrder
        ];
    }

    /**
     * Get url.
     *
     * @param string $route
     * @param array $params
     *
     * @return string
     */
    protected function getUrl(string $route, array $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
