ALTER TABLE `dbcredit3`.`submission` 
ADD COLUMN `item_price` decimal(10, 2) NULL AFTER `item_pict`,
ADD COLUMN `gaji` varchar(255) NULL AFTER `birth_date`,
ADD COLUMN `sales_id` int(0) NULL AFTER `gaji`,
ADD COLUMN `sales_name` varchar(255) NULL AFTER `sales_id`;