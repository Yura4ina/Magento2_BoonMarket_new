<?php
namespace BoonMarket\PhotoGallerySec\Block\Widget;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class PhotoGallerySecBlock extends Template implements BlockInterface {

    const  DEFAULT_TEMPLATE = "widget/photo_gall.phtml";

    public function _construct() {
        if (!$this->hasData('template')) {
            $this->setData('template', self::DEFAULT_TEMPLATE);
        }

        return parent::_construct();
    }

    /**
     * @return string
     */
    public function getSecTitle(): string
    {
        return $this->getData('sec_title');
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage1(): string
    {
        $image = $this->getData('gall_image_1');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage2(): string
    {
        $image = $this->getData('gall_image_2');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage3(): string
    {
        $image = $this->getData('gall_image_3');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage4(): string
    {
        $image = $this->getData('gall_image_4');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage5(): string
    {
        $image = $this->getData('gall_image_5');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage6(): string
    {
        $image = $this->getData('gall_image_6');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage7(): string
    {
        $image = $this->getData('gall_image_7');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage8(): string
    {
        $image = $this->getData('gall_image_8');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage9(): string
    {
        $image = $this->getData('gall_image_9');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getImage10(): string
    {
        $image = $this->getData('gall_image_10');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

}
