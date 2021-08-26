<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Model;

use BoonMarket\BookEntity\Api\Data\BookEntitySearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * BookEntity entity search results implementation.
 */
class BookEntitySearchResults extends SearchResults implements BookEntitySearchResultsInterface
{
    /**
     * @inheritDoc
     */
    public function setItems(array $items): BookEntitySearchResultsInterface
    {
        return parent::setItems($items);
    }

    /**
     * @inheritDoc
     */
    public function getItems(): array
    {
        return parent::getItems();
    }
}
