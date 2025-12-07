UPDATE `inspirethemephp80_db`.`modules` SET `mod_showincms` = 'Y' WHERE (`mod_id` = '5');

UPDATE `inspirethemephp80_db`.`modules` SET `mod_showincms` = 'N' WHERE (`mod_id` = '13');


DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '764') and (`mod_id` = '13') and (`page_id` = '51');
DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '825') and (`mod_id` = '13') and (`page_id` = '61');
DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '1124') and (`mod_id` = '13') and (`page_id` = '8');
DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '1213') and (`mod_id` = '13') and (`page_id` = '1');

INSERT INTO `inspirethemephp80_db`.`module_templates` (`tmplmod_id`, `tmplmod_rank`, `tmpl_id`, `mod_id`) VALUES ('15', '27', '1', '13');

UPDATE `inspirethemephp80_db`.`modules` SET `mod_showincms` = 'N' WHERE (`mod_id` = '6');

DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '705') and (`mod_id` = '6') and (`page_id` = '10');
DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '745') and (`mod_id` = '6') and (`page_id` = '4');
DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '826') and (`mod_id` = '6') and (`page_id` = '61');
DELETE FROM `inspirethemephp80_db`.`module_pages` WHERE (`modpages_id` = '1214') and (`mod_id` = '6') and (`page_id` = '1');

INSERT INTO `inspirethemephp80_db`.`module_templates` (`tmplmod_id`, `tmplmod_rank`, `tmpl_id`, `mod_id`) VALUES ('16', '25', '1', '6');
