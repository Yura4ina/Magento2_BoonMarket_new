<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);


namespace BoonMarket\BookEntity\Block;

use BoonMarket\BookEntity\Model\ResourceModel\BookEntityModel\BookEntityCollection;
use BoonMarket\BookEntity\Model\BookEntityModelFactory;
use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use Magento\Framework\UrlInterface;
use Magento\Catalog\Helper\Image;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;

class BookDetailsPage extends \Magento\Framework\View\Element\Template
{
    /**
     * @var BookEntityCollection
     */
    protected BookEntityCollection $_bookentitycollection;

    /**
     * @var BookEntityModelFactory
     */
    protected BookEntityModelFactory $bookEntityModelFactory;

    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * @var Image
     */
    protected Image $imageHelper;

    /**
     * @param Template\Context $context
     * @param Image $imageHelper
     * @param BookEntityModelFactory $bookEntityModelFactory
     * @param BookEntityCollection $bookentitycollection
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Image $imageHelper,
        BookEntityModelFactory $bookEntityModelFactory,
        BookEntityCollection $bookentitycollection,
        StoreManagerInterface $storeManager,
        array $data = []
    )
    {
        $this->imageHelper = $imageHelper;
        $this->storeManager = $storeManager;
        $this->_bookentitycollection = $bookentitycollection;
        $this->bookEntityModelFactory = $bookEntityModelFactory;
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
     * @return mixed
     */
    public function getCurrentBook() {
        $bouquetId = $this->getRequest()->getParam(BookEntityInterface::BOOK_ENTITY_ID);
        return $this->bookEntityModelFactory->create()->load($bouquetId);
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

    public function getBookTitle($bookEntity){
        return $bookEntity->getTitle();
    }

    public function getBookDescription($bookEntity){
        return $bookEntity->getDescription();
    }

    public function getBookAuthor($bookEntity){
        return $bookEntity->getAuthor();
    }

    public function getBookPrice($bookEntity){
        return $bookEntity->getPrice();
    }

    public function getBookPublishDate($bookEntity){
        return $bookEntity->getPublishDate();
    }

//    public function getBookBannerUrlById($id)
//    {
//        $book = '';
//        try {
//            foreach ($this->_bookentitycollection as $item):
//                if($item->getId() == $id){
//                    $book = $item;
//                }
//            endforeach;
//        } catch (NoSuchEntityException $e) {
//            return 'Data not found';
//        }
//        return $book->getBanner();
//    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
}
