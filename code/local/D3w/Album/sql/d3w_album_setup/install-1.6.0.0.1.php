<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();
/* @var $table Varien_Db_Ddl_Table */
$photo = $installer->getConnection()->newTable($installer->getTable('d3w_album/photo'))
	->addColumn('photo_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary' => true
	), 'News photo id')
	->addColumn('photo_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true
	), 'Photo name')
    ->addColumn('photo_img', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => true
    ), 'Name of image file')
    ->addColumn('time_created', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => true,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ), 'Time of photo creation')
	->addIndex($installer->getIdxName($installer->getTable('d3w_album/photo'),
	array('time_created'),
	Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX),
	array('time_created'),
	array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
	)
	->setComment('News photo');

$installer->getConnection()->createTable($photo);


/* @var $table Varien_Db_Ddl_Table */
$comment = $installer->getConnection()->newTable($installer->getTable('d3w_album/comment'))
    ->addColumn('comment_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'identity' => true,
        'nullable' => false,
        'primary' => true
    ), 'News comment id')
    ->addColumn('photo_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'nullable' => false
    ), 'References photo_id')
    ->addColumn('username', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => true
    ), 'Photo name')
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        'nullable' => true
    ), 'Comment text')
    ->addColumn('time_created', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable' => true,
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ), 'Time of comment creation')
    ->addIndex($installer->getIdxName($installer->getTable('d3w_album/comment'),
        array('time_created'),
        Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX),
        array('time_created'),
        array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
    )
    ->setComment('News comment');


$installer->getConnection()->createTable($comment);


$installer
    ->getConnection()
    ->addConstraint(
        'FK_ITEMS_RELATION_ITEM',
        $installer->getTable('d3w_album/comment'),
        'photo_id',
        $installer->getTable('d3w_album/photo'),
        'photo_id',
        'cascade',
        'cascade'
    );

$installer->endSetup();