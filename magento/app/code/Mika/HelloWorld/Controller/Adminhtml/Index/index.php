<?php
declare(strict_types=1);
namespace Mika\HelloWorld\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function execute()
    {
//        echo 'Hello Admins!!!';
//        return $this->resultFactory->create($this->resultFactory::TYPE_PAGE);
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents('Hello Admins');
        return $result;
    }
}
