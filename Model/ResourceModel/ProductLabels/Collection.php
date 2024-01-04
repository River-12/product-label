<?php

namespace Riverstone\ProductLabel\Model\ResourceModel\ProductLabels;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Riverstone\ProductLabel\Model\ProductLabels as Model;
use Riverstone\ProductLabel\Model\ResourceModel\ProductLabels as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * Construct
     *
     * @return void
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
