<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Query\BookEntity;

use BoonMarket\BookEntity\Api\Data\BookEntitySearchResultsInterface;
use BoonMarket\BookEntity\Api\Data\BookEntitySearchResultsInterfaceFactory;
use BoonMarket\BookEntity\Api\GetBookEntityListInterface;
use BoonMarket\BookEntity\Mapper\BookEntityDataMapper;
use BoonMarket\BookEntity\Model\ResourceModel\BookEntityModel\BookEntityCollection;
use BoonMarket\BookEntity\Model\ResourceModel\BookEntityModel\BookEntityCollectionFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;

/**
 * Get BookEntity list by search criteria query.
 */
class GetListQuery implements GetBookEntityListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var BookEntityCollectionFactory
     */
    private $entityCollectionFactory;

    /**
     * @var BookEntityDataMapper
     */
    private $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var BookEntitySearchResultsInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param BookEntityCollectionFactory $entityCollectionFactory
     * @param BookEntityDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param BookEntitySearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface            $collectionProcessor,
        BookEntityCollectionFactory             $entityCollectionFactory,
        BookEntityDataMapper                    $entityDataMapper,
        SearchCriteriaBuilder                   $searchCriteriaBuilder,
        BookEntitySearchResultsInterfaceFactory $searchResultFactory
    )
    {
        $this->collectionProcessor = $collectionProcessor;
        $this->entityCollectionFactory = $entityCollectionFactory;
        $this->entityDataMapper = $entityDataMapper;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultFactory = $searchResultFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): BookEntitySearchResultsInterface
    {
        /** @var BookEntityCollection $collection */
        $collection = $this->entityCollectionFactory->create();

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        /** @var BookEntitySearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
