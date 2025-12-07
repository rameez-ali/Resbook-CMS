ALTER TABLE `inspirethemephp80_db`.`accommodation` 
ADD COLUMN `show_poa` ENUM('Y', 'N') NULL DEFAULT 'N' AFTER `room_resbook_id`;


ALTER TABLE `inspirethemephp80_db`.`page_meta_data` 
ADD COLUMN `prefilter_catid` INT(11) NULL DEFAULT NULL AFTER `slideshow_page_id`,
ADD COLUMN `prefilter_catname` VARCHAR(45) NULL DEFAULT NULL AFTER `prefilter_catid`;
