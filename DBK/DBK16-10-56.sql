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
-- โครงสร้างตาราง `course_table`
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
-- dump ตาราง `course_table`
-- 

INSERT INTO `course_table` VALUES ('4121102Z', ' โครงสร้างข้อมูลและอัลกอลิทึม ', 3, 2, 2);
INSERT INTO `course_table` VALUES ('4121305Z', ' จริยธรรมและกฎหมายสำหรับผู้ประกอบวิชาชีพค', 3, 2, 2);
INSERT INTO `course_table` VALUES ('4121306Z', ' การเขียนโปรแกรมเชิงวัตถุ', 3, 2, 2);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `main_table`
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
-- dump ตาราง `main_table`
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
-- โครงสร้างตาราง `major_table`
-- 

CREATE TABLE `major_table` (
  `MajorID` varchar(9) NOT NULL,
  `MajorName` text NOT NULL,
  PRIMARY KEY  (`MajorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `major_table`
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
  `Insert` tinyint(1) NOT NULL,
  `Update` tinyint(1) NOT NULL,
  `Delete` tinyint(1) NOT NULL,
  `SuperUser` tinyint(1) NOT NULL,
  `Email` text NOT NULL,
  `Telephone` varchar(12) NOT NULL,
  `StatusID` tinyint(1) NOT NULL,
  PRIMARY KEY  (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- dump ตาราง `permission_table`
-- 

INSERT INTO `permission_table` VALUES (1, 'admin', '28112531', '', 'ธนกฤต', 'อองกุลนะ', 1, 1, 1, 1, 1, 'l3eethoven@me.com', '0869319312', 1);
INSERT INTO `permission_table` VALUES (2, 'test', '1234', '', 'Tanakritt', 'Ongkulna', 1, 1, 1, 1, 0, 'ddd@ddd.com', '0819515252', 0);
INSERT INTO `permission_table` VALUES (3, 'test2', '1234', '', 'not', 'active', 0, 1, 1, 1, 0, 'ddd@ddd.com', '123456798', 1);
INSERT INTO `permission_table` VALUES (6, 'test4', '1234', '', 'asdasd', 'asddasd', 0, 1, 1, 1, 0, 'ddd@ddd.com', '12345668', 1);
INSERT INTO `permission_table` VALUES (5, 'admin2', '1234', '', 'myadmin', 'admin', 0, 0, 0, 0, 1, 'ddd@ddd.com', '055403354', 0);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `teaassgn_table`
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
-- dump ตาราง `teaassgn_table`
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
-- โครงสร้างตาราง `teacher_table`
-- 

CREATE TABLE `teacher_table` (
  `TeacherID` varchar(7) NOT NULL,
  `TeacherTitle` varchar(10) NOT NULL,
  `TeacherName` varchar(50) NOT NULL,
  `TeacherLastname` varchar(50) NOT NULL,
  PRIMARY KEY  (`TeacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `teacher_table`
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
