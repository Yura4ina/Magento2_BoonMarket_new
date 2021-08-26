<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Model;

use BoonMarket\BookEntity\Model\ResourceModel\BookEntityResource;
use Magento\Framework\Model\AbstractModel;

class BookEntityModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'el_book_entity_model';

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(BookEntityResource::class);
    }
}
