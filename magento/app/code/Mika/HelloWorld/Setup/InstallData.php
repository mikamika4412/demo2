<?php
namespace Mika\HelloWorld\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

use Magento\Framework\DB\Ddl\Table;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('mika_news1'),
            [
                'name'=>'Item1'
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('mika_news1'),
            [
                'name'=>'Item2'
            ]
        );


        $setup->endSetup();
    }
}
