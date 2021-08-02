<?php
namespace BoonMarket\Sec6SlWidget\Block\Widget;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Sec6SlBlock extends Template implements BlockInterface {

    const  DEFAULT_TEMPLATE = "widget/sec6_sl.phtml";

    public function _construct() {
        if (!$this->hasData('template')) {
            $this->setData('template', self::DEFAULT_TEMPLATE);
        }

        return parent::_construct();
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getFirstSlImage(): string
    {
        $image = $this->getData('f_sl_image');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     */
    public function getFirstSlTitle(): string
    {
        return $this->getData('f_sl_title');
    }

    /**
     * @return string
     */
    public function getFirstSlDescription(): string
    {
        return $this->getData('f_sl_description');
    }

    /**
     * @return string
     */
    public function getFirstSlReadMore(): string
    {
        return $this->getData('f_sl_read_more');
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getSecondSlImage(): string
    {
        $image = $this->getData('s_sl_image');
        $url = $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
        return $url;
    }

    /**
     * @return string
     */
    public function getSecondSlTitle(): string
    {
        return $this->getData('s_sl_title');
    }

    /**
     * @return string
     */
    public function getSecondSlDescription(): string
    {
        return $this->getData('s_sl_description');
    }

    /**
     * @return string
     */
    public function getSecondSlReadMore(): string
    {
        return $this->getData('s_sl_read_more');
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getThirdSlImage(): string
    {
        $image = $this->getData('t_sl_image');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     */
    public function getThirdSlTitle(): string
    {
        return $this->getData('t_sl_title');
    }

    /**
     * @return string
     */
    public function getThirdSlDescription(): string
    {
        return $this->getData('t_sl_description');
    }

    /**
     * @return string
     */
    public function getThirdSlReadMore(): string
    {
        return $this->getData('t_sl_read_more');
    }
}
