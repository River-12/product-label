<?php

namespace Riverstone\ProductLabel\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ProductLabels extends AbstractDb
{
    /**
     * Construct
     *
     * @return void
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init('riverstone_product_labels', 'label_id');
    }
}
