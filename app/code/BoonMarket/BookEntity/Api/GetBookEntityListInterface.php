<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Api;

use BoonMarket\BookEntity\Api\Data\BookEntitySearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Get BookEntity list by search criteria query.
 *
 * @api
 */
interface GetBookEntityListInterface
{
    /**
     * Get BookEntity list by search criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return \BoonMarket\BookEntity\Api\Data\BookEntitySearchResultsInterface
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): BookEntitySearchResultsInterface;
}
