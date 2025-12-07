ALTER TABLE `inspirethemephp80_db`.`general_settings` 
ADD COLUMN `fcontact_btntext` VARCHAR(45) NULL DEFAULT NULL AFTER `fcontact_imp_page`,
ADD COLUMN `fcontact_btnurl` VARCHAR(255) NULL DEFAULT NULL AFTER `fcontact_btntext`;
