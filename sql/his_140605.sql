/*
SQLyog Enterprise v10.42 
MySQL - 5.5.27 : Database - his
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`his` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `his`;

/*Table structure for table `catalog` */

DROP TABLE IF EXISTS `catalog`;

CREATE TABLE `catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_name` varchar(256) DEFAULT NULL,
  `aliase` varchar(256) DEFAULT NULL,
  `title_page` varchar(256) DEFAULT NULL,
  `path` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `catalog` */

insert  into `catalog`(`id`,`title_name`,`aliase`,`title_page`,`path`) values (1,'Каталог','catalog','Каталог','/catalog');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_name` varchar(256) DEFAULT NULL,
  `aliase` varchar(256) DEFAULT NULL,
  `title_page` varchar(256) DEFAULT NULL,
  `path` varchar(256) DEFAULT NULL,
  `position` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`title_name`,`aliase`,`title_page`,`path`,`position`) values (1,'Магазины','shops','Магазины','/shops',1),(2,'Доставка и оплата','shipment_payment','Доставка и оплата','/shipment_payment',2),(3,'Гарантия','warranty','Гарантия','/warranty',3),(4,'Контакты','contact','Контакты','/contact',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
