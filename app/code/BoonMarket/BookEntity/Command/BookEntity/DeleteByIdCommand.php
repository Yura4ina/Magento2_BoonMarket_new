<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Command\BookEntity;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use BoonMarket\BookEntity\Api\DeleteBookEntityByIdInterface;
use BoonMarket\BookEntity\Model\BookEntityModel;
use BoonMarket\BookEntity\Model\BookEntityModelFactory;
use BoonMarket\BookEntity\Model\ResourceModel\BookEntityResource;
use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Delete BookEntity by id Command.
 */
class DeleteByIdCommand implements DeleteBookEntityByIdInterface
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
    public function execute(int $entityId): void
    {
        try {
            /** @var BookEntityModel $model */
            $model = $this->modelFactory->create();
            $this->resource->load($model, $entityId, BookEntityInterface::BOOK_ENTITY_ID);

            if (!$model->getData(BookEntityInterface::BOOK_ENTITY_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find BookEntity with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete BookEntity. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete BookEntity.'));
        }
    }
}
