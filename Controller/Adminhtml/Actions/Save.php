<?php

namespace Riverstone\ProductLabel\Controller\Adminhtml\Actions;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Riverstone\ProductLabel\Model\ProductLabelsFactory;

class Save extends Action
{
    public const ADMIN_RESOURCE = 'Riverstone_ProductLabel::manage';
    /**
     * @var ProductLabelsFactory
     */
    private ProductLabelsFactory $labelsFactory;

    /**
     * @param Context $context
     * @param ProductLabelsFactory $labelsFactory
     */
    public function __construct(Context $context, ProductLabelsFactory $labelsFactory)
    {
        parent::__construct($context);
        $this->labelsFactory = $labelsFactory;
    }

    /**
     * Executes save action
     *
     * @return ResponseInterface|Redirect|ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $this->save();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/grid/index');
        return $resultRedirect;
    }

    /**
     * Saves data
     *
     * @return void
     * @throws \Exception
     */
    public function save()
    {
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $label = $this->labelsFactory->create();
            if (isset($data['general']['id'])) {
                $label->load($data['general']['id']);
            }
            $label->setName($data['general']['title']);
            $label->setPriority($data['general']['priority']);
            $label->setEnable($data['general']['status']);
            $label->setFromDate($data['general']['from_date']);
            $label->setToDate($data['general']['to_date']);
            $label->setStoreView(json_encode($data['general']['store_id']));
            $label->setCustomerGroup(json_encode($data['general']['customer_group_id']));
            $label->setProductLabelSelect($data['design']['product_label_select']);
            $label->setLabelName($data['design']['label_text']);
            $label->setBackgroundColor($data['design']['background_color']);
            $label->setTextColor($data['design']['text_color']);
            $label->setShape($data['design']['label_shape']);
            if (isset($data["design"]["image"][0]["url"])) {
                $label->setImage($data["design"]["image"][0]["url"]);
            }
            if (isset($data['rule']['conditions'])) {
                $data['conditions'] = $data['rule']['conditions'];
                unset($data['rule']);
                $data['condition'] = json_encode($data['conditions']);
            }
            $label->loadPost($data);

            $label->save();
        }
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
