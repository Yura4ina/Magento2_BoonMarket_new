<?php
namespace BoonMarket\ShopSectionWidget\Services;

use BoonMarket\ShopSectionWidget\Block\Widget\ShopSectionWidget;

class AjaxProductGenerator
{
    /**
     * @var ShopSectionWidget
     */
    private $widgetBlock;

    public function __construct(
        ShopSectionWidget $widgetBlock
    )
    {
        $this->widgetBlock = $widgetBlock;
    }

    /**
     * @param $catId
     * @return string
     */
    public function getAjaxProductsById($catId): string
    {
        $returnProducts = 'hello';
//        $products = $this->_widgetBlock->getProductCollectionByCategories($catId);
//        foreach ($products as $product):
//            $returnProducts .= '<div class="section4__products__product swiper-slide">
//                <div class="section4__products__product__image">
//                    <img src="' . $this->widgetBlock->getProductImageUrl($product->getId()) . '" alt="">
//                </div>
//                <div class="section4__products__product__title">' . $product->getName() . '</div>
//                <div class="section4__products__product__description">' . $product->getShortDescription() .'</div>
//                <div class="section4__products__product__price_addbag">
//                    <div class="section4__products__product__addbag">
//                        <span>Add to Bag</span> - ' . $this->_widgetBlock->getFormattedPrice($product->getPrice()) . '
//                    </div>
//                    <div class="section4__products__product__giveback"> ' . $product->getAttributeText('giveback') . '
//                    </div>
//                </div>
//            </div>';
//         endforeach;

         return $returnProducts;
    }
}
