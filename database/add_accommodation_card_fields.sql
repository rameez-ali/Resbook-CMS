-- Add new fields for accommodation card details matching design
ALTER TABLE `accommodation`
ADD COLUMN `deck_size` int DEFAULT NULL AFTER `room_size`,
ADD COLUMN `bedroom_details` text DEFAULT NULL AFTER `bathrooms`,
ADD COLUMN `sleeps_details` text DEFAULT NULL AFTER `guests`;
