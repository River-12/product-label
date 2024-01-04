<?php

namespace Riverstone\ProductLabel\Block\Adminhtml\Actions;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Back extends Generic implements ButtonProviderInterface
{
    /**
     * Button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return ['label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10,
        ];
    }

    /**
     * Returns back url
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/grid/index');
    }
}
