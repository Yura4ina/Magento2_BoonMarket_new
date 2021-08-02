<?php

namespace BoonMarket\ShopSectionWidget\Block\Widget;

use Magento\Backend\Block\Template\Context;
use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Helper\Image;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Pricing\Helper\Data;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Widget\Block\BlockInterface;
use Magento\Framework\Url\Helper\Data as UrlHelperData;

class ShopSectionWidget extends Template implements BlockInterface
{

    const  DEFAULT_TEMPLATE = "widget/shop_sec.phtml";

    /**
     * @var CategoryFactory
     */
    protected CategoryFactory $_categoryFactory;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $_productCollectionFactory;

    /**
     * @var Image
     */
    protected Image $imageHelper;

    /**
     * @var ProductFactory
     */
    protected ProductFactory $productFactory;

    /**
     * @var Data
     */
    protected Data $priceHelper;

    /**
     * @var UrlHelperData
     */
    protected UrlHelperData $urlHelper;

    /**
     * @var AbstractProduct
     */
    public AbstractProduct $abstrPr;

    /**
     * ShopSectionWidget constructor.
     * @param Context $context
     * @param CategoryFactory $categoryFactory
     * @param CollectionFactory $productCollectionFactory
     * @param Image $imageHelper
     * @param ProductFactory $productFactory
     * @param Data $priceHelper
     * @param UrlHelperData $urlHelper
     * @param array $data
     * @param AbstractProduct $abstrPr
     */
    public function __construct(
        Context $context,
        CategoryFactory $categoryFactory,
        CollectionFactory $productCollectionFactory,
        Image $imageHelper,
        ProductFactory $productFactory,
        Data $priceHelper,
        AbstractProduct $abstrPr,
        UrlHelperData $urlHelper,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->priceHelper = $priceHelper;
        $this->imageHelper = $imageHelper;
        $this->productFactory = $productFactory;
        $this->urlHelper = $urlHelper;
        $this->abstrPr = $abstrPr;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_categoryFactory = $categoryFactory;
    }

    public function _construct()
    {
        if (!$this->hasData('template')) {
            $this->setData('template', self::DEFAULT_TEMPLATE);
        }
        parent::_construct();
    }

    /**
     *
     *
     * @return array|mixed|null
     */
    public function getSecTitle()
    {
        return $this->getData('sec_title');
    }

    /**
     * Get category object
     *
     * @param $categoryId
     * @return Category
     */
    public function getCategory($categoryId)
    {
        $category = $this->_categoryFactory->create()->load($categoryId);
        return $category && $category->getId() ? $category : null;
    }

    /**
     * @param $categoryId
     * @return bool|string
     * @throws LocalizedException
     */
    public function getSubCategoryImage($categoryId)
    {
        return $this->getCategory($categoryId)->getImageUrl();
    }

    /**
     * @param $categoryId
     * @return Category[]|\Magento\Catalog\Model\ResourceModel\Category\Collection
     */
    public function getChildrenCategories($categoryId)
    {
        $category = $this->getCategory($categoryId);
        return $category ? $category->getChildrenCategories() : [];
    }

    /**
     * @param $ids
     * @return Collection
     */
    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    }

    /**
     * @param $id
     * @return string
     */
    public function getProductImageUrl($id)
    {
        try {
            $product = $this->productFactory->create()->load($id);
        } catch (NoSuchEntityException $e) {
            return 'Data not found';
        }
        $url = $this->imageHelper->init($product, 'product_base_image')->getUrl();
        return $url;
    }

    /**
     * @param $price
     * @return float|string
     */
    public function getFormattedPrice($price)
    {
        return $this->priceHelper->currency($price, true, false);
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }


    /**
     * Get post parameters
     *
     * @param Product $product
     * @return array
     */
    public function getAddToCartPostParams(Product $product)
    {
        $url = $this->abstrPr->getAddToCartUrl($product, ['_escape' => false]);
        return [
            'action' => $url,
            'data' => [
                'product' => (int) $product->getEntityId(),
                ActionInterface::PARAM_NAME_URL_ENCODED => $this->urlHelper->getEncodedUrl($url),
            ]
        ];
    }

    /**
     * Retrieve block html
     *
     * @param   string $name
     * @return  string
     */
    public function getBlockHtml($name)
    {
        $block = $this->_layout->getBlock($name);
        if ($block) {
            return $block->toHtml();
        }
        return '';
    }
}
