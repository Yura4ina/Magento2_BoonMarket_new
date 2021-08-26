<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Block;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use BoonMarket\BookEntity\Model\ResourceModel\BookEntityModel\BookEntityCollection;
use BoonMarket\BookEntity\Model\Data\BookEntityDataFactory;
use Magento\Framework\UrlInterface;
use Magento\Catalog\Helper\Image;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;


class BookListPage extends \Magento\Framework\View\Element\Template
{

    const DETAILS_URL_PATH = "book_list/BookDetailsPage/View";
    const LIST_URL_PATH = "book_list/BookListPage/View";

    /**
     * @var BookEntityCollection
     */
    protected BookEntityCollection $_bookentitycollection;

    /**
     * @var BookEntityDataFactory
     */
    protected BookEntityDataFactory $bookEntityFactory;

    /**
     * @var Image
     */
    protected Image $imageHelper;

    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * @var UrlInterface
     */
    private UrlInterface $urlBuilder;

    /**
     * @param Template\Context $context
     * @param Image $imageHelper
     * @param BookEntityDataFactory $bookEntityFactory
     * @param BookEntityCollection $bookentitycollection
     * @param StoreManagerInterface $storeManager
     * @param UrlInterface $urlBuilder
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Image $imageHelper,
        BookEntityDataFactory $bookEntityFactory,
        BookEntityCollection $bookentitycollection,
        StoreManagerInterface $storeManager,
        UrlInterface $urlBuilder,
        array $data = []
    )
    {
        $this->bookEntityFactory = $bookEntityFactory;
        $this->imageHelper = $imageHelper;
        $this->storeManager = $storeManager;
        $this->_bookentitycollection = $bookentitycollection;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $data);
    }

    /**
     * @return BookEntityCollection
     */
    public function getBookCollection(): BookEntityCollection
    {
        return $this->_bookentitycollection->clear();
    }

    /**
     * @param $bookEntity
     * @return string
     * @throws NoSuchEntityException
     */
    public function getBookBanner($bookEntity) {
        return $this->storeManager->getStore()
                ->getBaseUrl(UrlInterface::URL_TYPE_MEDIA)
            . BookEntityInterface::BASE_BANNER_PATH . '/' . $bookEntity->getBanner();
    }

    /**
     * @param $bookEntity
     * @return string|void
     */
    public function getDetailsUrl($bookEntity)
    {
        if (isset($bookEntity[BookEntityInterface::BOOK_ENTITY_ID])){
            $urlData = [BookEntityInterface::BOOK_ENTITY_ID => $bookEntity[BookEntityInterface::BOOK_ENTITY_ID]];
            return $this->urlBuilder->getUrl(self::DETAILS_URL_PATH, $urlData);
        }
    }

    /**
     * @return BookListPage
     */
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
}

