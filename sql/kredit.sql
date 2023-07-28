/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 80021
Source Host           : 127.0.0.1:3306
Source Database       : credits

Target Server Type    : MYSQL
Target Server Version : 80021
File Encoding         : 65001

Date: 2023-07-28 10:24:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `payment_amount` double unsigned NOT NULL,
  `credit_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for credit
-- ----------------------------
DROP TABLE IF EXISTS `credit`;
CREATE TABLE `credit` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `months` mediumint unsigned NOT NULL,
  `amount` int unsigned NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `interest_rate` double unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
