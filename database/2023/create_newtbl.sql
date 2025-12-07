CREATE TABLE `highlight_style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `thumb_path` varchar(255) DEFAULT NULL,
  `is_default` enum('Y','N') DEFAULT 'N',
  `status` enum('A','D','H') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `page_highlight_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `highlight_style_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_key` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `buttontext` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `page_has_highlight` (
  `item_key` varchar(50) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `highlight_id` int(11) DEFAULT NULL,
  `rank` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `page_meta_data`
ADD COLUMN `features` TEXT NULL AFTER `external_url`;

ALTER TABLE `page_meta_data`
ADD COLUMN `cta_bunner_title` VARCHAR(255) NULL AFTER `features`,
ADD COLUMN `cta_bunner_description` VARCHAR(255) NULL AFTER `cta_bunner_title`,
ADD COLUMN `cta_bunner_primary_internal_url` VARCHAR(255) NULL AFTER `cta_bunner_description`,
ADD COLUMN `cta_bunner_primary_external_url` VARCHAR(255) NULL AFTER `cta_bunner_primary_internal_url`,
ADD COLUMN `cta_bunner_primary_button_text` VARCHAR(45) NULL AFTER `cta_bunner_primary_external_url`,
ADD COLUMN `cta_bunner_secondary_internal_url` VARCHAR(255) NULL AFTER `cta_bunner_primary_button_text`,
ADD COLUMN `cta_bunner_secondary_external_url` VARCHAR(255) NULL AFTER `cta_bunner_secondary_internal_url`,
ADD COLUMN `cta_bunner_secondary_button_text` VARCHAR(45) NULL AFTER `cta_bunner_secondary_external_url`;

ALTER TABLE `experience`
ADD COLUMN `price_description` VARCHAR(45) NULL DEFAULT NULL AFTER `page_meta_data_id`;

ALTER TABLE `hero_banner_item  VARCHAR(45) NULL DEFAULT,
ADD COLUMN `hero_bunner_header`  VARCHAR(45) NULL DEFAULT,
ADD COLUMN `hero_cta_bunner_url`  VARCHAR(45) NULL DEFAULT,
ADD COLUMN `hero_cta_bunner_text`  VARCHAR(45) NULL DEFAULT;


ALTER TABLE `page_meta_data`
ADD COLUMN `slideshow_page_id` INT(11) NULL;


INSERT INTO `inspirethemephp80_db`.`quicklink_style` (`id`, `title`, `thumb_path`, `is_default`, `status`, `rank`) VALUES ('4', 'Tile', 'modules/quicklinks/assets/graphics/style-tiles.png', 'N', 'A', '4');


ALTER TABLE `inspirethemephp80_db`.`page_meta_data` 
CHANGE COLUMN `cta_bunner_primary_internal_url` `cta_bunner_primary_url` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `cta_bunner_secondary_internal_url` `cta_bunner_secondary_url` VARCHAR(255) NULL DEFAULT NULL ;


ALTER TABLE page_has_highlight ADD is_featured TINYINT(1) DEFAULT 0; 




ALTER TABLE inspirethemephp80_db.hero_banner ADD is_gallery TINYINT(1) DEFAULT 0 NOT NULL;