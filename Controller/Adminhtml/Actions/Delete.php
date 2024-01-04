<?php

namespace Riverstone\ProductLabel\Controller\Adminhtml\Actions;

use Exception;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Riverstone\ProductLabel\Model\ProductLabels;

class Delete extends Action
{

    /**
     * @var ProductLabels
     */
    private ProductLabels $productLabels;

    /**
     * @param Context $context
     * @param ProductLabels $productLabels
     */
    public function __construct(Context $context, ProductLabels $productLabels)
    {
        parent::__construct($context);
        $this->productLabels = $productLabels;
    }

    /**
     * Delete action
     *
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $labelId = $this->getRequest()->getParam('id');
        try {
            $collection = $this->productLabels->load($labelId);
            $collection->delete();
            $resultRedirect = $this->resultRedirectFactory->create();
            $this->getMessageManager()->addSuccessMessage('Rule deleted successfully');
            $resultRedirect->setPath('*/grid/index');
        } catch (Exception $e) {
            $this->getMessageManager()->addErrorMessage('Unable to delete the rule  ' . $e->getMessage());
            $resultRedirect->setPath('*/actions/edit', ['id' => $labelId]);

        }
        return $resultRedirect;
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
