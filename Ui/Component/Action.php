<?php

namespace Riverstone\ProductLabel\Ui\Component;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class Action extends Column
{
    /** Url  */
    public const ROW_EDIT_URL = 'river_product_label/actions/edit';
    /** @var UrlInterface */
    protected $urlBuilder;
    /**
     * @var string
     */
    private $editUrl;
    /**
     * @param ContextInterface   $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface       $urlBuilder
     * @param array              $components
     * @param array              $data
     * @param string             $editUrl
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = [],
        $editUrl = self::ROW_EDIT_URL
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
    /**
     * Prepare Data Source.
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['label_id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(
                            $this->editUrl,
                            ['id' => $item['label_id']]
                        ),
                        'label' => __('Edit'),
                    ];
                }
            }
        }
        return $dataSource;
    }
}
