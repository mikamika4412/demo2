<?php

namespace Mika\HelloWorld\Console\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mika\HelloWorld\Model\ItemFactory;
use Magento\Framework\Console\Cli;


class AddItem extends Command
{
    const INPUT_KEY_NEWS = 'news';
    const INPUT_KEY_COMMENT = 'comment';
    const INPUT_KEY_VALUE = 'value';

    private $itemFactory;

    public function __construct(ItemFactory $itemFactory)
    {
        $this->itemFactory = $itemFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('mika:item:add')
            ->addArgument(
                self::INPUT_KEY_NEWS,
                InputArgument::REQUIRED,
                'ItemName'
            )->addArgument(
                self::INPUT_KEY_COMMENT,
                InputArgument::OPTIONAL,
                'Comment'
            )->addArgument(
                self::INPUT_KEY_VALUE,
                InputArgument::OPTIONAL,
                'ItemValue'
            );
                 parent::configure();
     }
     protected function execute(InputInterface $input, OutputInterface $output)
     {
          $item = $this->itemFactory->create();
         $item->setNews($input->getArgument(self::INPUT_KEY_NEWS));
         $item->setComment($input->getArgument(self::INPUT_KEY_COMMENT));
         $item->setValue($input->getArgument(self::INPUT_KEY_VALUE));
         $item->setIsObjectNew(true);
         $item->save();
         return Cli::RETURN_SUCCESS;
     }
}

