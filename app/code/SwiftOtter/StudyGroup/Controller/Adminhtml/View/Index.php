<?php
namespace SwiftOtter\StudyGroup\Controller\Adminhtml\View;

use Magento\Backend\App\Action as BackendAppAction;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends BackendAppAction implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'SwiftOtter_StudyGroup::view_exported_orders';

    /** @var PageFactory */
    protected $resultPageFactory;

    /** @var DataPersistorInterface */
    private $dataPersistor;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->dataPersistor = $dataPersistor;
    }

    public function execute(): Page
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('SwiftOtter_StudyGroup::view_exported_orders'); // TODO: add this later
        $resultPage->addBreadcrumb(__('Sales'), __('Sales'));
        $resultPage->addBreadcrumb(__('Exported Orders'), __('Exported Orders'));
        $resultPage->getConfig()->getTitle()->prepend(__('Exported Orders'));

        $this->dataPersistor->clear('exported_orders');

        return $resultPage;
    }
}
