<?php

namespace Mika\HelloWorld\Cron;

use Mika\HelloWorld\Model\Config;
use Mika\HelloWorld\Model\ItemFactory;

class AddItem
{
    /**
     * @var \Mika\HelloWorld\Model\ItemFactory
     */
    private $itemFactory;
    /**
     * @var
     */
    private $config;

    /**
     * @param \Mika\HelloWorld\Model\ItemFactory $itemFactory
     * @param \Mika\HelloWorld\Model\Config      $config
     */
    public function __construct(ItemFactory $itemFactory, Config $config)
    {
        $this->itemFactory = $itemFactory;
        $this->config = $config;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        if ($this->config->isEnabled())
        {
            $this->itemFactory->create()
                ->setNews('Scheduled item5'())
                ->setCommet('Created at' . time())
                ->save();
        }
    }
}

