<?php

namespace Mika\HelloWorld\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Mika\HelloWorld\Model\ResourceModel\Item::class);
    }
}
