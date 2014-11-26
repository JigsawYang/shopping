CREATE DATABASE IF NOT EXISTS `shop_jx`;

USE `shop_jx`;

-- 管理员表
DROP TABLE IF EXISTS `jx_admin`;
CREATE TABLE `jx_admin` (
    `id` tinyint unsigned not null auto_increment primary key,
    `username` varchar(20) not null unique,
    `password` varchar(32) not null,
    `email` varchar(50) not null
);

-- 分类表
DROP TABLE IF EXISTS `jx_cate`;
CREATE TABLE `jx_cate` (
    `id` smallint unsigned not null auto_increment primary key,
    `cName` varchar(50) unique
);

-- 产品表
DROP TABLE IF EXISTS `jx_pro`;
CREATE TABLE `jx_pro` (
    `id` int unsigned not null auto_increment primary key,
    `pName` varchar(255) not null unique,
    `pSn` varchar(50) not null,
    `pNum` int(10) unsigned default '1',
    `mPrice` decimal(10,2) not null,
    `iPrice` decimal(10,2) not null,
    `pDesc` text,
    `pImg` varchar(50) not null,
    `pubTime` int(10) unsigned not null,
    `isShow` tinyint(1) DEFAULT '1',
    `isHot` tinyint(1) DEFAULT '0',
    `cId` smallint(5) unsigned not null
);

-- 用户表
DROP TABLE IF EXISTS `jx_user`;
CREATE TABLE `jx_user` (
    `id` int unsigned not null auto_increment primary key,
    `username` varchar(20) not null unique,
    `password` varchar(32) not null,
    `sex` enum("男", "女", "保密") not null default "保密",
    `face` varchar(50) not null,
    `regTime` int unsigned not null
);

-- 相册表
DROP TABLE IF EXISTS `jx_album`;
CREATE TABLE `jx_album`(
    `id` int unsigned not null auto_increment primary key,
    `pid` int unsigned not null,
    `albumPath` varchar(50) not null
);