<?php

namespace Riverstone\ProductLabel\Block\Adminhtml\Actions;

use Magento\Backend\Block\Widget\Context;
use Magento\Cms\Api\PageRepositoryInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Delete extends Generic implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @param Context $context
     * @param PageRepositoryInterface $pageRepository
     */
    public function __construct(Context $context, PageRepositoryInterface $pageRepository)
    {
        $this->context = $context;
        parent::__construct($context, $pageRepository);
    }

    /**
     * Button data
     *
     * @return array
     */
    public function getButtonData()
    {
        $data = [];
        $labelId = $this->context->getRequest()->getParam('id');
        if ($labelId) {
            $data = ['label' => __('Delete'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\'' . __('Are you sure you want to delete this?') . '\',
                 \'' . $this->getDeleteUrl() . '\')',
                'sort_order' => 20,
            ];
        }
        return $data;
    }

    /**
     * Returns delete url
     *
     * @return string
     */
    public function getDeleteUrl()
    {
        $labelId = $this->context->getRequest()->getParam('id');
        return $this->getUrl('*/*/delete', ['id' => $labelId]);
    }
}
