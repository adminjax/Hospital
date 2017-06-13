/*
Navicat MariaDB Data Transfer

Source Server         : localhost
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : mets

Target Server Type    : MariaDB
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-12-19 09:56:10
*/

SET FOREIGN_KEY_CHECKS=0;


-- 后台用户 ---------------------------------------------------------------------------------
-- ----------------------------
-- Table structure for admin_user(用户)
-- ----------------------------

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
	`u_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '后台用户id',
	`username` varchar(32) NOT NULL COMMENT '用户名',
	`password` varchar(128) NOT NULL COMMENT '密码',
	`realname` varchar(32) NOT NULL COMMENT '真实名字',
	`email` varchar(128) NOT NULL COMMENT '邮箱',
	`gender` tinyint(2) NOT NULL COMMENT '性别',
	`phone` bigint(13) NOT NULL COMMENT '手机号',
	`created` int(10) NOT NULL COMMENT '创建时间',
	`modified` int(10) NOT NULL COMMENT '修改时间',
	`lognum` int(10) NOT NULL COMMENT '登录次数',
	`logdate` int(10) NOT NULL COMMENT '最后一次登录时间',
	`is_active` tinyint(2) NOT NULL COMMENT '是否激活',
	`rp_token` text COMMENT '重置密码链接',
	`rp_token_created_at` int(10) NULL DEFAULT NULL COMMENT '创建重置密码链接的时间戳',
	`lock_expires` int(10) NULL DEFAULT NULL COMMENT '用户锁定时间',
	`extra` text COMMENT '其他用户数据',
	PRIMARY KEY (`u_id`),
	UNIQUE KEY `UNQ_ADMIN_USER_USERNAME` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台登录用户表';

-- ----------------------------
-- Table structure for admin_role(角色)
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role` (
	`role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色id',
	`role_name` varchar(50) DEFAULT NULL COMMENT '角色名称',
	`u_id` int(10) unsigned DEFAULT NULL COMMENT '用户id', 
	`sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色排序',
	`is_active` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否激活',
	PRIMARY KEY (`role_id`),
	UNIQUE KEY `UNQ_ADMIN_ROLE_U_ID` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Table structure for admin_rule(规则)
-- ----------------------------
DROP TABLE IF EXISTS `admin_rule`;
CREATE TABLE `admin_rule` (
	`rule_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '规则id',
	`role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
	`resource_id` varchar(255) DEFAULT NULL COMMENT '资源',
	PRIMARY KEY (`rule_id`),
	KEY `IDX_ADMIN_RULE_RESOURCE_ID` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='规则表';


-- Api ---------------------------------------------------------------------------------
-- ----------------------------
-- Table structure for api_user()
-- ----------------------------
DROP TABLE IF EXISTS `api_user`;
CREATE TABLE `api_user` (

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='';


-- 标签 ---------------------------------------------------------------------------------
-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
	`tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签id',
	`tag_name` varchar(50) NOT NULL COMMENT '标签名字',
	`sort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
	`desc` varchar(255) DEFAULT NULL COMMENT '标签说明',
	`created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`modified` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`is_active` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '是否激活',
	PRIMARY KEY (`tag_id`),
	KEY `IDX_TAG_TAG_NAME` (`tag_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Table structure for medical
-- ----------------------------
DROP TABLE IF EXISTS `medical`;
CREATE TABLE `medical` (
	`m_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '病历id',
	`medical_num` varchar(32) NOT NULL DEFAULT '0' COMMENT '编号',
	`name` varchar(50) NOT NULL COMMENT '病人名称',
	`gender` tinyint(2) unsigned NOT NULL COMMENT '性别0女/1男',
	`age` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '年龄',
	`phone` bigint(13) unsigned NOT NULL DEFAULT '0' COMMENT '手机号',
	`docter` varchar(50) NOT NULL COMMENT '主治医生',
	`address` varchar(255) DEFAULT NULL COMMENT '地址',
	`over` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否完结',
	`created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
	`modified` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	PRIMARY KEY (`m_id`),
	UNIQUE KEY `UNQ_IDX_MEDICAL_NUM` (`medical_num`),
	KEY `IDX_MEDICAL_NAME` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='病历主表';

-- ----------------------------
-- Table structure for 
-- ----------------------------
DROP TABLE IF EXISTS `medical_list`;
CREATE TABLE `medical_list` (
	`ml_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '历史病历id',
	`m_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '病历id',
	`title` varchar(50) NOT NULL COMMENT '标题',
	`prescription` text DEFAULT NULL COMMENT '处方',
	`prescribed` text DEFAULT NULL COMMENT '医嘱',
	`docter` varchar(50) DEFAULT NULL COMMENT '医生',
	`created` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
	PRIMARY KEY (`ml_id`),
	KEY `IDX_MEDICAL_LIST` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='病历副表';


-- 预约 ---------------------------------------------------------------------------------
-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
	`o_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '预约列表id',
	`name` varchar(50) NOT NULL COMMENT '病人名称',
	`created` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '预约时间',
	`docter` varchar(50) NOT NULL COMMENT '医生',
	PRIMARY KEY (`o_id`),
	KEY `IDX_ORDER_NAME` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='病历副表';


-- 医生信息 ---------------------------------------------------------------------------------
-- ----------------------------
-- Table structure for docter
-- ----------------------------
DROP TABLE IF EXISTS `docter`;
CREATE TABLE `docter` (
	`d_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '医生id',
	`name` varchar(50) DEFAULT NULL COMMENT '',
	`avater` varchar(255) NOT NULL COMMENT '',
	`gender` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别0女1男',
	`phone` bigint(13) NOT NULL DEFAULT '0' COMMENT '手机号',
	`brief` text NOT NULL COMMENT '简介',
	PRIMARY KEY (`d_id`),
	KEY `IDX_DOCTER_NAME` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='医生信息';