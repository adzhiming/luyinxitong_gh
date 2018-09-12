/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_neuplatform

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-09-13 01:12:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tab_phonebook
-- ----------------------------
DROP TABLE IF EXISTS `tab_phonebook`;
CREATE TABLE `tab_phonebook` (
  `pid` int(4) NOT NULL AUTO_INCREMENT,
  `district` varchar(255) NOT NULL DEFAULT '',
  `category` varchar(255) NOT NULL DEFAULT '',
  `deptid` int(4) NOT NULL DEFAULT '0',
  `contactName` varchar(255) NOT NULL,
  `sex` smallint(2) NOT NULL,
  `Mobile` varchar(20) DEFAULT NULL,
  `OfficeNum` varchar(20) DEFAULT NULL,
  `OtherNum` varchar(20) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `HomeNum` varchar(20) DEFAULT NULL,
  `phone1` varchar(20) NOT NULL DEFAULT '',
  `phone2` varchar(20) NOT NULL DEFAULT '',
  `phone3` varchar(20) NOT NULL DEFAULT '',
  `phone4` varchar(20) NOT NULL DEFAULT '',
  `phone5` varchar(20) NOT NULL DEFAULT '',
  `phone6` varchar(20) NOT NULL DEFAULT '',
  `phone7` varchar(20) NOT NULL DEFAULT '',
  `phone8` varchar(20) NOT NULL DEFAULT '',
  `phone9` varchar(20) NOT NULL DEFAULT '',
  `phone10` varchar(20) NOT NULL DEFAULT '',
  `groupnum` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=gb2312;
