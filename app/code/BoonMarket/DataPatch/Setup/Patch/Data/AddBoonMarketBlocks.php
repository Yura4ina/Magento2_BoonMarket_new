<?php

/**
 * @author YriiVoitkov
 * @package BoonMarket_DataPatch
 */

namespace BoonMarket\DataPatch\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\BlockFactory;
use Exception;

/**
 * Class UpdateTest2Block
 * @package Test\CmsExport\Setup\Patch\Data
 */
class AddBoonMarketBlocks implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var BlockFactory
     */
    private $blockFactory;

    /**
     * AddAboutCmsBlock constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param BlockFactory $blockFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        BlockFactory $blockFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->blockFactory = $blockFactory;
    }

    /**
     * @throws Exception
     */
    public function apply()
    {
        $newCmsStaticBlock = [
            [
                'title' => 'First screen sec',
                'identifier' => 'section1',
                'content' => '<section class="section1">
                                <div class="sec1_content">
                                <h1>Shop Goods That Do Good</h1>
                                <a class="shop_now" href="http://magento2.test/shop-page"> Shop now </a></div>
                                <section></section>
                                </section>',
                'is_active' => 1,
                'stores' =>  [1]
            ],
            [
                'title' => 'Section2',
                'identifier' => 'section2',
                'content' => '<section class="section2">
                            <div class="section2__content">
                            <div class="section2__table">
                            <div class="section2__content__coll1">
                            <div class="section2__content__fz24">The Boon Impact</div>
                            <div class="section2__content__fz12 section2__content__coll1__fz12">Every purchase gives money directly to a cause of your choice.</div>
                            </div>
                            <div class="section2__content__coll2">
                            <div class="section2__content__fz45">$100,664,335</div>
                            <div class="section2__content__fz12 bedge upper section2__content__coll2__fz12">donated to date</div>
                            </div>
                            <div class="section2__content__coll3">
                            <div class="section2__content__fz12 section2__content__coll3__top">Want to make a difference?</div>
                            <div class="section2__content__fz12 section2__content__coll3__bottom">Learn More</div>
                            </div>
                            </div>
                            </div>
                            </section>',
                'is_active' => 1,
                'stores' =>  [1]
            ],
            [
                'title' => 'About BoonMarket',
                'identifier' => 'section3',
                'content' => '<p>{{widget type="BoonMarket\HowWeWorkWidget\Block\Widget\HowWeWorkBlock" sm_title="About Boon" rg_title="How We Work" item_f_image="sec3_item1_img_1.png" item_f_title="Good For You" item_f_description="We feature clever, beautiful products that are zero-waste, non-GMO, and toxin-free." item_s_image="sec3_item2_img.png" item_s_title="Good For The Planet" item_s_description="Our zero-waste products and featured articles make it easy for anyone to make easy swaps with big environmental benefit." item_t_image="sec3_item3_img.png" item_t_title="Good For The Community" item_t_description="Each purchase made on Boon Market sends money to the cause of your choice."}}</p>',
                'is_active' => 1,
                'stores' =>  [1]
            ],
            [
                'title' => 'Shop slider',
                'identifier' => 'section4',
                'content' => '<p>{{widget type="BoonMarket\ShopSectionWidget\Block\Widget\ShopSectionWidget" sec_title="Shop Your Values"}}</p>',
                'is_active' => 1,
                'stores' =>  [1]
            ],
            [
                'title' => 'Section5',
                'identifier' => 'section5',
                'content' => '<p>{{widget type="BoonMarket\WhatFreshWidget\Block\Widget\WhatFreshBlock" sec_title="What\'s Fresh" big_image_f="wf1.png" tag_text_f="Collection" rg_title_f="Waste-Free Kitchen &amp; Lunch" description_f="Simple swaps with big environmental impact." shop_now_text_f="Shop Now" big_image_s="wf22.png" tag_text_s="Collection" rg_title_s="Toxin-Free Personal Care" description_s="All-natural toxin-free care for every body." shop_now_text_s="Shop Now" big_image_t="wf2.png" tag_text_t="Collection" rg_title_t="Coffee &amp; Tea" description_t="Give back every morning with your first sip." shop_now_text_t="Shop Now"}}</p>',
                'is_active' => 1,
                'stores' =>  [1]
            ],
            [
                'title' => 'Section6',
                'identifier' => 'section6',
                'content' => '<p>{{widget type="BoonMarket\Sec6SlWidget\Block\Widget\Sec6SlBlock" f_sl_image="sec6Sl.png" f_sl_title="Celebrating Every Age" f_sl_description="Rachel Peters marketed big brands before the need for deodorant and personal care products for her preteens inspired her to start Clean Age alongside h..." f_sl_read_more="Read More" s_sl_image="sec6Sl.png" s_sl_title="Celebrating Every Age slide 2" s_sl_description="Rachel Peters marketed big brands before the need for deodorant and personal care products for her preteens inspired her to start Clean Age alongside h..." s_sl_read_more="Read More" t_sl_image="sec6Sl.png" t_sl_title="Celebrating Every Age slide 3" t_sl_description="Rachel Peters marketed big brands before the need for deodorant and personal care products for her preteens inspired her to start Clean Age alongside h..." t_sl_read_more="Read More"}}</p>',
                'is_active' => 1,
                'stores' =>  [1]
            ],
            [
                'title' => 'Section7',
                'identifier' => 'section7',
                'content' => '<p>{{widget type="BoonMarket\PhotoGallerySec\Block\Widget\PhotoGallerySecBlock" sec_title="#ShopForGood" gall_image_1="gall1.png" gall_image_2="gall2.png" gall_image_3="gall3.png" gall_image_4="gall4.png" gall_image_5="gall5.png" gall_image_6="gall6.png" gall_image_7="gall7.png" gall_image_8="gall8.png" gall_image_9="gall9.png" gall_image_10="gall10.png"}}</p>',
                'is_active' => 1,
                'stores' =>  [1]
            ]
        ];

        $this->moduleDataSetup->startSetup();
        try {
            foreach ($newCmsStaticBlock as $bl) {
                $block = $this->blockFactory->create()
                    ->load($bl['identifier'], 'identifier');
                if (!$block->getId()) {
                    $block->setData($bl)->save();
                } else {
                    $block->setTitle($bl['title'])->save();
                    $block->setContent($bl['content'])->save();
                }
            }
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        $this->moduleDataSetup->endSetup();
    }

    /**
     * Delete the block
     */
    public function revert(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [
            SetBoonMarketThemeDefault::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion(): string
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return [];
    }
}
