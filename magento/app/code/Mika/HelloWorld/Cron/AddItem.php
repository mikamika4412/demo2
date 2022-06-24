<?php

namespace Mika\HelloWorld\Cron;

use Mika\HelloWorld\Model\ItemFactory;

class AddItem
{
    private $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
    }

    public function execute()
    {
        $this->itemFactory->create()
            ->setNews('Scheduled item5'())
            ->setCommet('Created at' . time())
//            ->setValue(date())
            ->save();
    }
}

