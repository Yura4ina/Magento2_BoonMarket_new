<?php

namespace BoonMarket\DataPatch\Setup\Patch\Data;

use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Theme\Model\ResourceModel\Theme\CollectionFactory;
use Exception;

class SetBoonMarketThemeDefault implements DataPatchInterface, PatchRevertableInterface
{
    const THEME_NAME = 'Elogic/BoonMarket';

    private CollectionFactory $collectionFactory;
    protected ModuleDataSetupInterface $moduleDataSetup;
    protected WriterInterface $writer;


    public function __construct(WriterInterface $writer, CollectionFactory $collectionFactory, ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->writer = $writer;
        $this->collectionFactory = $collectionFactory;
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        try {
            $themes = $this->collectionFactory->create()->loadRegisteredThemes();

            foreach ($themes as $theme) {
                if ($theme->getCode() == self::THEME_NAME) {
                    $this->writer->save('design/theme/theme_id', $theme->getId());
                }
            }
        }
        catch (Exception $exception) {
            echo $exception->getMessage();
        }
        $this->moduleDataSetup->endSetup();
    }

    public function revert()
    {
        $this->moduleDataSetup->startSetup();
        try {
            $themes = $this->collectionFactory->create()->loadRegisteredThemes();
            foreach ($themes as $theme) {
                if ($theme->getCode() == 'Magento/luma') {
                    $this->writer->save('design/theme/theme_id', $theme->getId());
                }
            }
        }
        catch (Exception $exception) {
            echo $exception->getMessage();
        }

        $this->moduleDataSetup->endSetup();
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
