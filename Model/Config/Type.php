<?php

namespace Riverstone\ProductLabel\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;

class Type implements OptionSourceInterface
{

    /**
     * Options array
     *
     * @return array[]
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'text', 'label' => __('Text')],
            ['value' => 'image', 'label' => __('Image')]
        ];
    }
}
