/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : selena

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-06-29 13:17:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Some costetics shits');
INSERT INTO `category` VALUES ('5', 'Glue');
INSERT INTO `category` VALUES ('6', 'Lipstik');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `shiping_address` text,
  `payed` tinyint(1) DEFAULT '1',
  `total` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1530123767 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1530037075', '2', 'as', '', '4', '43600');
INSERT INTO `orders` VALUES ('1530123766', '2', '', '', '3', '429323');

-- ----------------------------
-- Table structure for order_row
-- ----------------------------
DROP TABLE IF EXISTS `order_row`;
CREATE TABLE `order_row` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_row
-- ----------------------------
INSERT INTO `order_row` VALUES ('1530037075', '1529674556', '3', '30.00');
INSERT INTO `order_row` VALUES ('1530037075', '1529675058', '1', '5.00');
INSERT INTO `order_row` VALUES ('1530037075', '1529675113', '1', '200.00');
INSERT INTO `order_row` VALUES ('1530037075', '1530005064', '1', '1.00');
INSERT INTO `order_row` VALUES ('1530123766', '1529674556', '1', '10.00');
INSERT INTO `order_row` VALUES ('1530123766', '1529675058', '1', '5.00');
INSERT INTO `order_row` VALUES ('1530123766', '1529675113', '10', '4000.00');
INSERT INTO `order_row` VALUES ('1530123766', '1530005064', '1', '1.00');
INSERT INTO `order_row` VALUES ('1530123766', '1530111782', '1', '77.23');

-- ----------------------------
-- Table structure for page
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) DEFAULT NULL,
  `text` text,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES ('1', 'payed_done', '<span style=\"color: rgb(0, 0, 0); font-family: Helvetica, &quot;Open Sans&quot;, Arial, sans-serif, Verdana; font-size: 16px;\">We earnestly acknowledge your payment of Rs. XXXXX, which we received from you through cheque no: CXCXCX dated (date) for the recompense of your withstanding amount for the last month’s deal with our company.</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica, &quot;Open Sans&quot;, Arial, sans-serif, Verdana; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica, &quot;Open Sans&quot;, Arial, sans-serif, Verdana; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica, &quot;Open Sans&quot;, Arial, sans-serif, Verdana; font-size: 16px;\">With the payment of Rs. XXXXX, we would like to inform that you have paid all your debts and there is no balance amount remaining for payment. We sincerely appreciate your promptness regarding all payments from your side. You have always fulfilled the promises made by you regarding deadlines and payments. We admire your sincerity and dedication that you have always maintained as a customer.&nbsp;</span><br style=\"color: rgb(0, 0, 0); font-family: Helvetica, &quot;Open Sans&quot;, Arial, sans-serif, Verdana; font-size: 16px;\"><br style=\"color: rgb(0, 0, 0); font-family: Helvetica, &quot;Open Sans&quot;, Arial, sans-serif, Verdana; font-size: 16px;\"><span style=\"color: rgb(0, 0, 0); font-family: Helvetica, &quot;Open Sans&quot;, Arial, sans-serif, Verdana; font-size: 16px;\">We would like to take this opportunity to thank you for being a valued customer with us for so long. We look forward to continue being in business with you in the long run.</span>', 'You payment recived');
INSERT INTO `page` VALUES ('2', 'empty_cart', 'Shopping Cart Is Empty', 'Cart is empty');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `text` text,
  `price` decimal(10,2) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `folder` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1530111783 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1529674556', 'Bootle', 'Vue (pronounced /vjuː/, like view) is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is ea', 'If you’d like to learn more about Vue before diving in, we created a video walking through the core principles and a sample project.\r\n\r\nIf you are an experienced frontend developer and want to know how Vue compares to other libraries/frameworks, check out the Comparison with Other Frameworks.', '10.00', null, '', '1', null);
