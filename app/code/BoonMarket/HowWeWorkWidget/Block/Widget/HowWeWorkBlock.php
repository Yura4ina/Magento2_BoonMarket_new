<?php
namespace BoonMarket\HowWeWorkWidget\Block\Widget;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class HowWeWorkBlock extends Template implements BlockInterface {

    const  DEFAULT_TEMPLATE = "widget/how_we_work.phtml";

    public function _construct()
    {
        if (!$this->hasData('template')) {
            $this->setData('template', self::DEFAULT_TEMPLATE);
        }

        return parent::_construct();
    }

    /**
     * @return string
     */
    public function getSmTitle() {
        return $this->getData('sm_title');
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->getData('rg_title');
    }
    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getItem1image()
    {
        $image = $this->getData('item_f_image');
        $url = $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
        return $url;
    }
    public function getItem1Title() {
        return $this->getData('item_f_title');
    }
    public function getItem1Description() {
        return $this->getData('item_f_description');
    }
    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getItem2image()
    {
        $image = $this->getData('item_s_image');
        $url = $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
        return $url;
    }
    /**
     * @return string
     */
    public function getItem2Title() {
        return $this->getData('item_s_title');
    }
    /**
     * @return string
     */
    public function getItem2Description() {
        return $this->getData('item_s_description');
    }
    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getItem3image()
    {
        $image = $this->getData('item_t_image');
        $url = $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
        return $url;
    }
    /**
     * @return string
     */
    public function getItem3Title() {
        return $this->getData('item_t_title');
    }
    /**
     * @return string
     */
    public function getItem3Description() {
        return $this->getData('item_t_description');
    }

}
