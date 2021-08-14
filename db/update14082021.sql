ALTER TABLE `dbcredit3`.`item_criteria` 
ADD COLUMN `item_type` varchar(10) NULL AFTER `item_weight`;

ALTER TABLE `dbcredit3`.`submission_quest` 
ADD COLUMN `type` varchar(10) NULL AFTER `weight`;

ALTER TABLE `dbcredit3`.`submission_quest` 
ADD COLUMN `min_score` int(11) NULL AFTER `score`;