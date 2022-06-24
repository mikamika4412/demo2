<?php

namespace Mika\HelloWorld\Api;

interface ItemSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \Mika\HelloWorld\Api\Data\ItemInterface[]
     */
    public function getItems();

    /**
     * @param \Mika\HelloWorld\Api\Data\ItemInterface[]
     * @return void
     */
    public function setItems(array $items);
}
