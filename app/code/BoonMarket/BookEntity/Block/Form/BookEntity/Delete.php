<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Block\Form\BookEntity;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Delete entity button.
 */
class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Delete button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return $this->wrapButtonSettings(
            'Delete',
            'delete',
            'deleteConfirm(\''
            . __('Are you sure you want to delete this bookentity?')
            . '\', \'' . $this->getUrl(
                '*/*/delete',
                [BookEntityInterface::BOOK_ENTITY_ID => $this->getBookEntityId()]
            ) . '\')',
            [],
            20
        );
    }
}