INSERT INTO `products` VALUES ('1529675058', 'Lipstik', '<h3 style=\"margin-top: 15px; margin-bottom: 15px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">914 translation by H. Rackham</h3><p style=\"margin-bottom: 15px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; color: rgb(0', '<h3 style=\"margin-top: 15px; margin-bottom: 15px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">914 translation by H. Rackham</h3><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><h3 style=\"margin-top: 15px; margin-bottom: 15px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"margin-bottom: 15px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; letter-spacing: normal;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><h3 style=\"margin-top: 15px; margin-bottom: 15px; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1914 translation by H. Rackham</h3>', '5.00', null, '`', '6', null);
INSERT INTO `products` VALUES ('1529675113', 'Super Product', 'The official guide assumes intermediate level knowledge of HTML, CSS, and JavaScript. If you are totally new to frontend development, it might not be the best idea to jump right into a framework as your first step - grasp the basics then come back! Prior', 'Vue (pronounced /vjuː/, like view) is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is easy to pick up and integrate with other libraries or existing projects. On the other hand, Vue is also perfectly capable of powering sophisticated Single-Page Applications when used in combination with modern tooling and supporting libraries.', '200.00', null, '', '5', null);
INSERT INTO `products` VALUES ('1530005064', 'Glue', '<p>DI.FM is the #1 online radio network for Electronic Music fans around the globe</p><div>.\r\nOne of the first online radio networks to go live in 1999,</div><div>&nbsp;DI.FM has grown into a destination and lifestyle for over 3 million unique listeners w', '<div style=\"text-align: left;\"><ol><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Pellentesque ut lorem vel turpis ornare rhoncus varius vel ante.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Pellentesque convallis mauris porttitor metus congue, quis iaculis leo pulvinar.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Nunc feugiat leo id risus vehicula blandit.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Phasellus vel dolor ac ligula malesuada porttitor.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Nullam consectetur nibh sit amet risus ornare, quis tincidunt est vehicula.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Pellentesque vel erat maximus, bibendum eros eget, interdum felis.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Sed at augue id velit molestie sollicitudin non vehicula diam.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Ut tincidunt magna varius felis volutpat lacinia.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Quisque quis mi cursus, cursus ex vitae, eleifend tortor.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Donec imperdiet ligula vel ligula lobortis molestie.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Pellentesque ultricies lectus at augue efficitur, quis interdum mauris dictum.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Etiam imperdiet enim at quam cursus lacinia.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">In ut diam at massa cursus facilisis ut vitae nunc.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">Integer malesuada lectus vitae est mattis, sit amet scelerisque leo commodo.</span></font></li><li style=\"\"><font color=\"#000000\" face=\"Open Sans, Arial, sans-serif\"><span style=\"font-size: 14px;\">In finibus ipsum eu varius aliquam.</span></font></li></ol></div>', '1.00', null, 'https://www.youtube.com/watch?v=WF34N4gJAKE', '5', null);
INSERT INTO `products` VALUES ('1530111782', 'Best glue forever', '<span style=\"color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap;\">This video is part 1 of 3 of the preview of my Vue.js online course, </span><div><span style=\"color: rgb(17, 17, 17); font-family: Roboto', '<span style=\"color: rgb(17, 17, 17); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap;\">I\'m an experiened dev, never used vue.js and just from you videos I created a major website in a few days using it. I\'ve used Angular and Jquery before and this is really awesome. Great videos!~ Was considering react but this really gets the job done FAST.﻿</span><br>', '77.23', null, 'https://www.youtube.com/watch?v=utJGnK9D_UQ', '5', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company_num` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, null, '1268889823', '1530123783', '1', 'Admin', 'istrator', 'ADMIN', '0', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('2', '127.0.0.1', 'mauguzun@gmail.com', '$2y$08$SYKMJli4EQnkJs5.RQDap.V0zKKcSv8qkxitpPWJp3mqIJ/6nh1da', null, 'mauguzun@gmail.com', '03a44316d26b41ede9e44be88e75af7eb6e8b903', null, null, null, '1529258762', '1530123319', '1', 'denis', 'penis', '', '13241234123', '', 'Lielvardes iela 138,12', '1082', 'Riga', 'Latvija', 'some comment<div>some more and more</div><div>more an more&nbsp;</div><div><br></div>');
INSERT INTO `users` VALUES ('3', '127.0.0.1', 'deniss@denis.com', '$2y$08$868DRrdyrOYb3hiPjvYrwOYhYigwxyCPV0fJAiIPyacTKDsVmzu92', null, 'deniss@denis.com', '0cddba96b697da3249846dc3cc98ee2b99527ea3', null, null, null, '1529472914', null, '0', 'denis', 'asdf', 'asdf', 'asdf', '', '', '', '', null, null);

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', '1', '1');
INSERT INTO `users_groups` VALUES ('2', '1', '2');
INSERT INTO `users_groups` VALUES ('3', '2', '2');
INSERT INTO `users_groups` VALUES ('4', '3', '2');
SET FOREIGN_KEY_CHECKS=1;
