<?php

namespace Riverstone\ProductLabel\Model;

use Magento\Customer\Model\Session;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Riverstone\ProductLabel\Model\ResourceModel\ProductLabels\CollectionFactory;

class ConditionData
{
    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;
    /**
     * @var ProductLabels
     */
    private ProductLabels $productLabels;
    /**
     * @var ProductLabelsFactory
     */
    private ProductLabelsFactory $labelsFactory;
    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;
    /**
     * @var Session
     */
    private Session $customerSesion;

    /**
     * @param CollectionFactory $collectionFactory
     * @param ProductLabels $productLabels
     * @param ProductLabelsFactory $labelsFactory
     * @param StoreManagerInterface $storeManager
     * @param Session $customerSesion
     */
    public function __construct(
        CollectionFactory     $collectionFactory,
        ProductLabels         $productLabels,
        ProductLabelsFactory  $labelsFactory,
        StoreManagerInterface $storeManager,
        Session               $customerSesion,
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->productLabels = $productLabels;
        $this->labelsFactory = $labelsFactory;
        $this->storeManager = $storeManager;
        $this->customerSesion = $customerSesion;
    }

    /**
     * Returns rule data
     *
     * @param mixed $product
     * @return array
     * @throws NoSuchEntityException
     */
    public function getRuleData($product)
    {

        $labelId = [];
        $storeId = $this->storeManager->getStore()->getId();
        $customerGroupId = $this->customerSesion->getCustomer()->getGroupId();

        $collections = $this->collectionFactory->create()
            ->addFieldToSelect('*')
            ->addFieldToFilter('from_date', ['lteq' => date("Y-m-d H:i:s")])
            ->addFieldToFilter('to_date', [['null' => true], ['gteq' => date("Y-m-d H:i:s")]])
            ->addFieldToFilter('enable', ['eq' => 1])->setOrder('priority', 'asc');

        foreach ($collections as $label) {
            $productId = [];
            $productId[] = $label->getConditionsSerialized() ?
                $this->getProdId($product, $label) :
                $label->getConditionsSerialized();

            if (!(empty($productId)) && in_array($product->getId(), $productId)) {
                $storeView = json_decode($label->getStoreView(), true);
                if ((in_array(0, $storeView) || in_array($storeId, $storeView)) &&
                    in_array($customerGroupId, json_decode($label->getCustomerGroup(), true))) {
                    $labelId[] = $label->getId();
                }
            }
        }
        return $labelId;
    }

    /**
     * Get product id
     *
     * @param mixed $product
     * @param mixed $label
     * @return array
     */
    public function getProdId($product, $label)
    {
        $productId = null;
        if ($label->getConditions()->validate($product)) {
            $productId = $product->getId();
            $product->getId();
        }
        return $productId;
    }
}
