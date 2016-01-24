/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.27 : Database - tripserverdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tripserverdb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `tripserverdb`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - Administrator, 1 - Worker, 2 - Reseller',
  `language` varchar(20) NOT NULL,
  `blocked` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`firstname`,`lastname`,`username`,`email`,`password`,`role`,`language`,`blocked`) values (1,'John','Doe','admin','youremail@example.com','202cb962ac59075b964b07152d234b70',1,'english','0'),(24,'Tom','John','wmg','wmgwmg@qq.com','202cb962ac59075b964b07152d234b70',0,'english','1');

/*Table structure for table `deviceinfo` */

DROP TABLE IF EXISTS `deviceinfo`;

CREATE TABLE `deviceinfo` (
  `mac` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL DEFAULT '',
  `ip_location` varchar(255) NOT NULL DEFAULT '',
  `host_model` varchar(255) NOT NULL DEFAULT '',
  `host_sn` varchar(255) NOT NULL DEFAULT '',
  `cpu_model` varchar(255) NOT NULL DEFAULT '',
  `cpu_sn` varchar(255) NOT NULL DEFAULT '',
  `memory_model` varchar(255) NOT NULL DEFAULT '',
  `memory_sn` varchar(255) NOT NULL DEFAULT '',
  `board_sn` varchar(255) NOT NULL DEFAULT '',
  `network_card_mac` varchar(255) NOT NULL DEFAULT '',
  `disk_model` varchar(255) NOT NULL DEFAULT '',
  `disk_sn` varchar(255) NOT NULL DEFAULT '',
  `lowfre_model` varchar(255) NOT NULL DEFAULT '',
  `lowfre_sn` varchar(255) NOT NULL DEFAULT '',
  `hignfre_model` varchar(255) NOT NULL DEFAULT '',
  `hignfre_sn` varchar(255) NOT NULL DEFAULT '',
  `gps_model` varchar(255) NOT NULL DEFAULT '',
  `gps_sn` varchar(255) NOT NULL DEFAULT '',
  `modelof3g` varchar(255) NOT NULL DEFAULT '',
  `snof3g` varchar(255) NOT NULL DEFAULT '',
  `iccid` varchar(255) NOT NULL DEFAULT '',
  `hard_version` varchar(255) NOT NULL DEFAULT '',
  `firmware_version` varchar(255) NOT NULL DEFAULT '',
  `gateway_version` varchar(255) NOT NULL DEFAULT '',
  `content_version` varchar(255) NOT NULL DEFAULT '',
  `first_registration_time` datetime NOT NULL,
  `last_registration_time` datetime NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `last_keepalive_time` datetime NOT NULL,
  PRIMARY KEY (`mac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `deviceinfo` */

/*Table structure for table `info_lteinfo` */

DROP TABLE IF EXISTS `info_lteinfo`;

CREATE TABLE `info_lteinfo` (
  `mac` varchar(30) NOT NULL COMMENT '设备MAC',
  `ipAddress` varchar(30) DEFAULT NULL COMMENT '设备ip',
  `ipLocation` varchar(100) DEFAULT NULL COMMENT '设备ip真实地址',
  `hostModel` varchar(100) DEFAULT NULL COMMENT '品牌型号',
  `hostsn` varchar(100) DEFAULT NULL COMMENT '设备编号',
  `cpuModel` varchar(100) DEFAULT NULL COMMENT 'CPU品牌型号',
  `cpuSN` varchar(100) DEFAULT NULL COMMENT 'CPU编号',
  `memoryModel` varchar(100) DEFAULT NULL COMMENT '内存品牌型号',
  `memorySN` varchar(100) DEFAULT NULL COMMENT '内存编号',
  `boardSN` varchar(100) DEFAULT NULL COMMENT '主板编号',
  `networkCardMac` varchar(100) DEFAULT NULL COMMENT '网卡MAC地址',
  `diskModel` varchar(100) DEFAULT NULL COMMENT '固态硬盘 品牌型号',
  `diskSN` varchar(100) DEFAULT NULL COMMENT '固态硬盘 硬盘编号',
  `lowFreModel` varchar(100) DEFAULT NULL COMMENT '2.4G AP品牌型号',
  `lowFreSN` varchar(100) DEFAULT NULL COMMENT '2.4G AP 模块编号',
  `hignFreModel` varchar(100) DEFAULT NULL COMMENT '5.8G WIFI品牌型号',
  `hignFreSN` varchar(100) DEFAULT NULL COMMENT '5.8G AP 模块编号',
  `gpsModel` varchar(100) DEFAULT NULL COMMENT 'GPS 品牌型号',
  `gpsSN` varchar(100) DEFAULT NULL COMMENT 'GPS 模块编号',
  `modelOf3g` varchar(100) DEFAULT NULL COMMENT '3G模块 品牌型号',
  `snOf3g` varchar(100) DEFAULT NULL COMMENT '3G模块 模块编号',
  `iccid` varchar(100) DEFAULT NULL COMMENT '3G卡ICCID号',
  `hardVersion` varchar(100) DEFAULT NULL COMMENT '版本 硬件版本',
  `firmwareVersion` varchar(100) DEFAULT NULL COMMENT '版本 固件版本',
  `gateWayVersion` varchar(100) DEFAULT NULL COMMENT '版本 门户版本',
  `contentVersion` varchar(100) DEFAULT NULL COMMENT '版本 内容版本',
  `firstRegistrationTime` datetime DEFAULT NULL COMMENT '首次注册时间',
  `lastRegistrationTime` datetime DEFAULT NULL COMMENT '最后一次注册时间',
  `state` int(1) DEFAULT NULL COMMENT '设备状态 0:离线,1:在线',
  `lastKeepAlivetime` datetime DEFAULT NULL COMMENT '最后一次保活时间',
  PRIMARY KEY (`mac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `info_lteinfo` */

/*Table structure for table `macs_order` */

DROP TABLE IF EXISTS `macs_order`;

CREATE TABLE `macs_order` (
  `mac` varchar(20) NOT NULL,
  `order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `macs_order` */

/*Table structure for table `movie-times` */

DROP TABLE IF EXISTS `movie-times`;

CREATE TABLE `movie-times` (
  `device_mac` varchar(64) NOT NULL DEFAULT '0',
  `time` date NOT NULL DEFAULT '0000-00-00',
  `movie_name` varchar(64) NOT NULL DEFAULT '0',
  `movie_play_times` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `movie-times` */

/*Table structure for table `movie-total` */

DROP TABLE IF EXISTS `movie-total`;

CREATE TABLE `movie-total` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(64) NOT NULL DEFAULT '0',
  `movie_play_total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `movie-total` */

/*Table structure for table `pvuv-device` */

DROP TABLE IF EXISTS `pvuv-device`;

CREATE TABLE `pvuv-device` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `device_mac` varchar(64) NOT NULL DEFAULT '0',
  `time` date NOT NULL DEFAULT '0000-00-00',
  `pv` int(11) NOT NULL DEFAULT '0',
  `download_app_times` int(11) NOT NULL DEFAULT '0',
  `uv` int(11) NOT NULL DEFAULT '0',
  `uv_android` int(11) NOT NULL DEFAULT '0',
  `uv_ios` int(11) NOT NULL DEFAULT '0',
  `uv_windows` int(11) NOT NULL DEFAULT '0',
  `uv_others` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `pvuv-device` */

/*Table structure for table `pvuv-log` */

DROP TABLE IF EXISTS `pvuv-log`;

CREATE TABLE `pvuv-log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `device_mac` varchar(64) NOT NULL DEFAULT '0',
  `remote_ip` varchar(64) NOT NULL DEFAULT '0',
  `remote_mac` varchar(64) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `time_local` int(11) NOT NULL DEFAULT '0',
  `request` varchar(128) NOT NULL DEFAULT '0',
  `url` varchar(256) NOT NULL DEFAULT '0',
  `protocol` varchar(64) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `body_bytes_sent` int(11) NOT NULL DEFAULT '0',
  `http_user_agent` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148465 DEFAULT CHARSET=utf8;

/*Data for the table `pvuv-log` */

/*Table structure for table `pvuv-total` */

DROP TABLE IF EXISTS `pvuv-total`;

CREATE TABLE `pvuv-total` (
  `pv` int(11) NOT NULL DEFAULT '0',
  `download_app_times` int(11) NOT NULL DEFAULT '0',
  `uv` int(11) NOT NULL DEFAULT '0',
  `uv_android` int(11) NOT NULL DEFAULT '0',
  `uv_ios` int(11) NOT NULL DEFAULT '0',
  `uv_windows` int(11) NOT NULL DEFAULT '0',
  `uv_others` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pvuv-total` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
