<?php

namespace Riverstone\ProductLabel\Controller\Adminhtml\Actions;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Backend\Model\Session;
use Riverstone\ProductLabel\Model\ProductLabels;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{
    public const ADMIN_RESOURCE = 'Riverstone_ProductLabel::manage';

    /**
     * @var Context
     */
    private Context $context;

    /**
     * @param Context $context
     * @param ProductLabels $labelsFactory
     * @param PageFactory $resultFactory
     * @param Registry $registry
     */
    public function __construct(
        Context       $context,
        ProductLabels $labelsFactory,
        PageFactory   $resultFactory,
        Registry      $registry
    ) {
        parent::__construct($context);
        $this->labelsFactory = $labelsFactory;
        $this->resultFactory = $resultFactory;
        $this->registry = $registry;
        $this->context = $context;
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create();
        $labelId = $this->getRequest()->getParam('id');

        if ($labelId) {
            $this->labelsFactory->load($labelId);
            if (!$this->labelsFactory->getData('label_id')) {
                $this->messageManager->addError(__('This rule is no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
            $this->labelsFactory->getConditions()->setJsFormObject('riverstone_product_label_form');

        }

        $data=$this->labelsFactory->getData();

        if (!empty($data)) {
            $this->labelsFactory->setName($data['name']);
            $this->labelsFactory->setData($data);
        }

        $this->registry->register('Riverstone_ProductLabel', $this->labelsFactory);

      //  $resultPage = $this->initPage($resultPage);
        $resultPage->addBreadcrumb(
            $labelId ? __('Edit Rule') : __('New Rule'),
            $labelId ? __('Edit Rule') : __('New Rule')
        );
        $resultPage->getConfig()->getTitle()
            ->prepend($this->labelsFactory->
            getId() ? $this->labelsFactory->getName() : __('New Rule'));
        return $resultPage;
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
