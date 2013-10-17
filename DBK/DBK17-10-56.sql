-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `project`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `permission_table`
-- 

CREATE TABLE `permission_table` (
  `UserID` int(10) NOT NULL auto_increment,
  `UserName` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `TeacherID` varchar(7) NOT NULL,
  `UserFirstname` varchar(30) NOT NULL,
  `UserLastname` varchar(30) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Pinsert` tinyint(1) NOT NULL,
  `Pupdate` tinyint(1) NOT NULL,
  `Pdelete` tinyint(1) NOT NULL,
  `SuperUser` tinyint(1) NOT NULL,
  `Email` text NOT NULL,
  `Telephone` varchar(12) NOT NULL,
  `StatusID` tinyint(1) NOT NULL,
  PRIMARY KEY  (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- dump ตาราง `permission_table`
-- 

INSERT INTO `permission_table` VALUES (1, 'admin', '1234', '', 'ธนกฤต', 'อองกุลนะ', 1, 1, 1, 1, 1, 'foo@bar.com', '0869319312', 1);
INSERT INTO `permission_table` VALUES (2, 'test', '1234', '', 'Tanakritt', 'Ongkulna', 1, 1, 1, 1, 0, 'ddd@ddd.com', '0819515252', 1);
INSERT INTO `permission_table` VALUES (3, 'test2', '1234', '', 'not', 'active', 0, 1, 1, 1, 0, 'ddd@ddd.com', '123456798', 0);
INSERT INTO `permission_table` VALUES (5, 'admin2', '1234', '', 'myadmin', 'admin', 0, 0, 0, 0, 1, 'ddd@ddd.com', '055403354', 1);
INSERT INTO `permission_table` VALUES (7, 'test4', '1234', '', 'ddddd', 'ssssss', 1, 1, 1, 1, 0, 'ddd@ddd.com', '0869319312', 1);
