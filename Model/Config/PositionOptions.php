<?php

namespace Riverstone\ProductLabel\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;

class PositionOptions implements OptionSourceInterface
{

    /**
     * Options array
     *
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'vertical', 'label' => __('Vertical')],
            ['value' => 'horizontal', 'label' => __('Horizontal')]
        ];
    }
}
