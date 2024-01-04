<?php

namespace Riverstone\ProductLabel\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Riverstone\ProductLabel\Model\ConditionData;
use Riverstone\ProductLabel\Model\ProductLabels;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;

class LabelHelper extends AbstractHelper
{
    public const MODULE_ENABLE = 'riverstone_product_label/general/enable';
    public const POSITION = 'riverstone_product_label/general/align';
    /**
     * @var ConditionData
     */
    private ConditionData $conditionData;
    /**
     * @var ProductLabels
     */
    private ProductLabels $productLabels;
    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * @param Context $context
     * @param ConditionData $conditionData
     * @param ProductLabels $productLabels
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Context               $context,
        ConditionData         $conditionData,
        ProductLabels         $productLabels,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->conditionData = $conditionData;
        $this->productLabels = $productLabels;
        $this->storeManager = $storeManager;
    }

    /**
     * Returns rule data
     *
     * @param mixed $product
     * @return array
     */
    public function getRuleCondition($product)
    {
        return $this->conditionData->getRuleData($product);
    }

    /**
     * Returns module status
     *
     * @return mixed
     */
    public function getModuleEnable()
    {
        return $this->scopeConfig->getValue(self::MODULE_ENABLE, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Returns label position
     *
     * @return mixed
     */
    public function getLabelPosition()
    {
        return $this->scopeConfig->getValue(self::POSITION, ScopeInterface::SCOPE_STORE);
    }

    /**
     * Returns label select
     *
     * @param int $labelId
     * @return mixed|null
     */
    public function getLabelSelect($labelId)
    {
        if ($labelId) {
            $this->productLabels->load($labelId);
            return $this->productLabels->getProductLabelSelect();
        }
        return null;
    }

    /**
     * Returns label text
     *
     * @param int $labelId
     * @return mixed|null
     */
    public function getLabelText($labelId)
    {
        if ($labelId) {
            $this->productLabels->load($labelId);
            return $this->productLabels->getLabelName();
        }
        return null;
    }

    /**
     * Returns background color
     *
     * @param int $labelId
     * @return mixed|null
     */
    public function getLabelBackgroundColor($labelId)
    {
        if ($labelId) {
            $this->productLabels->load($labelId);
            return $this->productLabels->getBackgroundColor();
        }
        return null;
    }

    /**
     * Returns text color
     *
     * @param int $labelId
     * @return mixed|null
     */
    public function getLabelTextColor($labelId)
    {
        if ($labelId) {
            $this->productLabels->load($labelId);
            return $this->productLabels->getTextColor();
        }
        return null;
    }

    /**
     * Returns shape
     *
     * @param int $labelId
     * @return mixed|null
     */
    public function getLabelShape($labelId)
    {
        if ($labelId) {
            $this->productLabels->load($labelId);
            return $this->productLabels->getShape();
        }
        return null;
    }

    /**
     * Returns label image
     *
     * @param int $labelId
     * @return mixed|null
     */
    public function getLabelImage($labelId)
    {
        if ($labelId) {
            $this->productLabels->load($labelId);
            return $this->productLabels->getImage();
        }
        return null;
    }
}
