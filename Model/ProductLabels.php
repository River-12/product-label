<?php

namespace Riverstone\ProductLabel\Model;

use Magento\CatalogRule\Model\Rule\Condition\CombineFactory;
use Magento\Framework\Api\AttributeValueFactory;
use Magento\Framework\Api\ExtensionAttributesFactory;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Rule\Model\AbstractModel;
use Riverstone\ProductLabel\Api\Data\LabelDataInterface;
use Riverstone\ProductLabel\Model\ResourceModel\ProductLabels as ResourceModel;

class ProductLabels extends AbstractModel implements LabelDataInterface
{
    /**
     * @var CombineFactory
     */
    private CombineFactory $combineFactory;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param TimezoneInterface $localeDate
     * @param CombineFactory $combineFactory
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     * @param ExtensionAttributesFactory|null $extensionFactory
     * @param AttributeValueFactory|null $attributeFactory
     * @param Json|null $serializer
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        Context                    $context,
        Registry                   $registry,
        FormFactory                $formFactory,
        TimezoneInterface          $localeDate,
        CombineFactory             $combineFactory,
        AbstractResource           $resource = null,
        AbstractDb                 $resourceCollection = null,
        array                      $data = [],
        ExtensionAttributesFactory $extensionFactory = null,
        AttributeValueFactory      $attributeFactory = null,
        Json                       $serializer = null
    ) {
        parent::__construct(
            $context,
            $registry,
            $formFactory,
            $localeDate,
            $resource,
            $resourceCollection,
            $data,
            $extensionFactory,
            $attributeFactory,
            $serializer
        );
        $this->combineFactory = $combineFactory;
    }
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(LabelDataInterface::NAME);
    }

    /**
     * @inheritDoc
     */
    public function getConditionsFieldSetId($formName)
    {
        return $formName . 'rule_conditions_fieldset_' . $this->getId();
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->getData(LabelDataInterface::ID);
    }

    /**
     * @inheritDoc
     */
    public function getEnable()
    {
        return $this->getData(LabelDataInterface::ENABLE);
    }

    /**
     * @inheritDoc
     */
    public function getStoreView()
    {
        return $this->getData(LabelDataInterface::STOREVIEW);
    }

    /**
     * @inheritDoc
     */
    public function getCustomerGroup()
    {
        return $this->getData(LabelDataInterface::CUSTOMERGRUOP);
    }

    /**
     * @inheritDoc
     */
    public function getFromDate()
    {
        return $this->getData(LabelDataInterface::FROMDATE);
    }

    /**
     * @inheritDoc
     */
    public function getToDate()
    {
        return $this->getData(LabelDataInterface::TODATE);
    }

    /**
     * @inheritDoc
     */
    public function getPriority()
    {
        return $this->getData(LabelDataInterface::PROIORITY);
    }

    /**
     * @inheritDoc
     */
    public function getImage()
    {
        return $this->getData(LabelDataInterface::IMAGE);
    }

    /**
     * @inheritDoc
     */
    public function getLabelName()
    {
        return $this->getData(LabelDataInterface::LABELNAME);
    }

    /**
     * @inheritDoc
     */
    public function getTextColor()
    {
        return $this->getData(LabelDataInterface::TEXTCOLOR);
    }

    /**
     * @inheritDoc
     */
    public function getBackgroundColor()
    {
        return $this->getData(LabelDataInterface::BACKGROUNDCOLOR);
    }

    /**
     * @inheritDoc
     */
    public function getShape()
    {
        return $this->getData(LabelDataInterface::SHAPE);
    }

    /**
     * @inheritDoc
     */
    public function getPosition()
    {
        return $this->getData(LabelDataInterface::POSITION);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(LabelDataInterface::CREATEDAT);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(LabelDataInterface::UPDATEDAT);
    }

    /**
     * @inheritDoc
     */
    public function setId($labelId)
    {
        return $this->setData(LabelDataInterface::ID, $labelId);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(LabelDataInterface::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function setEnable($status)
    {
        return $this->setData(LabelDataInterface::ENABLE, $status);
    }

    /**
     * @inheritDoc
     */
    public function setStoreView($storeview)
    {
        return $this->setData(LabelDataInterface::STOREVIEW, $storeview);
    }

    /**
     * @inheritDoc
     */
    public function setCustomerGroup($group)
    {
        return $this->setData(LabelDataInterface::CUSTOMERGRUOP, $group);
    }

    /**
     * @inheritDoc
     */
    public function setFromDate($from)
    {
        return $this->setData(LabelDataInterface::FROMDATE, $from);
    }

    /**
     * @inheritDoc
     */
    public function setToDate($toDate)
    {
        return $this->setData(LabelDataInterface::TODATE, $toDate);
    }

    /**
     * @inheritDoc
     */
    public function setPriority($priority)
    {
        return $this->setData(LabelDataInterface::PROIORITY, $priority);
    }

    /**
     * @inheritDoc
     */
    public function setImage($image)
    {
        return $this->setData(LabelDataInterface::IMAGE, $image);
    }

    /**
     * @inheritDoc
     */
    public function setLabelName($labelName)
    {
        return $this->setData(LabelDataInterface::LABELNAME, $labelName);
    }

    /**
     * @inheritDoc
     */
    public function setTextColor($textColor)
    {
        return $this->setData(LabelDataInterface::TEXTCOLOR, $textColor);
    }

    /**
     * @inheritDoc
     */
    public function setBackgroundColor($bgColor)
    {
        return $this->setData(LabelDataInterface::BACKGROUNDCOLOR, $bgColor);
    }

    /**
     * @inheritDoc
     */
    public function setShape($shape)
    {
        return $this->setData(LabelDataInterface::SHAPE, $shape);
    }

    /**
     * @inheritDoc
     */
    public function setPosition($position)
    {
        return $this->setData(LabelDataInterface::POSITION, $position);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($created)
    {
        return $this->setData(LabelDataInterface::CREATEDAT, $created);
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updated)
    {
        return $this->setData(LabelDataInterface::UPDATEDAT, $updated);
    }

    /**
     * @inheritDoc
     */
    public function getProductLabelSelect()
    {
        return $this->getData(LabelDataInterface::PRODUCT_LABEL_SELECT);
    }

    /**
     * @inheritDoc
     */
    public function setProductLabelSelect($select)
    {
        return $this->setData(LabelDataInterface::PRODUCT_LABEL_SELECT, $select);
    }

    /**
     * @inheritDoc
     */
    public function getConditionsInstance()
    {
        return $this->combineFactory->create();
    }

    /**
     * @inheritDoc
     */
    public function getActionsInstance()
    {
        return $this->combineFactory->create();
    }

    /**
     * @inheritDoc
     */
    public function getConditionsSerialized()
    {
        return $this->getData(LabelDataInterface::CONDITIONS);
    }

    /**
     * @inheritDoc
     */
    public function setConditionsSerialized($conditions)
    {
        return $this->setData(LabelDataInterface::CONDITIONS, $conditions);
    }

    /**
     * Construct
     *
     * @return void
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
