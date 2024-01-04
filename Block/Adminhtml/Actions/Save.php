<?php

namespace Riverstone\ProductLabel\Block\Adminhtml\Actions;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;

class Save extends Generic implements ButtonProviderInterface
{
    /**
     * Button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'onclick' => 'setLocation(\'' .$this->getUrl('*/*/save'). '\')',
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save', 'target' => '#riverstone_product_label_form']],
            ]
        ];
    }
}
