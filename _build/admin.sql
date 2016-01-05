/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50087
Source Host           : localhost:3306
Source Database       : lmsserverdb

Target Server Type    : MYSQL
Target Server Version : 50087
File Encoding         : 65001

Date: 2015-12-22 17:57:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(4) NOT NULL auto_increment,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL default '0' COMMENT '0 - Administrator, 1 - Worker, 2 - Reseller',
  `language` varchar(20) NOT NULL,
  `blocked` enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'John', 'Doe', 'admin', 'youremail@example.com', '202cb962ac59075b964b07152d234b70', '1', 'english', '0');
INSERT INTO `admin` VALUES ('3', 'Tom', 'John', 'wang', '11028237180@qq.com', '123', '2', 'english', '1');
