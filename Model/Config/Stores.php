<?php

namespace Riverstone\ProductLabel\Model\Config;

use Magento\Framework\Escaper;
use Magento\Framework\Phrase;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Store\Model\System\Store as SystemStore;
use Magento\Store\Ui\Component\Listing\Column\Store;

class Stores extends Store
{
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param SystemStore $systemStore
     * @param Escaper $escaper
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        SystemStore        $systemStore,
        Escaper            $escaper,
        array              $components = [],
        array              $data = []
    ) {
        parent::__construct(
            $context,
            $uiComponentFactory,
            $systemStore,
            $escaper,
            $components,
            $data,
            'store_view'
        );
    }

    /**
     * Data source preparation
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')] = $this->prepareItem($item);
            }
        }
        return $dataSource;
    }

    /**
     * Item data preparation
     *
     * @param array $item
     * @return Phrase|string
     */
    protected function prepareItem(array $item)
    {
        $content = $origStores = '';
        if (!($item[$this->storeKey]=== null)) {
            $origStores = $item[$this->storeKey];
        }

        if (!is_array($origStores)) {
            $origStores = json_decode($origStores, true);
        }
        if (in_array(0, $origStores) && count($origStores) === 1) {
            return __('All Store Views');
        }

        $data = $this->systemStore->getStoresStructure(false, $origStores);

        foreach ($data as $website) {
            $content .= $website['label'] . "<br/>";
            foreach ($website['children'] as $group) {
                $content .= str_repeat('&nbsp;', 3) . $this->escaper->escapeHtml($group['label']) . "<br/>";
                foreach ($group['children'] as $store) {
                    $content .= str_repeat('&nbsp;', 6) . $this->escaper->escapeHtml($store['label']) . "<br/>";
                }
            }
        }

        return $content;
    }
}
