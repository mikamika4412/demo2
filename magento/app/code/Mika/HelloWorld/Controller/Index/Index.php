<?php
declare(strict_types=1);

namespace Mika\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
//        echo 'Hello World';
//        return $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
//        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
//        $result->setContents('Hello World');
//        return $result;
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
//        $resultPage->getConfig()->getTitle()->prepend(__('Product Types'));

    }
}
