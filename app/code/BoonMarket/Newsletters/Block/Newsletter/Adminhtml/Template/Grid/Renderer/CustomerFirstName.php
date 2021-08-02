<?php

namespace BoonMarket\Newsletters\Block\Newsletter\Adminhtml\Template\Grid\Renderer;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;

class CustomerFirstName extends AbstractRenderer
{
    public function render(DataObject $row)
    {
        $first = $row->getData('type');
        $sec = $row->getData('c_firstname');
        $third = $row->getData();
        if ($row->getData('type') == 1) {
            return ($row->getData('c_firstname') != '' ? $row->getData('c_firstname') : '----1');
        } else {
            return ($row->getData('firstname') != '' ? $row->getData('firstname') : '----2');
        }
    }
}
