ALTER TABLE `product_transation_detail` ADD `date` DATE NULL DEFAULT NULL AFTER `invoice_id`, ADD `type` TINYINT NULL DEFAULT NULL COMMENT '1=> Sale 2=> Purchase' AFTER `date`; 
ALTER TABLE `product_transation_detail` ADD `company_id` INT NULL DEFAULT NULL AFTER `id`; 
//above done
