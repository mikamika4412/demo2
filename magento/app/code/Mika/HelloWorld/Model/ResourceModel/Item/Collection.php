<?php

namespace Mika\HelloWorld\Model\ResourceModel\Item;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mika\HelloWorld\Model\Item;
use Mika\HelloWorld\Model\ResourceModel\Item as ItemResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'news_id';

    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }
}
