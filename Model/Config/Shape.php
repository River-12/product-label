<?php

namespace Riverstone\ProductLabel\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;

class Shape implements OptionSourceInterface
{

    /**
     * Options array
     *
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'rectangle', 'label' => __('Rectangule')],
            ['value' => 'oval', 'label' => __('Oval')]
        ];
    }
}
