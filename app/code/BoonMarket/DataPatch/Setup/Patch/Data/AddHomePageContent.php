<?php
/**
 * @author Yurii Voitkov
 * @package BoonMarket_DataPatch
 */

namespace BoonMarket\DataPatch\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Cms\Model\PageFactory;
use Exception;

/**
 * Class AddHomePageContent
 * @package BoonMarket\DataPatch\Setup\Patch\Data
 */
class AddHomePageContent implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private ModuleDataSetupInterface $moduleDataSetup;

    /**
     * @var PageFactory
     */
    private PageFactory $pageFactory;

    /**
     * AddNewCmsPage constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param PageFactory $pageFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        PageFactory $pageFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->pageFactory = $pageFactory;
    }

    /**
     * {@inheritdoc}
     * @throws Exception
     */
    public function apply()
    {
        $pageData = [
            'title' => 'Home page',
            'page_layout' => '1column',
            'meta_keywords' => 'Page keywords',
            'meta_description' => 'Page description',
            'identifier' => 'home',
            'content_heading' => 'Home Page',
            'content' => '<p>{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="1"}}{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="2"}}{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="3"}}{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="4"}}{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="5"}}{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="6"}}{{widget type="Magento\Cms\Block\Widget\Block" template="widget/static_block/default.phtml" block_id="7"}}</p>',
            'layout_update_xml' => '<!--
                                    <referenceContainer name="right">
                                        <referenceBlock name="catalog.compare.sidebar" remove="true" />
                                    </referenceContainer>-->',
            'url_key' => 'home',
            'is_active' => 1,
            'stores' => [0], // store_id comma separated
            'sort_order' => 0
        ];

        $this->moduleDataSetup->startSetup();
        /* Save CMS Page logic */
        try {
            $page = $this->pageFactory->create()
                ->load($pageData['identifier'], 'identifier');
            if (!$page->getIdentifier()) {
                $page->setData($pageData)->save();
            } else {
                $page->setTitle($pageData['title'])->save();
                $page->setMetaKeywords($pageData['meta_keywords'])->save();
                $page->setMetaDescription($pageData['meta_description'])->save();
                $page->setContentHeading($pageData['content_heading'])->save();
                $page->setContent($pageData['content'])->save();
            }
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): array
    {
        return [
            AddBoonMarketBlocks::class
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
