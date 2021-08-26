<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Command\BookEntity;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use BoonMarket\BookEntity\Api\SaveBookEntityInterface;
use BoonMarket\BookEntity\Model\BookEntityModel;
use BoonMarket\BookEntity\Model\BookEntityModelFactory;
use BoonMarket\BookEntity\Model\ResourceModel\BookEntityResource;
use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;

/**
 * Save BookEntity Command.
 */
class SaveCommand implements SaveBookEntityInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var BookEntityModelFactory
     */
    private $modelFactory;

    /**
     * @var BookEntityResource
     */
    private $resource;

    /**
     * @param LoggerInterface $logger
     * @param BookEntityModelFactory $modelFactory
     * @param BookEntityResource $resource
     */
    public function __construct(
        LoggerInterface        $logger,
        BookEntityModelFactory $modelFactory,
        BookEntityResource     $resource
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(BookEntityInterface $bookEntity): int
    {
        try {
            /** @var BookEntityModel $model */
            $model = $this->modelFactory->create();
            $model->addData($bookEntity->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(BookEntityInterface::BOOK_ENTITY_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save BookEntity. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save BookEntity.'));
        }

        return (int)$model->getData(BookEntityInterface::BOOK_ENTITY_ID);
    }
}
