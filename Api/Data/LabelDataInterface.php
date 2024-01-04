<?php

namespace Riverstone\ProductLabel\Api\Data;

interface LabelDataInterface
{
    public const ID = 'label_id';
    public const NAME = 'name';
    public const ENABLE = 'enable';
    public const STOREVIEW = 'store_view';
    public const CUSTOMERGRUOP = 'customer_group';
    public const FROMDATE = 'from_date';
    public const TODATE = 'to_date';
    public const PROIORITY = 'priority';
    public const IMAGE = 'image';
    public const LABELNAME = 'label_name';
    public const TEXTCOLOR = 'text_color';
    public const BACKGROUNDCOLOR = 'background_color';
    public const SHAPE = 'shape';
    public const POSITION = 'position';
    public const CREATEDAT = 'created_at';
    public const UPDATEDAT = 'updated_at';
    public const PRODUCT_LABEL_SELECT = 'product_label_select';
    public const CONDITIONS = 'conditions_serialized';

    /**
     * Returns id
     *
     * @return mixed
     */
    public function getId();

    /**
     * Returns condition data
     *
     * @return mixed
     */
    public function getConditionsSerialized();

    /**
     * Returns name
     *
     * @return mixed
     */
    public function getName();

    /**
     * Returns status
     *
     * @return mixed
     */
    public function getEnable();

    /**
     * Returns store details
     *
     * @return mixed
     */
    public function getStoreView();

    /**
     * Returns customer group details
     *
     * @return mixed
     */
    public function getCustomerGroup();

    /**
     * Returns from date
     *
     * @return mixed
     */
    public function getFromDate();

    /**
     * Returns to date
     *
     * @return mixed
     */
    public function getToDate();

    /**
     * Returns priority
     *
     * @return mixed
     */
    public function getPriority();

    /**
     * Returns image url
     *
     * @return mixed
     */
    public function getImage();

    /**
     * Returns label name
     *
     * @return mixed
     */
    public function getLabelName();

    /**
     * Returns text color
     *
     * @return mixed
     */
    public function getTextColor();

    /**
     * Returns background color
     *
     * @return mixed
     */
    public function getBackgroundColor();

    /**
     * Returns shape details
     *
     * @return mixed
     */
    public function getShape();

    /**
     * Returns position
     *
     * @return mixed
     */
    public function getPosition();

    /**
     * Returns created date
     *
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * Returns updated date
     *
     * @return mixed
     */
    public function getUpdatedAt();

    /**
     * Returns product select
     *
     * @return mixed
     */
    public function getProductLabelSelect();

    /**
     * Sets id
     *
     * @param int $labelId
     * @return mixed
     */
    public function setId($labelId);

    /**
     * Sets name
     *
     * @param string $name
     * @return mixed
     */
    public function setName($name);

    /**
     * Sets status
     *
     * @param mixed $status
     * @return mixed
     */
    public function setEnable($status);

    /**
     * Sets store data
     *
     * @param mixed $storeview
     * @return mixed
     */
    public function setStoreView($storeview);

    /**
     * Sets customer group
     *
     * @param mixed $group
     * @return mixed
     */
    public function setCustomerGroup($group);

    /**
     * Sets from date
     *
     * @param mixed $from
     * @return mixed
     */
    public function setFromDate($from);

    /**
     * Sets to date
     *
     * @param mixed $toDate
     * @return mixed
     */
    public function setToDate($toDate);

    /**
     * Sets priority data
     *
     * @param mixed $priority
     * @return mixed
     */
    public function setPriority($priority);

    /**
     * Sets image url
     *
     * @param mixed $image
     * @return mixed
     */
    public function setImage($image);

    /**
     * Sets label name
     *
     * @param mixed $labelName
     * @return mixed
     */
    public function setLabelName($labelName);

    /**
     * Sets text color
     *
     * @param mixed $textColor
     * @return mixed
     */
    public function setTextColor($textColor);

    /**
     * Sets back ground color
     *
     * @param mixed $bgColor
     * @return mixed
     */
    public function setBackgroundColor($bgColor);

    /**
     * Sets shape
     *
     * @param mixed $shape
     * @return mixed
     */
    public function setShape($shape);

    /**
     * Sets position
     *
     * @param mixed $position
     * @return mixed
     */
    public function setPosition($position);

    /**
     * Sets created time
     *
     * @param mixed $created
     * @return mixed
     */
    public function setCreatedAt($created);

    /**
     * Sets updated time
     *
     * @param mixed $updated
     * @return mixed
     */
    public function setUpdatedAt($updated);

    /**
     * Sets product select
     *
     * @param mixed $select
     * @return mixed
     */
    public function setProductLabelSelect($select);

    /**
     * Sets condition data
     *
     * @param mixed $conditions
     * @return mixed
     */
    public function setConditionsSerialized($conditions);
}
