<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ProductAlert\Controller\Unsubscribe;

use Magento\ProductAlert\Controller\Unsubscribe as UnsubscribeController;

class StockAll extends UnsubscribeController
{
    /**
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $this->_objectManager->create('Magento\ProductAlert\Model\Stock')
            ->deleteCustomer(
                $this->customerSession->getCustomerId(),
                $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface')
                    ->getStore()
                    ->getWebsiteId()
            );
        $this->messageManager->addSuccess(__('You will no longer receive stock alerts.'));

        return $this->getDefaultResult();
    }

    /**
     * {@inheritdoc}
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function getDefaultResult()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('customer/account/');
    }
}
