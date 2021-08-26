<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Api;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Save BookEntity Command.
 *
 * @api
 */
interface SaveBookEntityInterface
{
    /**
     * Save BookEntity.
     * @param \BoonMarket\BookEntity\Api\Data\BookEntityInterface $bookEntity
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(BookEntityInterface $bookEntity): int;
}
