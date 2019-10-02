ALTER TABLE `packages` ADD `name_ar` VARCHAR(255) NULL AFTER `name`;
ALTER TABLE `packages` ADD `note_ar` VARCHAR(255) NULL AFTER `note`;

ALTER TABLE `courses` ADD `title_ar` VARCHAR(255) NULL AFTER `title`;
ALTER TABLE `courses` ADD `description_ar` TEXT NULL AFTER `description`;
ALTER TABLE `courses` ADD `suitable_for_ar` TEXT NULL AFTER `suitable_for`;
