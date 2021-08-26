<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Model\ResourceModel\BookEntityModel;

use BoonMarket\BookEntity\Model\BookEntityModel;
use BoonMarket\BookEntity\Model\ResourceModel\BookEntityResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class BookEntityCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'el_book_entity_collection';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(BookEntityModel::class, BookEntityResource::class);
    }
}
