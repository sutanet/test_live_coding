/*
 Navicat Premium Data Transfer

 Source Server         : Lokal
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : test_pantona

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 28/02/2022 15:11:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (6, 'admin@mail.com', 'Yusuf Sutana', 'admin@mail.com', 'bb68b7232bb4fcba4cd6bd26b29b544f', '', '1');
INSERT INTO `users` VALUES (7, 'test1@mail.com', 'Test_0', 'test0@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');
INSERT INTO `users` VALUES (8, 'test1@mail.com', 'Test_1', 'test1@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');
INSERT INTO `users` VALUES (9, 'test1@mail.com', 'Test_2', 'test2@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');
INSERT INTO `users` VALUES (10, 'test1@mail.com', 'Test_3', 'test3@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');
INSERT INTO `users` VALUES (11, 'test1@mail.com', 'Test_4', 'test4@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');
INSERT INTO `users` VALUES (12, 'test1@mail.com', 'Test_5', 'test5@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');
INSERT INTO `users` VALUES (13, 'test1@mail.com', 'Test_6', 'test6@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');
INSERT INTO `users` VALUES (14, 'test1@mail.com', 'Test_7', 'test7@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, '1');

SET FOREIGN_KEY_CHECKS = 1;
