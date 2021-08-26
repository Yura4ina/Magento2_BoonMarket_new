<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Controller\Adminhtml\BookEntity;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * BookEntity backend index (list) controller.
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * Authorization level of a basic admin session.
     */
    const ADMIN_RESOURCE = 'BoonMarket_BookEntity::book_management';

    /**
     * Execute action based on request and return result.
     *
     * @return ResultInterface|ResponseInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $resultPage->setActiveMenu('BoonMarket_BookEntity::book_management');
        $resultPage->addBreadcrumb(__('BookEntity'), __('BookEntity'));
        $resultPage->addBreadcrumb(__('Manage BookEntitys'), __('Manage BookEntitys'));
        $resultPage->getConfig()->getTitle()->prepend(__('BookEntity List'));

        return $resultPage;
    }
}
