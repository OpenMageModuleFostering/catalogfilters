<?php
$installer = $this;
$installer->startSetup();
$table = Mage::getSingleton('core/resource')->getTableName('catalogfilters/catalogfilters');
$installer->run("
DROP TABLE IF EXISTS `{$installer->getTable('catalogfilters')}`;
    CREATE TABLE `{$installer->getTable('catalogfilters')}`(
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `filter_attribute_code` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
INSERT INTO $table (`id`, `filter_attribute_code`) VALUES
	(1, '');
");

$installer->endSetup(); 