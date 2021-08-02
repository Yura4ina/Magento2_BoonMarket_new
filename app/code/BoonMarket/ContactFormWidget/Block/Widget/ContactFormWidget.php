<?php
namespace BoonMarket\ContactFormWidget\Block\Widget;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class ContactFormWidget extends Template implements BlockInterface {

    const  DEFAULT_TEMPLATE = "widget/contact_form_p.phtml";

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


}
