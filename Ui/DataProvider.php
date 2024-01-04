<?php

namespace Riverstone\ProductLabel\Ui;

use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Riverstone\ProductLabel\Model\ProductLabels;
use Riverstone\ProductLabel\Model\ResourceModel\ProductLabels\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param ProductLabels $productLabels
     * @param RequestInterface $request
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        ProductLabels $productLabels,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        $this->request = $request;
        $this->productLabels = $productLabels;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $labelId = $this->request->getParam('id');
        if ($labelId) {
            $this->productLabels->load($labelId);
            $collections = $this->collection->getItems();
            foreach ($collections as $model) {

                $this->loadedData[$model->getId()] = $this->dataReturn($model);
            }
            return $this->loadedData;
        }
            return [];
    }

    /**
     * Prepares datasource
     *
     * @param mixed $label
     * @return array
     */
    public function dataReturn($label)
    {
        $data = [];

        $data['general']['id'] = $label->getId();
        $data['general']['title'] = $label->getName();
        $data['general']['priority'] = $label->getPriority();
        $data['general']['status'] = $label->getEnable();
        $data['general']['from_date'] = $label->getFromDate();
        $data['general']['to_date'] = $label->getToDate();
        $data['general']['store_id'] = json_decode($label->getStoreView(), true);
        $data['general']['customer_group_id'] = json_decode($label->getCustomerGroup(), true);

        $data['design']['product_label_select'] = $label->getProductLabelSelect();
        $data['design']['label_text'] = $label->getLabelName();
        $data['design']['background_color'] = $label->getBackgroundColor();
        $data['design']['text_color'] = $label->getTextColor();
        $data['design']['label_shape'] = $label->getShape();
        $data['design']['position'] = $label->getPosition();
        $data["design"]["image"][0]["url"] = $label->getImage();

        return $data;
    }
}
