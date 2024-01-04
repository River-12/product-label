<?php

namespace Riverstone\ProductLabel\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    /**
     * Options array
     *
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => '0', 'label' => __('Disabled')],
            ['value' => '1', 'label' => __('Enabled')]
        ];
    }
}
