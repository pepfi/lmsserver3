/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50087
Source Host           : localhost:3306
Source Database       : lmsserverdb

Target Server Type    : MYSQL
Target Server Version : 50087
File Encoding         : 65001

Date: 2016-01-07 10:17:14
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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'John', 'Doe', 'admin', 'youremail@example.com', '202cb962ac59075b964b07152d234b70', '1', 'english', '0');
INSERT INTO `admin` VALUES ('24', 'Tom', 'John', 'wmg', 'wmgwmg@qq.com', '202cb962ac59075b964b07152d234b70', '0', 'english', '1');

-- ----------------------------
-- Table structure for deviceinfo
-- ----------------------------
DROP TABLE IF EXISTS `deviceinfo`;
CREATE TABLE `deviceinfo` (
  `mac` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL default '',
  `ip_location` varchar(255) NOT NULL default '',
  `host_model` varchar(255) NOT NULL default '',
  `host_sn` varchar(255) NOT NULL default '',
  `cpu_model` varchar(255) NOT NULL default '',
  `cpu_sn` varchar(255) NOT NULL default '',
  `memory_model` varchar(255) NOT NULL default '',
  `memory_sn` varchar(255) NOT NULL default '',
  `board_sn` varchar(255) NOT NULL default '',
  `network_card_mac` varchar(255) NOT NULL default '',
  `disk_model` varchar(255) NOT NULL default '',
  `disk_sn` varchar(255) NOT NULL default '',
  `lowfre_model` varchar(255) NOT NULL default '',
  `lowfre_sn` varchar(255) NOT NULL default '',
  `hignfre_model` varchar(255) NOT NULL default '',
  `hignfre_sn` varchar(255) NOT NULL default '',
  `gps_model` varchar(255) NOT NULL default '',
  `gps_sn` varchar(255) NOT NULL default '',
  `modelof3g` varchar(255) NOT NULL default '',
  `snof3g` varchar(255) NOT NULL default '',
  `iccid` varchar(255) NOT NULL default '',
  `hard_version` varchar(255) NOT NULL default '',
  `firmware_version` varchar(255) NOT NULL default '',
  `gateway_version` varchar(255) NOT NULL default '',
  `content_version` varchar(255) NOT NULL default '',
  `first_registration_time` datetime NOT NULL,
  `last_registration_time` datetime NOT NULL,
  `state` int(11) NOT NULL default '0',
  `last_keepalive_time` datetime NOT NULL,
  PRIMARY KEY  (`mac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of deviceinfo
-- ----------------------------
INSERT INTO `deviceinfo` VALUES ('00-1F-64-00-00-01', '211.101.24.200', '北京市朝阳区', 'null', 'null', 'none', 'none', 'none', 'none', 'null', 'none', 'error', 'error', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'null', '0.0.0.4', 'null', 'null', '2015-05-15 17:07:51', '2015-05-15 17:25:38', '0', '2015-05-15 18:45:36');
INSERT INTO `deviceinfo` VALUES ('00:1f:64:11:22:12', '124.127.14.164', '北京', 'AQ2000-LV1', '01010729b12014B15404', 'none', 'none', 'none', 'none', '01010729b12014B15404', 'none', 'error', 'error', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'none', 'erro', 'erro', 'zj1.2', 'zj1.2', '2015-04-30 15:10:40', '2015-04-30 15:10:40', '0', '2015-05-15 18:02:36');
INSERT INTO `deviceinfo` VALUES ('00:1F:64:CE:FB:1E', '117.136.38.154', '湖北移动', 'CS-VIC-2000-C', '01010730b12014A00961', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010730b12014A00961', '00:1F:64:CE:FB:1F', 'abcdefg', '000000', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'DM111', '0', '898600710112F0075762', '1.20', '1.0.7.2', 'zj1.2', 'zj1.2', '2015-05-19 17:50:32', '2015-05-19 17:50:32', '0', '2015-05-19 18:00:41');
INSERT INTO `deviceinfo` VALUES ('00:1F:64:CF:39:26', '117.136.0.96', '北京市 移动', 'CS-VIC-2000-C', '01010730K12014A00181', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010730K12014A00181', '00:1F:64:CF:39:27', 'FORESEE 128GB SSD', 'E394NSRF7560', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'DM111', '0', '898600710112F0075762', '1.20', '1.0.7.2', 'zj1.2sp1', 'zj1.2sp1', '2015-05-19 17:07:48', '2015-05-19 17:07:48', '0', '2015-05-19 17:18:41');
INSERT INTO `deviceinfo` VALUES ('00:1F:64:DF:A3:D9', '1.203.147.40', '北京', 'CS-VIC-2000-C', '01010729b12014B09438', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010729b12014B09438', '00:1F:64:DF:A3:DA', 'FORESEE 128GB SSD', 'E413NSRF5539', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'MC271X', 'A000004E149A070', '89860314400200646812', '1.20', '1.0.7.1', 'zj1.3sp2', 'zj1.3sp2', '2015-04-30 17:26:34', '2015-04-30 17:26:34', '0', '0000-00-00 00:00:00');
INSERT INTO `deviceinfo` VALUES ('00:1f:65:01:01:01', '1.203.0.252', '北京市 电信', 'CS2000', '01234567890autelan', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01234567890autelan', '00:1F:65:01:01:02', 'FORESEE 128GB SSD', 'E376NSSF1060', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'MC271X', 'A000004E144DE63', '89860314400200484982', '9.0a', '1.1.1.1', 'hahahaha', 'hahahaha', '2015-07-24 16:48:50', '2015-07-24 18:01:58', '0', '2015-08-13 09:16:30');
INSERT INTO `deviceinfo` VALUES ('00:1f:65:03:17:03', '1.203.146.241', '新疆', 'CS-VIC-2000-C', '010203040506autelantest', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '010203040506autelantest', '00:1F:65:03:17:04', 'FORESEE 128GB SSD', 'E376NSSF1628', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'MC271X', 'A0000038D35D02B', '89860314400200484875', '5.06', '1.0.6.31', 'zj1.2sp4', 'zj1.2sp4', '2015-04-24 18:52:49', '2015-04-29 14:43:59', '0', '0000-00-00 00:00:00');
INSERT INTO `deviceinfo` VALUES ('4C:48:DA:00:23:38', '124.127.6.166', '北京市 电信', 'CS-VIC-2000-C', '01010729b12014B17355', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010729b12014B17355', '4C:48:DA:00:23:39', 'FORESEE 128GB SSD', 'E431NSRF2169', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'MC271X', 'A000004E18210C6', '89860314400200603417', '1.20', '1.0.7.2', 'zj1.6sp4', 'zj1.6sp4', '2015-05-07 17:07:15', '2015-05-19 09:19:53', '0', '2015-05-19 15:40:41');
INSERT INTO `deviceinfo` VALUES ('4C:48:DA:00:A8:C0', '112.96.109.147', '广东省广州市', 'AQ2000-LV1', '01010736K11015100001', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010736K11015100001', '4C:48:DA:00:A8:C1', 'FORESEE 128GB SSD', 'E431NSRF1653', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'DM111', '0', '89860114851102565967', '1.10', '1.0.7.1', 'yc1.9sp11', 'yc1.9sp11', '2015-04-27 15:55:00', '2015-05-15 09:07:36', '0', '2015-05-15 09:33:37');
INSERT INTO `deviceinfo` VALUES ('4C:48:DA:00:A8:C8', '125.211.216.100', '黑龙江省哈', 'AQ2000-LV1', '01010736K11015100003', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010736K11015100003', '4C:48:DA:00:A8:C9', 'FORESEE 128GB SSD', 'E465NSSF3564', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'DM111', '0', '89860111811008090125', '1.10', '1.0.7.1', 'zj1.9sp11', 'zj1.9sp11', '2015-05-20 17:04:20', '2015-05-20 17:04:20', '0', '2015-05-21 17:55:05');
INSERT INTO `deviceinfo` VALUES ('4C:48:DA:00:A8:D4', '112.96.179.113', '北京', 'AQ2000-LV1', '01010736K11015100006', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010736K11015100006', '4C:48:DA:00:A8:D5', 'FORESEE 128GB SSD', 'E431NSRF4645', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'DM111', '0', '89860114851102565975', '1.10', '1.0.7.1', 'yc1.9sp11', 'yc1.9sp11', '2015-05-04 15:22:52', '2015-05-04 15:22:52', '0', '0000-00-00 00:00:00');
INSERT INTO `deviceinfo` VALUES ('4C:48:DA:00:A9:20', '117.136.0.144', '北京市 移动', 'AQ2000-LV1', '01010736K11015100025', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010736K11015100025', '4C:48:DA:00:A9:21', 'FORESEE 128GB SSD', 'E431NSRF2509', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'DM111', '0', '898600710112F0075762', '1.10', '1.0.7.2', 'zj1.4sp3', 'zj1.4sp3', '2015-05-07 18:44:41', '2015-05-19 17:54:24', '1', '2015-05-22 10:40:01');
INSERT INTO `deviceinfo` VALUES ('4C:48:DA:00:A9:74', '223.104.19.138', '内蒙古', 'AQ2000-LV1', '01010736K11015100046', 'MIPS 74Kc V4.12', '000000', 'abcdefg', '000000', '01010736K11015100046', '4C:48:DA:00:A9:75', 'FORESEE 128GB SSD', 'E465NSSF0439', 'AR9344', '000000', 'AR9582', '000000', 'abcdefg', '000000', 'DM111', '0', '898602A01614F0233479', '1.10', '1.0.7.1', 'zj1.4sp2', 'zj1.4sp2', '2015-04-29 15:06:57', '2015-04-29 15:06:57', '0', '0000-00-00 00:00:00');
INSERT INTO `deviceinfo` VALUES ('AAAAAA', '211.101.24.200', '北京市朝阳区', 'host品牌型号', '设备编号', 'cpu品牌型号', 'CPU编号', 'memory品牌型号', '内存编号', 'boardSN设备编号', 'networkCardMacMAC地址', 'disk品牌型号', '硬盘编号', 'lowFreModel品牌型号', 'lowFreSN模块编号', 'hignFreModel品牌型号', '模块编号', 'gpsModel品牌型号', '模块编号', '品牌型号', '模块编号', 'ICCID号', '硬件版本', '固件版本', '门户版本', '内容版本', '2015-05-12 11:01:48', '2015-05-15 17:40:10', '0', '2015-05-15 18:30:36');

-- ----------------------------
-- Table structure for macs_order
-- ----------------------------
DROP TABLE IF EXISTS `macs_order`;
CREATE TABLE `macs_order` (
  `mac` varchar(20) NOT NULL,
  `order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of macs_order
-- ----------------------------
INSERT INTO `macs_order` VALUES ('00:1F:64:CE:FB:1E', 'ls');
INSERT INTO `macs_order` VALUES ('00-1F-64-00-00-01', 'ls');
INSERT INTO `macs_order` VALUES ('00:1F:64:CE:FB:1E', 'ls');
INSERT INTO `macs_order` VALUES ('00:1F:64:CF:39:26', 'ls');
INSERT INTO `macs_order` VALUES ('00:1F:64:DF:A3:D9', 'ls');
INSERT INTO `macs_order` VALUES ('00-1F-64-00-00-01', 'ls');
INSERT INTO `macs_order` VALUES ('00:1F:64:CE:FB:1E', 'ls');
INSERT INTO `macs_order` VALUES ('00:1F:64:CF:39:26', 'ls');
INSERT INTO `macs_order` VALUES ('00:1F:64:DF:A3:D9', 'ls');
INSERT INTO `macs_order` VALUES ('00-1F-64-00-00-01', 'cd');
INSERT INTO `macs_order` VALUES ('00:1f:64:11:22:12', 'cd');
INSERT INTO `macs_order` VALUES ('00:1F:64:CE:FB:1E', 'cd');
INSERT INTO `macs_order` VALUES ('00:1F:64:CF:39:26', 'cd');
INSERT INTO `macs_order` VALUES ('00:1F:64:DF:A3:D9', 'cd');
INSERT INTO `macs_order` VALUES ('00:1f:65:01:01:01', 'cd');
INSERT INTO `macs_order` VALUES ('00:1f:65:03:17:03', 'cd');
INSERT INTO `macs_order` VALUES ('4C:48:DA:00:23:38', 'cd');
INSERT INTO `macs_order` VALUES ('4C:48:DA:00:A8:C0', 'cd');
