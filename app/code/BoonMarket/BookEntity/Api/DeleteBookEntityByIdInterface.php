<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete BookEntity by id Command.
 *
 * @api
 */
interface DeleteBookEntityByIdInterface
{
    /**
     * Delete BookEntity.
     * @param int $entityId
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void;
}
