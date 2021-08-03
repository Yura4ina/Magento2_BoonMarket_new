<?php
namespace BoonMarket\AddWidgetButton\Plugin\Helper\Product;

use Magento\Catalog\Model\Product;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\DataObject;
use Magento\Framework\View\Result\Page;

/**
 * Class View
 */
class View
{
    /**
     * @var FilterProvider
     */
    private $_filterProvider;

    /**
     * Constructor.
     *
     * @param FilterProvider $filterProvider
     */
    public function __construct(
        FilterProvider $filterProvider
    ) {
        $this->_filterProvider = $filterProvider;
    }

    /**
     * Init layout for viewing product page
     *
     * @param \Magento\Catalog\Helper\Product\View $subject
     * @param \Magento\Catalog\Helper\Product\View $result
     * @param Page $resultPage
     * @param Product $product
     * @param null|DataObject $params
     * @return \[Vendor]\[ModuleName]\Plugin\Helper\Product\View
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterInitProductLayout(
        \Magento\Catalog\Helper\Product\View $subject,
        $result,
        $resultPage,
        $product,
        $params
    ) {
        // filter product description to process widgets
        $description = $product->getResource()->getAttribute('description')->getFrontend()->getValue($product);
        $filteredDescription = $this->_filterProvider->getPageFilter()->filter($description);
        $product->setDescription($filteredDescription);

        return $this;
    }
}
