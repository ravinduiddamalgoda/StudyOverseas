CREATE DATABASE  IF NOT EXISTS `crm_db_1.1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `crm_db_1.1`;
-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: crm_db_1.1
-- ------------------------------------------------------
-- Server version	5.5.50

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `Appointment_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Type` tinyint(1) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Interest_course` varchar(800) NOT NULL,
  `Interest_country` varchar(800) NOT NULL,
  `Interest_intake` varchar(800) NOT NULL,
  `Customer_id` varchar(4) NOT NULL,
  PRIMARY KEY (`Appointment_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  KEY `Customer_id_idx` (`Customer_id`),
  CONSTRAINT `fk_appointment_customer_id` FOREIGN KEY (`Customer_id`) REFERENCES `prospective_customer` (`Customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_appointment_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `interested_program` varchar(255) NOT NULL,
  `interested_country` varchar(255) NOT NULL,
  `highest_qualification` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` varchar(20) NOT NULL,
  `other_info` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,'kasun','kasunniluminda@gmail.com','111111','gh','gh','gh','2024-10-29','11:00 AM - 12:00 PM','ghg','2024-10-09 17:50:21'),(2,'fd','kasunniluminda@gmail.com','sds','sdd','sds','sds','2024-10-31','11:00 AM - 12:00 PM','','2024-10-09 18:06:15'),(3,'kasun','kasunniluminda@gmail.com','11111','fdfdf','dsdsd','sdsdsd','2024-10-12','09:00 AM - 10:00 AM','sdsds','2024-10-11 01:04:14');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_inquiries`
--

DROP TABLE IF EXISTS `contact_inquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `inquiry_type` enum('complaints','suggestions','inquiry') NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_inquiries`
--

LOCK TABLES `contact_inquiries` WRITE;
/*!40000 ALTER TABLE `contact_inquiries` DISABLE KEYS */;
INSERT INTO `contact_inquiries` VALUES (4,'dfdf','kasunniluminda@gmail.com','4545','tyt','complaints','ty','2024-10-09 00:44:46'),(5,'dfdf','kasunniluminda@gmail.com','4545','tyt','complaints','ty','2024-10-09 00:44:46'),(6,'asa','kasunniluminda@gmail.com','sdsd','gnh','complaints','vbvb','2024-10-09 00:45:35'),(7,'asda','kasunniluminda@gmail.com','45454','sdsd','inquiry','sdsds','2024-10-09 00:51:14'),(8,'asda','kasunniluminda@gmail.com','45454','sdsd','inquiry','sdsds','2024-10-09 00:51:14'),(9,'sds','kasunniluminda@gmail.com','asas','as','suggestions','asa','2024-10-09 00:51:52'),(10,'kasun ','kasunniluminda@gmail.com','4545454','hgh','complaints','ghghgg','2024-10-09 01:09:21'),(11,'kasun ','kasunniluminda@gmail.com','121212','kas','suggestions','asasas','2024-10-09 01:12:14'),(12,'kasun ','kasunniluminda@gmail.com','121212','kas','suggestions','asasas','2024-10-09 01:13:54'),(13,'df','kasunniluminda@gmail.com','fgf','fgf','complaints','fgfg','2024-10-09 01:17:41'),(14,'asa','kasunniluminda@gmail.com','121','1212','complaints','12','2024-10-09 01:24:01'),(15,'asa','kasunniluminda@gmail.com','121','1212','complaints','12','2024-10-09 01:24:22'),(16,'df','kasunniluminda@gmail.com','123456','hjhj','complaints','hjhjh','2024-10-09 01:28:38'),(17,'kasunniluminda@gmail.com ','kasunniluminda@gmail.com','sdsd','sds','suggestions','sds','2024-10-09 01:30:37'),(18,'kasunniluminda@gmail.com ','kasunniluminda@gmail.com','sdsd','sds','suggestions','sds','2024-10-09 01:30:54'),(19,'kasun ','kasunniluminda@gmail.com','1212121','hjhjhjh','complaints','hjhjhj','2024-10-09 01:33:58'),(20,'kasunniluminda@gmail.com ','kasunniluminda@gmail.com','sdsdsds','sdsd','complaints','sdsd','2024-10-09 01:34:54'),(21,'kasun ','kasunniluminda@gmail.com','sdsds','sdsd','complaints','sdsdsd','2024-10-09 01:36:11'),(22,'ere','kasunniluminda@gmail.com','123456789','gggggggggg','suggestions','ggggggggggg','2024-10-09 01:37:11'),(23,'kasunniluminda@gmail.com','kasunniluminda@gmail.com','ghg','ghg','complaints','ghg','2024-10-09 01:39:05'),(24,'kasunniluminda@gmail.com ','kasunniluminda@gmail.com','4242','4','complaints','121','2024-10-09 01:39:46'),(25,'kasun Niluminda ','kasunniluminda@gmail.com','0718596857','aaaaaaaaa','suggestions','aaaaaaaaaaaa','2024-10-09 15:57:12'),(26,'abc','kasunniluminda@gmail.com','071854121','abc sub','suggestions','abc body','2024-10-09 16:07:50'),(27,'kasun ','kasunniluminda@gmail.com','071954124','asas','inquiry','assasa','2024-10-09 16:13:41'),(28,'kasunniluminda@gmail.com ','kasunniluminda@gmail.com','454584','sdsds','suggestions','dsdsdds','2024-10-09 16:17:33'),(29,'kasun','kasunniluminda@gmail.com','1212121','test','complaints','sdsds','2024-10-11 01:05:27');
/*!40000 ALTER TABLE `contact_inquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `Course_id` varchar(4) NOT NULL,
  `Course_name` varchar(700) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `Course_description` varchar(1000) NOT NULL,
  `Course_requirements` varchar(1000) NOT NULL,
  `University` varchar(800) NOT NULL,
  `Intake` varchar(800) NOT NULL,
  `Scholarship` varchar(45) DEFAULT NULL,
  `English_language_requirement` varchar(1000) NOT NULL,
  `Course_fee` varchar(45) NOT NULL,
  `Years` int(11) NOT NULL,
  PRIMARY KEY (`Course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dashboard`
--

DROP TABLE IF EXISTS `dashboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dashboard` (
  `Dash_id` varchar(4) NOT NULL,
  `Dash_name` varchar(45) NOT NULL,
  `created_date` date NOT NULL,
  `report_id` varchar(4) NOT NULL,
  `Noti_id` varchar(4) NOT NULL,
  `Appointment_id` varchar(4) NOT NULL,
  `bill_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  PRIMARY KEY (`Dash_id`),
  KEY `report_id_idx` (`report_id`),
  KEY `Noti_id_idx` (`Noti_id`),
  KEY `Appointment_id_idx` (`Appointment_id`),
  KEY `bill_id_idx` (`bill_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  CONSTRAINT `fk_dashboard_appointment_id` FOREIGN KEY (`Appointment_id`) REFERENCES `appointment` (`Appointment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dashboard_bill_id` FOREIGN KEY (`bill_id`) REFERENCES `utility_management` (`Bill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dashboard_noti_id` FOREIGN KEY (`Noti_id`) REFERENCES `notification` (`Noti_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dashboard_report_id` FOREIGN KEY (`report_id`) REFERENCES `reports` (`Report_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dashboard_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dashboard`
--

LOCK TABLES `dashboard` WRITE;
/*!40000 ALTER TABLE `dashboard` DISABLE KEYS */;
/*!40000 ALTER TABLE `dashboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `Emp_id` varchar(4) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Gender` tinyint(4) NOT NULL,
  `Age` int(11) NOT NULL,
  `Contact_no` varchar(15) NOT NULL,
  `Emp_email` varchar(100) NOT NULL,
  `Emp_password` varchar(45) NOT NULL,
  `Qualification` varchar(7000) NOT NULL,
  PRIMARY KEY (`Emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `Fb_id` varchar(4) NOT NULL,
  `Feedback` varchar(7000) NOT NULL,
  `Rate` varchar(45) NOT NULL,
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Customer_id` varchar(4) NOT NULL,
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`Fb_id`),
  KEY `Customer_id_idx` (`Customer_id`),
  CONSTRAINT `fk_feedback_customer_id` FOREIGN KEY (`Customer_id`) REFERENCES `prospective_customer` (`Customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_department`
--

DROP TABLE IF EXISTS `job_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_department` (
  `Job_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_department` varchar(45) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Salary_Range` int(11) NOT NULL,
  PRIMARY KEY (`Job_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  CONSTRAINT `fk_job_department_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_department`
--

LOCK TABLES `job_department` WRITE;
/*!40000 ALTER TABLE `job_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leave`
--

DROP TABLE IF EXISTS `leave`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leave` (
  `Le_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Date` date NOT NULL,
  `Reason` varchar(7000) NOT NULL,
  PRIMARY KEY (`Le_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  CONSTRAINT `fk_leave_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leave`
--

LOCK TABLES `leave` WRITE;
/*!40000 ALTER TABLE `leave` DISABLE KEYS */;
/*!40000 ALTER TABLE `leave` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `Msg_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Msg_name` varchar(7000) NOT NULL,
  `Msg_type` tinyint(4) NOT NULL,
  `Msg_description` varchar(4000) NOT NULL,
  `Date_sent` date NOT NULL,
  PRIMARY KEY (`Msg_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  CONSTRAINT `fk_messages_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_messages_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `Noti_id` varchar(4) NOT NULL,
  `Notification` varchar(45) NOT NULL,
  `Noti_type` varchar(45) NOT NULL,
  `Noti_time` time NOT NULL,
  `Noti_date` date NOT NULL,
  `Status` tinytext NOT NULL,
  `Appointment_id` varchar(4) NOT NULL,
  `Fb_id` varchar(4) NOT NULL,
  `Msg_id` varchar(4) NOT NULL,
  `Customer_id` varchar(4) NOT NULL,
  PRIMARY KEY (`Noti_id`),
  KEY `Appointment_id_idx` (`Appointment_id`),
  KEY `Fb_id_idx` (`Fb_id`),
  KEY `Msg_id_idx` (`Msg_id`),
  KEY `Customer_id_idx` (`Customer_id`),
  CONSTRAINT `fk_notification_appointment_id` FOREIGN KEY (`Appointment_id`) REFERENCES `appointment` (`Appointment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notification_customer_id` FOREIGN KEY (`Customer_id`) REFERENCES `prospective_customer` (`Customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notification_fb_id` FOREIGN KEY (`Fb_id`) REFERENCES `feedback` (`Fb_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notification_msg_id` FOREIGN KEY (`Msg_id`) REFERENCES `messages` (`Msg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `Payment_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Payment_name` varchar(7000) NOT NULL,
  `Payment_category` tinyint(4) NOT NULL,
  `Payment_status` tinyint(4) NOT NULL,
  `Payment_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Payment_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  CONSTRAINT `fk_payment_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payroll` (
  `Payroll_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Salary_id` varchar(4) NOT NULL,
  `Le_id` varchar(4) NOT NULL,
  `Qr_id` varchar(4) NOT NULL,
  `Report_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  PRIMARY KEY (`Payroll_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  KEY `Salary_id_idx` (`Salary_id`),
  KEY `Le_id_idx` (`Le_id`),
  KEY `Qr_id_idx` (`Qr_id`),
  KEY `Report_id_idx` (`Report_id`),
  KEY `Job_id_idx` (`Job_id`),
  CONSTRAINT `fk_payroll_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payroll_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payroll_leave_id` FOREIGN KEY (`Le_id`) REFERENCES `leave` (`Le_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payroll_qr_id` FOREIGN KEY (`Qr_id`) REFERENCES `qr` (`Qr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payroll_report_id` FOREIGN KEY (`Report_id`) REFERENCES `reports` (`Report_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payroll_salary_id` FOREIGN KEY (`Salary_id`) REFERENCES `salary` (`Salary_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payroll`
--

LOCK TABLES `payroll` WRITE;
/*!40000 ALTER TABLE `payroll` DISABLE KEYS */;
/*!40000 ALTER TABLE `payroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prospective_customer`
--

DROP TABLE IF EXISTS `prospective_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prospective_customer` (
  `Customer_id` varchar(4) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`Customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prospective_customer`
--

LOCK TABLES `prospective_customer` WRITE;
/*!40000 ALTER TABLE `prospective_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `prospective_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qr`
--

DROP TABLE IF EXISTS `qr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qr` (
  `Qr_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Qr_day` date NOT NULL,
  `Qr_time` time NOT NULL,
  PRIMARY KEY (`Qr_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  CONSTRAINT `fk_qr_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qr`
--

LOCK TABLES `qr` WRITE;
/*!40000 ALTER TABLE `qr` DISABLE KEYS */;
/*!40000 ALTER TABLE `qr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered_students`
--

DROP TABLE IF EXISTS `registered_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_students` (
  `Rs_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Fname` varchar(200) NOT NULL,
  `Lname` varchar(45) NOT NULL,
  `Age` int(2) NOT NULL,
  `Passport_no` varchar(45) NOT NULL,
  `Passp_issuedate` date NOT NULL,
  `Passp_exdate` date NOT NULL,
  `Mobile_no` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `New_email` varchar(100) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Sponsorship` tinyint(4) NOT NULL,
  `Portal_password` varchar(45) NOT NULL,
  PRIMARY KEY (`Rs_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  KEY `Job_id_idx` (`Job_id`),
  CONSTRAINT `fk_registered_students_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_registered_students_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_students`
--

LOCK TABLES `registered_students` WRITE;
/*!40000 ALTER TABLE `registered_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `registered_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `Report_id` varchar(4) NOT NULL,
  `Bill_id` varchar(4) NOT NULL,
  `Payment_id` varchar(4) NOT NULL,
  PRIMARY KEY (`Report_id`),
  KEY `Bill_id_idx` (`Bill_id`),
  KEY `Payment_id_idx` (`Payment_id`),
  CONSTRAINT `fk_reports_bill_id` FOREIGN KEY (`Bill_id`) REFERENCES `utility_management` (`Bill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reports_payment_id` FOREIGN KEY (`Payment_id`) REFERENCES `payment` (`Payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salary` (
  `Salary_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Bonus` int(11) DEFAULT NULL,
  PRIMARY KEY (`Salary_id`),
  KEY `Job_id_idx` (`Job_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  CONSTRAINT `fk_salary_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_salary_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary`
--

LOCK TABLES `salary` WRITE;
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `show_fund`
--

DROP TABLE IF EXISTS `show_fund`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `show_fund` (
  `Sfund_id` varchar(4) NOT NULL,
  `Course_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Traveling_expenses` varchar(45) NOT NULL,
  `Living_expenses` varchar(45) NOT NULL,
  `Dependents` varchar(45) NOT NULL,
  PRIMARY KEY (`Sfund_id`),
  KEY `Course_id_idx` (`Course_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  CONSTRAINT `fk_showfund_course_id` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`Course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_showfund_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `show_fund`
--

LOCK TABLES `show_fund` WRITE;
/*!40000 ALTER TABLE `show_fund` DISABLE KEYS */;
/*!40000 ALTER TABLE `show_fund` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_academic_qualification`
--

DROP TABLE IF EXISTS `student_academic_qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_academic_qualification` (
  `Aq_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Aq_name` varchar(800) NOT NULL,
  `Aq_awardingbody` varchar(600) NOT NULL,
  `Aq_start_date` date NOT NULL,
  `Aq_end_date` date NOT NULL,
  `Aq_grade` varchar(70) NOT NULL,
  PRIMARY KEY (`Aq_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  CONSTRAINT `fk_saqualification_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_academic_qualification`
--

LOCK TABLES `student_academic_qualification` WRITE;
/*!40000 ALTER TABLE `student_academic_qualification` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_academic_qualification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_application`
--

DROP TABLE IF EXISTS `student_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_application` (
  `Appl_id` varchar(4) NOT NULL,
  `Course_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Appl_name` varchar(7000) NOT NULL,
  `Appl_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`Appl_id`),
  KEY `Course_id_idx` (`Course_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  KEY `Job_id_idx` (`Job_id`),
  CONSTRAINT `fk_application_course_id` FOREIGN KEY (`Course_id`) REFERENCES `courses` (`Course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_application_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_application_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_application_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_application`
--

LOCK TABLES `student_application` WRITE;
/*!40000 ALTER TABLE `student_application` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_documents`
--

DROP TABLE IF EXISTS `student_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_documents` (
  `Studdoc_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Doc_name` varchar(5000) NOT NULL,
  `Doc_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`Studdoc_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  CONSTRAINT `fk_documents_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_documents_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_documents`
--

LOCK TABLES `student_documents` WRITE;
/*!40000 ALTER TABLE `student_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_work_experiences`
--

DROP TABLE IF EXISTS `student_work_experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_work_experiences` (
  `Pex_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Pex_name` varchar(3000) NOT NULL,
  `Pex_employer` varchar(5000) NOT NULL,
  `Pex_start_date` date NOT NULL,
  `Pex_end_date` date DEFAULT NULL,
  `Pex_responsibilities` varchar(7000) NOT NULL,
  PRIMARY KEY (`Pex_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  CONSTRAINT `fk_sworkexperience_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_work_experiences`
--

LOCK TABLES `student_work_experiences` WRITE;
/*!40000 ALTER TABLE `student_work_experiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_work_experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `otp` varchar(6) DEFAULT NULL,
  `otp_created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'kasun','niluminda','kasunniluminda@gmail.com','$2y$10$sB79pCvuj1xYzwO8D1U5YOq6dtsLEp.B6esXP/YA5S5CFPzkZVzte','admin','2024-09-21 10:20:58','827009','2024-10-05 02:31:25'),(2,'Snajula','Hashendra','sanjula@gmail.com','$2y$10$K/hubBumrfvuHE192./VpeIdP66yMQf/v7E3xqCOq/SbbSitCHEUy','student','2024-09-26 17:11:12',NULL,NULL),(3,'chaminda','ramanayaka','chaminda@gmail.com','$2y$10$7pVbH4tq0xxmDcJld9i8j.vev6n8vgNHVcxOGOS2tISYpT2BxOfdC','student','2024-09-26 18:07:34',NULL,NULL),(4,'Sadeepa','Malshan','sadeepa@gmail.com','$2y$10$AhbQNiSqNAuO0es3wpth6OYDS3kAEwpMzA8TEmBpgj2f3Nr499Emm','student','2024-10-04 01:05:14',NULL,NULL),(5,'Nuwan','Dammika','nuwan@gmail.com','$2y$10$0G6THmN3iWapy/Nw6hQ5l.X2/GN26USdvxiuDLLQDyA/2xnERW2Za','student','2024-10-04 01:26:10',NULL,NULL),(6,'chalani','shehara','chalani@gmail.com','$2y$10$7GW0cXqgg7eLFctpx3RwLeu7MyT.2X0vKN.o.jt0g/3MrUFrpQ96C','student','2024-10-06 16:29:00',NULL,NULL),(7,'sandaya','kumari','sandaya@gmail.com','$2y$10$dERvWOM1HO37ojfHPkivhuGr8B2zlkZf.a3/2Oq3M7lk0onw2/pk2','student','2024-10-06 16:41:34',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utility_management`
--

DROP TABLE IF EXISTS `utility_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utility_management` (
  `Bill_id` varchar(4) NOT NULL,
  `Bill_name` varchar(4500) NOT NULL,
  `Bill_category` tinyint(4) NOT NULL,
  `Bill_amount` decimal(10,2) NOT NULL,
  `Bill_date` date NOT NULL,
  `Bill_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`Bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utility_management`
--

LOCK TABLES `utility_management` WRITE;
/*!40000 ALTER TABLE `utility_management` DISABLE KEYS */;
/*!40000 ALTER TABLE `utility_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visa`
--

DROP TABLE IF EXISTS `visa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visa` (
  `Visa_id` varchar(4) NOT NULL,
  `Rs_id` varchar(4) NOT NULL,
  `Job_id` varchar(4) NOT NULL,
  `Emp_id` varchar(4) NOT NULL,
  `Visa_name` varchar(4000) NOT NULL,
  `Visa_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`Visa_id`),
  KEY `Rs_id_idx` (`Rs_id`),
  KEY `Job_id_idx` (`Job_id`),
  KEY `Emp_id_idx` (`Emp_id`),
  CONSTRAINT `fk_visa_emp_id` FOREIGN KEY (`Emp_id`) REFERENCES `employees` (`Emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_visa_job_id` FOREIGN KEY (`Job_id`) REFERENCES `job_department` (`Job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_visa_rs_id` FOREIGN KEY (`Rs_id`) REFERENCES `registered_students` (`Rs_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visa`
--

LOCK TABLES `visa` WRITE;
/*!40000 ALTER TABLE `visa` DISABLE KEYS */;
/*!40000 ALTER TABLE `visa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'crm_db_1.1'
--

--
-- Dumping routines for database 'crm_db_1.1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-11  6:50:41
