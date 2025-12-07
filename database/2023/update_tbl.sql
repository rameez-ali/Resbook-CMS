ALTER TABLE `inspirethemephp80_db`.`cms_blacklist_user` 
CHANGE COLUMN `failed_hour_count` `failed_hour_count` INT NULL DEFAULT NULL ,
CHANGE COLUMN `total_failed_attempt` `total_failed_attempt` INT NULL DEFAULT NULL ;


ALTER TABLE `inspirethemephp80_db`.`cms_blacklist_user` 
CHANGE COLUMN `failed_hour_count` `failed_hour_count` INT NOT NULL DEFAULT '0' ;