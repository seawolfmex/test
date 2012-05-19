
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- test_catalog
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `test_catalog`;


CREATE TABLE `test_catalog`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `test_catalog_U_1` (`name`)
)Engine=InnoDB;

#-----------------------------------------------------------------------------
#-- test_product
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `test_product`;


CREATE TABLE `test_product`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`catalog_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `test_product_FI_1` (`catalog_id`),
	CONSTRAINT `test_product_FK_1`
		FOREIGN KEY (`catalog_id`)
		REFERENCES `test_catalog` (`id`)
		ON DELETE CASCADE
)Engine=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
