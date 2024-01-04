<?php

namespace Riverstone\ProductLabel\Ui\Listing;

use Magento\Customer\Model\ResourceModel\Group\CollectionFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class CustomerGroup extends Column
{
    /**
     * @var CollectionFactory
     */
    protected $customerGroup;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param CollectionFactory $customerGroup
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Customer\Model\ResourceModel\Group\CollectionFactory $customerGroup,
        array $components = [],
        array $data = []
    ) {
        $this->customerGroup = $customerGroup;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Returns customer datasource
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $customerGroups = $this->getCustomerGroups();
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['customer_group'])) {
                    $data =[];
                    $customerGroup = json_decode($item['customer_group'], true);
                    foreach ($customerGroup as $customerGroupId) {
                        $data[] = $customerGroups[$customerGroupId];
                    }
                }
                $item[$this->getData('name')] = $data;
            }
        }

        return $dataSource;
    }

    /**
     * Returns customer group
     *
     * @return array
     */
    protected function getCustomerGroups()
    {
        $customerGroups = [];
        $groupCollection = $this->customerGroup->create();
        foreach ($groupCollection as $group) {
            $customerGroups[$group->getId()] = $group->getCustomerGroupCode();
        }
        return $customerGroups;
    }
}
