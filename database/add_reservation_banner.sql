-- Add Reservation Banner columns to page_meta_data table
ALTER TABLE `page_meta_data`
ADD COLUMN `reservation_banner_title` varchar(255) DEFAULT NULL AFTER `cta_bunner_secondary_button_text`,
ADD COLUMN `reservation_banner_button_text` varchar(255) DEFAULT NULL AFTER `reservation_banner_title`,
ADD COLUMN `reservation_banner_button_url` varchar(255) DEFAULT NULL AFTER `reservation_banner_button_text`;
