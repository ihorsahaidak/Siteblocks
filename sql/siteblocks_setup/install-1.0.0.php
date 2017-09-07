<?php
/**
 * @var Mage_Core_Model_Resource_Setup $installer
 */
$installer = $this;
$installer->srartSetup();
$installer->run("
CREATE TABLE `{$this->getTable()}` (
  `block_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `content` text,
  `block_status` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();