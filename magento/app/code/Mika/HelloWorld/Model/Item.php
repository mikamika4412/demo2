<?php

namespace Mika\HelloWorld\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Mika\HelloWorld\Api\Data\ItemInterface;

class Item extends AbstractModel implements ItemInterface
{

    protected function _construct()
    {
        $this->_init(\Mika\HelloWorld\Model\ResourceModel\Item::class);
    }

    public function getNews(): string
    {
        return $this->getData(ItemInterface::TYPE);
    }

    /**
     * @param string $news
     * @return void
     */
    public function setNews(string $news): void
    {
        $this->setData(ItemInterface::TYPE, $news);
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->_getData('news_id');
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setId($value)
    {
        $this->setData('news_id', $value);
        return $this;
    }
}
