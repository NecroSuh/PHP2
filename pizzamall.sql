/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - pizzamall
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pizzamall` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pizzamall`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `email` varchar(30) NOT NULL,
  `pizzaname` varchar(20) NOT NULL,
  `size` char(1) NOT NULL,
  `qty` int(3) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`email`,`pizzaname`,`size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

insert  into `cart`(`email`,`pizzaname`,`size`,`qty`,`price`) values 
('tomato@abc.com','더블크러스트 치즈멜팅롤','S',2,56000),
('tomato@abc.com','슈퍼시드 앤 스테이크롤','S',3,84000),
('tomato@abc.com','치즈 케이크롤','L',2,67800);

/*Table structure for table `mypizza` */

DROP TABLE IF EXISTS `mypizza`;

CREATE TABLE `mypizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `large` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mypizza` */

insert  into `mypizza`(`id`,`name`,`large`,`small`,`photo`) values 
(1,'치즈 케이크롤',33900,28000,'pizza1.jpg'),
(2,'치즈 앤 그릴드 비프',33900,28000,'pizza2.jpg'),
(3,'슈퍼시드 앤 스테이크롤',33900,28000,'pizza3.jpg'),
(4,'더블크러스트 치즈멜팅롤',33900,28000,'pizza4.jpg'),
(5,'와규 앤 비스테카',33900,28000,'pizza5.jpg'),
(6,'킹 프론 씨푸드',33900,28000,'pizza6.jpg'),
(7,'직화스테이크',33900,28000,'pizza7.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passwd` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regdate` date NOT NULL,
  `point` int(11) NOT NULL,
  `telno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`email`,`name`,`passwd`,`regdate`,`point`,`telno`) values 
('cherry@abc.com','Cherry','123','2022-05-10',1000,'01087765566'),
('lemon@abc.com','Lemon','123','2022-04-15',1000,NULL),
('tomato@abc.com','Tomato','123','2022-05-10',1000,'01087764987');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
