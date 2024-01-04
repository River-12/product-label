<?php

namespace Riverstone\ProductLabel\Block\Adminhtml\Actions;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Reset implements ButtonProviderInterface
{
    /**
     * Button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return ['label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30,
        ];
    }
}
