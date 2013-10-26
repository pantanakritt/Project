-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 26, 2013 at 11:35 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `project`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `course_table`
-- 

CREATE TABLE `course_table` (
  `CourseID` varchar(8) NOT NULL,
  `CourseName` text NOT NULL,
  `Unit` tinyint(4) NOT NULL,
  `Theory` tinyint(4) NOT NULL,
  `Practical` tinyint(4) NOT NULL,
  PRIMARY KEY  (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `course_table`
-- 

INSERT INTO `course_table` VALUES ('4121102Z', ' โครงสร้างข้อมูลและอัลกอลิทึม ', 3, 2, 2);
INSERT INTO `course_table` VALUES ('4121305Z', ' จริยธรรมและกฎหมายสำหรับผู้ประกอบวิชาชีพค', 3, 2, 2);
INSERT INTO `course_table` VALUES ('4121306Z', ' การเขียนโปรแกรมเชิงวัตถุ', 3, 2, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `dblog_table`
-- 

CREATE TABLE `dblog_table` (
  `Log_No` int(11) NOT NULL auto_increment,
  `log_code` varchar(12) NOT NULL,
  `User` varchar(30) NOT NULL,
  `Action` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `log_Date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`Log_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- 
-- Dumping data for table `dblog_table`
-- 

INSERT INTO `dblog_table` VALUES (5, '131026042411', 'admin', '-->Login ,Update profile On user = admin2 , Update profile On user = test ,Update profile On user = test4 ,add user test5 to DB ,Delete test5 ,Change status test4 to Disactivate ,Change status test2 to Disactivate ,---> Logout---> Logout---> Logout---> Logout---> Logout---> Logout---> Logout', '127.0.0.1', '2013-10-26 03:55:31');
INSERT INTO `dblog_table` VALUES (6, '131026045810', 'admin2', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 03:58:17');
INSERT INTO `dblog_table` VALUES (7, '131026051242', 'admin', '-->Login ,add user test5 to DB ,Delete test5 ,---> Logout---> Logout---> Logout---> Logout---> Logout', '127.0.0.1', '2013-10-26 04:26:34');
INSERT INTO `dblog_table` VALUES (8, '131026052727', 'admin', '-->Login ,Change status test2 to Activate ,Change status test4 to Activate ,---> Logout---> Logout---> Logout---> Logout---> Logout', '127.0.0.1', '2013-10-26 04:28:03');
INSERT INTO `dblog_table` VALUES (9, '131026053800', 'admin', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 04:41:04');
INSERT INTO `dblog_table` VALUES (10, '131026054309', 'admin', '-->Login ,Change status admin2 to Disactivate ,Change status admin2 to Disactivate ,---> Logout', '127.0.0.1', '2013-10-26 04:43:39');
INSERT INTO `dblog_table` VALUES (11, '131026054437', 'admin', '-->Login ,Change status admin2 to Activate ,Change status test to Disactivate ,Change status test2 to Disactivate ,Change status test4 to Disactivate ,Change status test to Activate ,---> Logout', '127.0.0.1', '2013-10-26 04:46:11');
INSERT INTO `dblog_table` VALUES (12, '131026075336', 'admin', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 07:20:21');
INSERT INTO `dblog_table` VALUES (13, '131026082029', 'test', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 07:20:32');
INSERT INTO `dblog_table` VALUES (14, '131026082041', 'test2', '-->Login ,', '127.0.0.1', '2013-10-26 07:20:41');
INSERT INTO `dblog_table` VALUES (15, '131026082046', 'test2', '-->Login ,', '127.0.0.1', '2013-10-26 07:20:46');
INSERT INTO `dblog_table` VALUES (16, '131026082105', 'test2', '-->Login ,', '127.0.0.1', '2013-10-26 07:21:05');
INSERT INTO `dblog_table` VALUES (17, '131026082114', 'admin', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 07:22:18');
INSERT INTO `dblog_table` VALUES (18, '131026082443', 'admin2', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 07:24:50');
INSERT INTO `dblog_table` VALUES (19, '131026082500', 'admin', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 07:35:43');
INSERT INTO `dblog_table` VALUES (20, '131026083441', 'test', '-->Login ,---> Logout', '192.168.2.19', '2013-10-26 07:34:51');
INSERT INTO `dblog_table` VALUES (21, '131026044649', 'admin', '-->Login ,Update profile On user = admin ,---> Logout', '127.0.0.1', '2013-10-26 15:58:40');
INSERT INTO `dblog_table` VALUES (22, '131026045850', 'test', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 16:01:06');
INSERT INTO `dblog_table` VALUES (23, '131026050115', 'admin', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 16:04:03');
INSERT INTO `dblog_table` VALUES (24, '131026050414', 'test', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 16:04:58');
INSERT INTO `dblog_table` VALUES (25, '131026050506', 'admin', '-->Login ,---> Logout', '127.0.0.1', '2013-10-26 16:07:52');
INSERT INTO `dblog_table` VALUES (26, '131026050807', 'admin2', '-->Login ,add user test6 to DB ,Change status test6 to Activate ,', '127.0.0.1', '2013-10-26 16:09:10');

-- --------------------------------------------------------

-- 
-- Table structure for table `main_table`
-- 

CREATE TABLE `main_table` (
  `MainID` varchar(10) NOT NULL,
  `CourseID` varchar(8) NOT NULL,
  `MajorID` varchar(9) NOT NULL,
  `TeacherID` varchar(7) NOT NULL,
  `AsgnRef` varchar(10) NOT NULL,
  `Section` varchar(2) NOT NULL,
  `Day` char(3) NOT NULL,
  `StartTime` varchar(2) NOT NULL,
  `Year` char(2) NOT NULL,
  `Term` char(1) NOT NULL,
  `Room` varchar(5) NOT NULL,
  `Campus` varchar(20) NOT NULL,
  `StdType` varchar(20) NOT NULL,
  PRIMARY KEY  (`MainID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `main_table`
-- 

INSERT INTO `main_table` VALUES ('2556010001', '4121305Z', '560313901', '0101001', '4121305Z01', '1', 'MON', '6', '56', '1', '846', 'อุตรดิตถ์', 'ภาคปกติ');
INSERT INTO `main_table` VALUES ('2556010002', '4121305Z', '560313902', '0101002', '4121305Z01', '2', 'MON', '6', '56', '1', '846', 'อุตรดิตถ์', 'ภาคปกติ');
INSERT INTO `main_table` VALUES ('2556010003', '4121102Z', '560429701', '0101003', '4121102Z01', '1', 'TUE', '1', '56', '1', '824', 'อุตรดิตถ์', 'ภาคปกติ');
INSERT INTO `main_table` VALUES ('2556010004', '4121306Z', '560423801', '0101004', '4121306Z01', '1', 'MON', '6', '56', '1', '826', 'น่าน', 'ภาคพิเศษ');
INSERT INTO `main_table` VALUES ('2556010005', '4121306Z', '560423802', '0101004', '4121306Z02', '2', 'MON', '1', '56', '1', '826', 'ทุ่งกะโล่', 'กศ.บป');
INSERT INTO `main_table` VALUES ('2556010006', '4121306Z', '560423803', '0101004', '4121306Z04', '4', 'TUE', '6', '56', '1', '832', 'อุตรดิตถ์', 'ปกติ');
INSERT INTO `main_table` VALUES ('2556010007', '4121306Z', '560423804', '0101002', '4121306Z03', '3', 'MON', '1', '56', '1', '832', 'อุตรดิตถ์', 'ปกติ');
INSERT INTO `main_table` VALUES ('2556010008', '4121306Z', '560429701', '0101002', '4121306Z05', '5', 'FRI', '6', '56', '1', '823', 'อุตรดิตถ์', 'ภาคปกติ');

-- --------------------------------------------------------

-- 
-- Table structure for table `major_table`
-- 

CREATE TABLE `major_table` (
  `MajorID` varchar(9) NOT NULL,
  `MajorName` text NOT NULL,
  PRIMARY KEY  (`MajorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `major_table`
-- 

INSERT INTO `major_table` VALUES ('560313901', 'คอมศึกษา ฯ');
INSERT INTO `major_table` VALUES ('560313902', 'คอมศึกษา ฯ');
INSERT INTO `major_table` VALUES ('560423801', 'วิทยาการคอม ฯ');
INSERT INTO `major_table` VALUES ('560423802', 'วิทยาการคอม ฯ');
INSERT INTO `major_table` VALUES ('560423803', 'คอมศึกษา');
INSERT INTO `major_table` VALUES ('560423804', 'คอมศึกษา');
INSERT INTO `major_table` VALUES ('560429701', 'เทคโนโลยีสารสนเทศ');

-- --------------------------------------------------------

-- 
-- Table structure for table `permission_table`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `permission_table`
-- 

INSERT INTO `permission_table` VALUES (1, 'admin', '1234', '', 'ธนกฤต', 'อองกุลนะ', 0, 0, 0, 0, 1, 'l3eethoven@me.com', '0869319312', 1);
INSERT INTO `permission_table` VALUES (2, 'test', '1234', '', 'Tanakritt', 'Ongkulna', 0, 1, 1, 1, 0, 'ddd@ddd.com', '0819515252', 1);
INSERT INTO `permission_table` VALUES (3, 'test2', '1234', '', 'not', 'active', 0, 1, 1, 1, 0, 'ddd@ddd.com', '123456798', 0);
INSERT INTO `permission_table` VALUES (6, 'test4', '1234', '', 'asdasd', 'asddasd', 1, 1, 1, 1, 0, 'ddd@ddd.com', '12345668', 0);
INSERT INTO `permission_table` VALUES (5, 'admin2', '1234', '', 'myadmin', 'admin', 1, 0, 0, 0, 1, 'ddd@ddd.com', '055403354', 1);
INSERT INTO `permission_table` VALUES (8, 'test5', 'aaa', '', 'dfjask', 'sdfja;', 1, 1, 1, 1, 0, 'adf@ddd.com', '0000000', 2);
INSERT INTO `permission_table` VALUES (9, 'test6', 'test6', '', 'asdfg', 'lname', 0, 1, 1, 1, 0, 'ddd@ddd.com', '081931931', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `teaassgn_table`
-- 

CREATE TABLE `teaassgn_table` (
  `TeaAsgnID` int(11) NOT NULL auto_increment,
  `AsgnRef` varchar(10) NOT NULL,
  `TeacherID` varchar(7) NOT NULL,
  PRIMARY KEY  (`TeaAsgnID`),
  KEY `AsgnRef` (`AsgnRef`),
  KEY `TeacherID` (`TeacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `teaassgn_table`
-- 

INSERT INTO `teaassgn_table` VALUES (1, '4121305Z01', '0101001');
INSERT INTO `teaassgn_table` VALUES (2, '4121305Z01', '0101002');
INSERT INTO `teaassgn_table` VALUES (3, '4121306Z01', '0101004');
INSERT INTO `teaassgn_table` VALUES (4, '4121306Z02', '0101004');
INSERT INTO `teaassgn_table` VALUES (5, '4121102Z01', '0101003');
INSERT INTO `teaassgn_table` VALUES (6, '4121306Z04', '0101004');
INSERT INTO `teaassgn_table` VALUES (7, '4121306Z03', '0101002');
INSERT INTO `teaassgn_table` VALUES (8, '4121306Z05', '0101002');

-- --------------------------------------------------------

-- 
-- Table structure for table `teacher_table`
-- 

CREATE TABLE `teacher_table` (
  `TeacherID` varchar(7) NOT NULL,
  `TeacherTitle` varchar(10) NOT NULL,
  `TeacherName` varchar(50) NOT NULL,
  `TeacherLastname` varchar(50) NOT NULL,
  PRIMARY KEY  (`TeacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `teacher_table`
-- 

INSERT INTO `teacher_table` VALUES ('0101001', 'อาจารย์', 'ชนิดา', 'คำเพ็ง');
INSERT INTO `teacher_table` VALUES ('0101002', 'อาจารย์', 'จุฬาลักษณ์', 'มหาวัน');
INSERT INTO `teacher_table` VALUES ('0101003', 'อาจารย์', 'กฤษณ์', 'ชัยวัณณคุปต์');
INSERT INTO `teacher_table` VALUES ('0101004', 'อาจารย์', 'เณริสสา', 'อ่อนขำ');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `teaassgn_table`
-- 
ALTER TABLE `teaassgn_table`
  ADD CONSTRAINT `teaassgn_table_ibfk_1` FOREIGN KEY (`TeacherID`) REFERENCES `teacher_table` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;
