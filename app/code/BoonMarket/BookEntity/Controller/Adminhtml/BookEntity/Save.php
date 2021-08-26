<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Controller\Adminhtml\BookEntity;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use BoonMarket\BookEntity\Api\Data\BookEntityInterfaceFactory;
use BoonMarket\BookEntity\Api\SaveBookEntityInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Save BookEntity controller action.
 */
class Save extends Action implements HttpPostActionInterface
{
    const BASE_PATH = 'catalog/books';
    const BASE_TEMP_PATH = 'catalog/tmp/books';

    /**
     *
     * @var UploaderFactory
     */
    protected $uploaderFactory;
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'BoonMarket_BookEntity::book_management';

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @var SaveBookEntityInterface
     */
    private $saveCommand;

    /**
     * @var BookEntityInterfaceFactory
     */
    private $entityDataFactory;

    /**
     * @var Filesystem\Directory\WriteInterface
     */
    private Filesystem\Directory\WriteInterface $mediaDirectory;

    /**
     * @var File
     */
    private $file;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param SaveBookEntityInterface $saveCommand
     * @param BookEntityInterfaceFactory $entityDataFactory
     */
    public function __construct(
        Context                    $context,
        DataPersistorInterface     $dataPersistor,
        UploaderFactory $uploaderFactory,
        SaveBookEntityInterface    $saveCommand,
        BookEntityInterfaceFactory $entityDataFactory,
        Filesystem $filesystem,
        File $file,
        StoreManagerInterface $storeManager
    )
    {
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
        $this->saveCommand = $saveCommand;
        $this->uploaderFactory = $uploaderFactory;
        $this->entityDataFactory = $entityDataFactory;
        $this->mediaDirectory = $filesystem->getDirectoryWrite(DirectoryList::MEDIA);
        $this->file = $file;
        $this->storeManager = $storeManager;
    }


    /**
     * Filter category data
     *
     * @deprecated 101.0.8
     * @param array $rawData
     * @return array
     */
    protected function _filterCategoryPostData(array $rawData)
    {
        $data = $rawData;
        if (isset($data['general']['banner']) && is_array($data['general']['banner'])) {
            if (!empty($data['general']['banner']['delete'])) {
                $data['general']['banner'] = null;
            } else {
                if (isset($data['general']['banner'][0]['name'])) {
                    if(isset($data['general']['banner'][0]['tmp_name'])){
                        $this->mediaDirectory->copyFile(
                            self::BASE_TEMP_PATH. '/' . $data['general']['banner'][0]['name'],
                            self::BASE_PATH. '/' . $data['general']['banner'][0]['name']
                        );
                        $this->file->deleteFile($this->mediaDirectory->getAbsolutePath() .
                            self::BASE_TEMP_PATH. '/' . $data['general']['banner'][0]['name']);
                    }else{
                        $mediaUrl = $this->storeManager->getStore()
                            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
                        $isChanged = strpos($data['general']['banner'][0]['url'], $mediaUrl);
                        if($isChanged !== 0 && $isChanged !== false){
                            $this->mediaDirectory->copyFile(
                                ltrim($data['general']['banner'][0]['url'], '/media'),
                                self::BASE_PATH. '/' . $data['general']['banner'][0]['name']
                            );
                        }
                    }
                    $data['general']['banner'] = $data['general']['banner'][0]['name'];
                } else {
                    unset($data['general']['banner']);
                }
            }
        }
        return $data;
    }

    /**
     * Save BookEntity Action.
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {

        $resultRedirect = $this->resultRedirectFactory->create();
        $params = $this->getRequest()->getParams();
        $filterParams = $this->_filterCategoryPostData($params);

        try {
            /** @var BookEntityInterface|DataObject $entityModel */
            $entityModel = $this->entityDataFactory->create();
            $entityModel->addData($filterParams['general']);
            $this->saveCommand->execute($entityModel);
            $this->messageManager->addSuccessMessage(
                __('The BookEntity data was saved successfully')
            );
            $this->dataPersistor->clear('entity');
        } catch (CouldNotSaveException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->dataPersistor->set('entity', $params);

            return $resultRedirect->setPath('*/*/edit', [
                BookEntityInterface::BOOK_ENTITY_ID => $this->getRequest()->getParam(BookEntityInterface::BOOK_ENTITY_ID)
            ]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
