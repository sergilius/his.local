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

/*Table structure for table `phones_preview` */

DROP TABLE IF EXISTS `phones_preview`;

CREATE TABLE `phones_preview` (
  `id` varchar(100) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `snippet` text,
  `imageUrl` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `phones_preview` */

insert  into `phones_preview`(`id`,`name`,`snippet`,`imageUrl`) values ('dell-streak-7','Dell Streak 7','Introducing Dell&trade Streak 7. Share photos, videos and movies together. It\'s small enough to carry around, big enough to gather around.','img/phones/dell-streak-7.0.jpg'),('dell-venue','Dell Venue','The Dell Venue; Your Personal Express Lane to Everything','img/phones/dell-venue.0.jpg'),('droid-2-global-by-motorola','DROID&trade 2 Global by Motorola','The first smartphone with a 1.2 GHz processor and global capabilities.','img/phones/droid-2-global-by-motorola.0.jpg'),('droid-pro-by-motorola','DROID&trade Pro by Motorola','The next generation of DOES.','img/phones/droid-pro-by-motorola.0.jpg'),('lg-axis','LG Axis','Android Powered, Google Maps Navigation, 5 Customizable Home Screens','img/phones/lg-axis.0.jpg'),('motorola-atrix-4g','MOTOROLA ATRIX&trade 4G','MOTOROLA ATRIX 4G the world\'s most powerful smartphone.','img/phones/motorola-atrix-4g.0.jpg'),('motorola-bravo-with-motoblur','MOTOROLA BRAVO&trade with MOTOBLUR&trade','An experience to cheer about.','img/phones/motorola-bravo-with-motoblur.0.jpg'),('motorola-charm-with-motoblur','Motorola CHARM&trade with MOTOBLUR&trade','Motorola CHARM fits easily in your pocket or palm.  Includes MOTOBLUR service.','img/phones/motorola-charm-with-motoblur.0.jpg'),('motorola-defy-with-motoblur','Motorola DEFY&trade with MOTOBLUR&trade','Are you ready for everything life throws your way?','img/phones/motorola-defy-with-motoblur.0.jpg'),('motorola-xoom','MOTOROLA XOOM&trade','The Next, Next Generation\n\nExperience the future with MOTOROLA XOOM, the world\'s first tablet powered by Android 3.0 (Honeycomb).','img/phones/motorola-xoom.0.jpg'),('motorola-xoom-with-wi-fi','Motorola XOOM&trade with Wi-Fi','The Next, Next Generation\r\n\r\nExperience the future with Motorola XOOM with Wi-Fi, the world\'s first tablet powered by Android 3.0 (Honeycomb).','img/phones/motorola-xoom-with-wi-fi.0.jpg'),('nexus-s','Nexus S','Fast just got faster with Nexus S. A pure Google experience, Nexus S is the first phone to run Gingerbread (Android 2.3), the fastest version of Android yet.','img/phones/nexus-s.0.jpg'),('samsung-galaxy-tab','Samsung Galaxy Tab&trade','Feel Free to Tab&trade. The Samsung Galaxy Tab&trade brings you an ultra-mobile entertainment experience through its 7&rdquo; display, high-power processor and Adobe&reg; Flash&reg; Player compatibility.','img/phones/samsung-galaxy-tab.0.jpg'),('samsung-gem','Samsung Gem&trade','The Samsung Gem&trade brings you everything that you would expect and more from a touch display smart phone &ndash; more apps, more features and a more affordable price.','img/phones/samsung-gem.0.jpg'),('samsung-mesmerize-a-galaxy-s-phone','Samsung Mesmerize&trade a Galaxy S&trade phone','The Samsung Mesmerize&trade delivers a cinema quality experience like you\'ve never seen before. Its innovative 4&rdquo; touch display technology provides rich picture brilliance,even outdoors','img/phones/samsung-mesmerize-a-galaxy-s-phone.0.jpg'),('samsung-showcase-a-galaxy-s-phone','Samsung Showcase&trade a Galaxy S&trade phone','The Samsung Showcase&trade delivers a cinema quality experience like you\'ve never seen before. Its innovative 4&rdquo; touch display technology provides rich picture brilliance, even outdoors','img/phones/samsung-showcase-a-galaxy-s-phone.0.jpg'),('samsung-transform','Samsung Transform&trade','The Samsung Transform&trade brings you a fun way to customize your Android powered touch screen phone to just the way you like it through your favorite themed &ldquo;Sprint ID Service Pack&rdquo;.','img/phones/samsung-transform.0.jpg'),('sanyo-zio','SANYO ZIO','The Sanyo Zio by Kyocera is an Android smartphone with a combination of ultra-sleek styling, strong performance and unprecedented value.','img/phones/sanyo-zio.0.jpg'),('t-mobile-g2','T-Mobile G2','The T-Mobile G2 with Google is the first smartphone built for 4G speeds on T-Mobile\'s new network. Get the information you need, faster than you ever thought possible.','img/phones/t-mobile-g2.0.jpg'),('t-mobile-mytouch-4g','T-Mobile myTouch 4G','The T-Mobile myTouch 4G is a premium smartphone designed to deliver blazing fast 4G speeds so that you can video chat from practically anywhere, with or without Wi-Fi.','img/phones/t-mobile-mytouch-4g.0.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
