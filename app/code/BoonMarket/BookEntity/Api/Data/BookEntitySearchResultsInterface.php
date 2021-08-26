<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * BookEntity entity search result.
 */
interface BookEntitySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \BoonMarket\BookEntity\Api\Data\BookEntityInterface[] $items
     *
     * @return BookEntitySearchResultsInterface
     */
    public function setItems(array $items): BookEntitySearchResultsInterface;

    /**
     * Get items.
     *
     * @return \BoonMarket\BookEntity\Api\Data\BookEntityInterface[]
     */
    public function getItems(): array;
}
