<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Mapper;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use BoonMarket\BookEntity\Api\Data\BookEntityInterfaceFactory;
use BoonMarket\BookEntity\Model\BookEntityModel;
use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Converts a collection of BookEntity entities to an array of data transfer objects.
 */
class BookEntityDataMapper
{
    /**
     * @var BookEntityInterfaceFactory
     */
    private $entityDtoFactory;

    /**
     * @param BookEntityInterfaceFactory $entityDtoFactory
     */
    public function __construct(
        BookEntityInterfaceFactory $entityDtoFactory
    )
    {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|BookEntityInterface[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var BookEntityModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var BookEntityInterface|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory->create();
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
