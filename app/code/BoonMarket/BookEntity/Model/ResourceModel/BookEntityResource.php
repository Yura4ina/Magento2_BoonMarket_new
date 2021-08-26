<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Model\ResourceModel;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class BookEntityResource extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'el_book_entity_resource_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init('el_book_entity', BookEntityInterface::BOOK_ENTITY_ID);
        $this->_useIsObjectNew = true;
    }
}
