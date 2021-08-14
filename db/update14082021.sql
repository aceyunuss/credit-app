ALTER TABLE `dbcredit3`.`item_criteria` 
ADD COLUMN `type` char(1) NULL AFTER `item_weight`;

ALTER TABLE `dbcredit3`.`submission_quest` 
ADD COLUMN `type` char(1) NULL AFTER `weight`;

ALTER TABLE `dbcredit3`.`submission_quest` 
ADD COLUMN `min_score` int(11) NULL AFTER `score`;