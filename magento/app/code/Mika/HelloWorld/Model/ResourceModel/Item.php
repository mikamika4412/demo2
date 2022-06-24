<?php

namespace Mika\HelloWorld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{

    protected function _construct()
    {
       $this->_init('mika_news', 'news_id');
    }


}
