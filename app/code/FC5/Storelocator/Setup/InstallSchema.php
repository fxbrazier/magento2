<?php

namespace FC5\Storelocator\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        // Get table
        $tableName = $installer->getTable('fc5_store_locator');
        // Check if the table already exists
        if ($installer->getConnection()->isTableExists($tableName) != true) {
            // Create table
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Name'
                )
                ->addColumn(
                    'lat',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Latitude'
                )
                ->addColumn(
                    'lng',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Longitude'
                )
                ->addColumn(
                    'address',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => false, 'default' => ''],
                    'Address'
                )
                ->addColumn(
                    'address2',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => false, 'default' => ''],
                    'Address 2'
                )
                ->addColumn(
                    'city',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => false, 'default' => ''],
                    'City'
                )
                ->addColumn(
                    'state',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => false, 'default' => ''],
                    'State'
                )
                ->addColumn(
                    'zip_code',
                    Table::TYPE_INTEGER,
                    null,

                    ['nullable' => false, 'default' => '0'],
                    'Zip code'
                )
                ->addColumn(
                    'phone',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => false, 'default' => ''],
                    'Phone'
                )
                ->addColumn(
                    'web',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => false, 'default' => ''],
                    'Website'
                )
                ->addColumn(
                    'hour1',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => false, 'default' => ''],
                    'Hours 1'
                )
                ->addColumn(
                    'hour2',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => true, 'default' => ''],
                    'Hours 3'
                )
                ->addColumn(
                    'hour3',
                    Table::TYPE_TEXT,
                    null,

                    ['nullable' => true, 'default' => ''],
                    'Hours 3'
                )
                ->setComment('Store Locator Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }

        $installer->endSetup();
    }
}
