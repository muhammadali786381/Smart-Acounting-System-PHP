ALTER TABLE `product_transation_detail` ADD `date` DATE NULL DEFAULT NULL AFTER `invoice_id`, ADD `type` TINYINT NULL DEFAULT NULL COMMENT '1=> Sale 2=> Purchase' AFTER `date`; 
ALTER TABLE `product_transation_detail` ADD `company_id` INT NULL DEFAULT NULL AFTER `id`; 
//above done

ALTER TABLE `account_head` ADD `opening_balance` DECIMAL(15,2) NOT NULL DEFAULT '0.00' AFTER `head_type`;
//above done

INSERT INTO `account_head` (`id`, `company_id`, `company_name`, `owner_name`, `cell_1`, `cell_2`, `address`, `head_type`, `opening_balance`, `status`, `create_on`, `update_on`) VALUES (NULL, '1', 'Ya Razzaq Trader 2', 'Allah Pak', '923017155110', '', 'ABC', '4', '0.00', '1', '2021-02-09 20:04:55', '2021-02-11 02:13:02') 
ALTER TABLE `voucher` CHANGE `type` `type` ENUM('c.r.v','c.p.v','b.p.v','b.r.v','j.v','s.v','p.v','y.r.v') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'y.r.v=> ya Razzaq voucher'; 
INSERT INTO `setting` (`id`, `key_value`, `value`, `description`) VALUES (NULL, 'APP_YA_RAZZAQ_PERCENT', '10', NULL) 
10-> company 2
121-> company 1
//above done

ALTER TABLE `account_head` CHANGE `opening_balance` `opening_cr_balance` DECIMAL(15,2) NOT NULL DEFAULT '0.00'; 
ALTER TABLE `account_head` ADD `opening_dr_balance` DECIMAL(15,2) NOT NULL DEFAULT '0.00' AFTER `opening_cr_balance`; 
//above done



//profit accont

144-> company 2
148-> company 1


INSERT INTO `account_head` (`id`, `company_id`, `company_name`, `owner_name`, `cell_1`, `cell_2`, `address`, `head_type`, `opening_cr_balance`, `opening_dr_balance`, `status`, `create_on`, `update_on`) VALUES (NULL, '2', 'Stock Account ZA', 'ZA OWNER', '000000000000', '', 'multan', '4', '138510.00', '138510.00', '1', '2021-03-08 07:03:58', '2021-03-11 10:46:23'); 

INSERT INTO `account_head` (`id`, `company_id`, `company_name`, `owner_name`, `cell_1`, `cell_2`, `address`, `head_type`, `opening_cr_balance`, `opening_dr_balance`, `status`, `create_on`, `update_on`) VALUES (NULL, '1', 'Stock Account ZF', 'ZF OWNER', '000000000000', '', 'multan', '4', '138510.00', '138510.00', '1', '2021-03-08 07:03:58', '2021-03-11 10:46:23'); 
//stock accont
149-> company 2
150-> company 1

//above done


ALTER TABLE `voucher` CHANGE `type` `type` ENUM('c.r.v','c.p.v','b.p.v','b.r.v','j.v','s.v','p.v','y.r.v','g.p.v') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'y.r.v=> ya Razzaq voucher'; 

//above done



CREATE TABLE `zf_accounting`.`head_route` ( `id` INT NOT NULL AUTO_INCREMENT , `route_name` VARCHAR(125) NOT NULL , `day_name` VARCHAR(125) NULL DEFAULT NULL , `description` VARCHAR(225) NULL DEFAULT NULL , `company_id` INT NOT NULL , `is_editable` TINYINT NOT NULL DEFAULT '1' , PRIMARY KEY (`id`), UNIQUE (`route_name`)) ENGINE = InnoDB; 

//no need
INSERT INTO `head_route` (`id`, `route_name`, `day_name`, `description`, `company_id`, `is_editable`) VALUES (NULL, 'No Route Able Head 1', NULL, NULL, '1', '0'); 
INSERT INTO `head_route` (`id`, `route_name`, `day_name`, `description`, `company_id`, `is_editable`) VALUES (NULL, 'No Route Able Head 2', NULL, NULL, '2', '0'); 
//

ALTER TABLE `account_head` ADD `head_route_id` INT NULL DEFAULT NULL AFTER `opening_dr_balance`; 

//above done