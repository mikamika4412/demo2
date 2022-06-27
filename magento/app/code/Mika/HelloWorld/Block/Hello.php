<?php

namespace Mika\HelloWorld\Block;

use Magento\Framework\View\Element\Template;
use Mika\HelloWorld\Model\ResourceModel\Item\Collection;
use Mika\HelloWorld\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    /**
     * @var \Mika\HelloWorld\Model\ResourceModel\Item\CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context            $context
     * @param \Mika\HelloWorld\Model\ResourceModel\Item\CollectionFactory $collectionFactory
     * @param array                                                       $data
     */
    public function __construct(Template\Context  $context,
                                CollectionFactory $collectionFactory,
                                array             $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Framework\DataObject[]
     */
    public function getItems()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
