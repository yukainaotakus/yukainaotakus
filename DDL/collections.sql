/*
 Navicat Premium Data Transfer

 Source Server         : cloud
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : 35.234.15.86:3306
 Source Schema         : yutaku

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 05/12/2018 15:39:14
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for collections
-- ----------------------------
DROP TABLE IF EXISTS `collections`;
CREATE TABLE `collections`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) NOT NULL COMMENT 'user id',
  `game_id` int(12) NOT NULL COMMENT 'game id',
  `created_user` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'System' COMMENT '作成者 ',
  `created_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '作成時間 ',
  `updated_user` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'System' COMMENT '更新者 ',
  `updated_date` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新日時 ',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `buchongfuShoucang`(`user_id`, `game_id`) USING BTREE COMMENT '不重复收藏'
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
