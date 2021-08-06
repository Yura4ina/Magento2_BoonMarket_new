<?php

namespace BoonMarket\WhatFreshWidget\Block\Widget;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class WhatFreshBlock extends Template implements BlockInterface {

    const  DEFAULT_TEMPLATE = "widget/what_fresh.phtml";

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
    public function getSectionTitle() {
        return $this->getData('sec_title');
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getBigImageFirst() {
        $image = $this->getData('big_image_f');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     */
    public function getTagFirst(): string
    {
        return $this->getData('tag_text_f');
    }

    /**
     * @return string
     */
    public function getTitleFirst(): string
    {
        return $this->getData('rg_title_f');
    }

    /**
     * @return string
     */
    public function getDescriptionFirst(): string
    {
        return $this->getData('description_f');
    }

    /**
     * @return string
     */
    public function getButtonShopNowTextFirst(): string
    {
        return $this->getData('shop_now_text_f');
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getBigImageSecond(): string
    {
        $image = $this->getData('big_image_s');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     */
    public function getTagSecond(): string
    {
        return $this->getData('tag_text_s');
    }

    /**
     * @return string
     */
    public function getTitleSecond(): string
    {
        return $this->getData('rg_title_s');
    }

    /**
     * @return string
     */
    public function getDescriptionSecond(): string
    {
        return $this->getData('description_s');
    }

    /**
     * @return string
     */
    public function getButtonShopNowTextSecond(): string
    {
        return $this->getData('shop_now_text_s');
    }

    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getBigImageThird(): string
    {
        $image = $this->getData('big_image_t');
        return $this->_storeManager->getStore()->getBaseUrl(
                UrlInterface::URL_TYPE_MEDIA
            ) . $image;
    }

    /**
     * @return string
     */
    public function getTagThird(): string
    {
        return $this->getData('tag_text_t');
    }

    /**
     * @return string
     */
    public function getTitleThird(): string
    {
        return $this->getData('rg_title_t');
    }

    /**
     * @return string
     */
    public function getDescriptionThird(): string
    {
        return $this->getData('description_t');
    }

    /**
     * @return string
     */
    public function getButtonShopNowTextThird(): string
    {
        return $this->getData('shop_now_text_t');
    }

}
