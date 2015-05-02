/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : web-test

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-04 21:41:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `author` text NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'Don Quixote', 'Miguel De Cervantes');
INSERT INTO `books` VALUES ('2', 'Pilgrim\'s Progress', 'John Bunyan');
INSERT INTO `books` VALUES ('3', 'Robinson Crusoe', 'Daniel Defoe');
INSERT INTO `books` VALUES ('4', 'Gulliver\'s Travels', 'Jonathan Swift');
INSERT INTO `books` VALUES ('5', 'Tom Jones', 'Henry Fielding');
INSERT INTO `books` VALUES ('6', 'Clarissa', 'Samuel Richardson');
INSERT INTO `books` VALUES ('7', 'Tristram Shandy', 'Laurence Sterne');
INSERT INTO `books` VALUES ('8', 'Dangerous Liaisons', 'Pierre Choderlos De Laclos');
INSERT INTO `books` VALUES ('9', 'Emma', 'Jane Austen');
INSERT INTO `books` VALUES ('10', 'Frankenstein', 'Mary Shelley');
INSERT INTO `books` VALUES ('11', 'Nightmare Abbey', 'Thomas Love Peacock');
INSERT INTO `books` VALUES ('12', 'The Black Sheep', 'Honore De Balzac');
INSERT INTO `books` VALUES ('13', 'The Charterhouse of Parma', 'Stendhal');
INSERT INTO `books` VALUES ('14', 'The Count of Monte Christo', 'Alexandre Dumas');
INSERT INTO `books` VALUES ('15', 'Sybil', 'Benjamin Disraeli');
INSERT INTO `books` VALUES ('16', 'David Copperfield', 'Charles Dickens');
INSERT INTO `books` VALUES ('17', 'Wuthering Heights', 'Emily Bronte');
INSERT INTO `books` VALUES ('18', 'Jane Eyre', 'Charlotte Bronte');
INSERT INTO `books` VALUES ('19', 'Vanity Fair', 'William Makepeace Thackeray');
INSERT INTO `books` VALUES ('20', 'The Scarlet Letter', 'Nathaniel Hawthorne');

-- ----------------------------
-- Table structure for `checkouts`
-- ----------------------------
DROP TABLE IF EXISTS `checkouts`;
CREATE TABLE `checkouts` (
  `checkout_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`checkout_id`),
  KEY `book_id` (`book_id`),
  KEY `timestamp` (`timestamp`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of checkouts
-- ----------------------------
INSERT INTO `checkouts` VALUES ('1', '2014-03-18 00:00:00', 'O\'Hara', 'ohara@example.com', '(855)123456789', '1');
INSERT INTO `checkouts` VALUES ('2', '2014-03-19 00:00:00', 'Jackson', 'jackson@example.com', '(65)12345678', '1');
INSERT INTO `checkouts` VALUES ('3', '2014-03-21 00:00:00', 'Aiden', 'aiden@example.com', '(44)12345678', '2');
INSERT INTO `checkouts` VALUES ('4', '2014-03-21 06:00:00', 'Liam', 'liam@example.com', '(1)12345678', '3');
INSERT INTO `checkouts` VALUES ('20', '2015-03-04 15:39:55', 'sokna', 'pheaktragames@gmail.com', '(122)1211243455', '1');
INSERT INTO `checkouts` VALUES ('21', '2015-03-04 15:40:14', 'sokna', 'pheaktragames@gmail.com', '(222)12112434551', '1');
INSERT INTO `checkouts` VALUES ('22', '2015-03-04 15:40:22', 'sokna', 'sothea.sociologist@gmail.com', '(222)11111111111', '1');
