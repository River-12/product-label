<?php

namespace Riverstone\ProductLabel\Controller\Adminhtml\Actions;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Forward;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Riverstone\ProductLabel\Model\ProductLabels as Model;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\View\Result\PageFactory;

class AddLabel extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    public const ADMIN_RESOURCE = 'Riverstone_ProductLabel::manage';
    /**
     * @var Registry
     */
    private Registry $coreRegistry;
    /**
     * @var Model
     */
    private Model $model;
    /**
     * @var ForwardFactory
     */
    private ForwardFactory $forwardFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Registry $coreRegistry
     * @param Model $model
     * @param ForwardFactory $forwardFactory
     */
    public function __construct(
        Context        $context,
        PageFactory    $resultPageFactory,
        Registry       $coreRegistry,
        Model          $model,
        ForwardFactory $forwardFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $coreRegistry;
        $this->model = $model;
        $this->forwardFactory = $forwardFactory;
    }

    /**
     * Redirects to new label page
     *
     * @return Forward|ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $resultForward = $this->forwardFactory->create();
        return $resultForward->forward('edit');
    }

    /**
     * Resource allow
     *
     * @return bool
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
