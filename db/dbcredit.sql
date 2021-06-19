/*
 Navicat Premium Data Transfer

 Source Server         : local mysql
 Source Server Type    : MySQL
 Source Server Version : 100121
 Source Host           : 127.0.0.1:3306
 Source Schema         : dbcredit

 Target Server Type    : MySQL
 Target Server Version : 100121
 File Encoding         : 65001

 Date: 19/06/2021 20:19:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for adm_criteria
-- ----------------------------
DROP TABLE IF EXISTS `adm_criteria`;
CREATE TABLE `adm_criteria`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of adm_criteria
-- ----------------------------
INSERT INTO `adm_criteria` VALUES (1, 'C1', 'Status kredit', '2021-06-17 16:18:33', 'Ace');
INSERT INTO `adm_criteria` VALUES (2, 'C2', 'Penghasilan per bulan', '2021-06-17 16:18:33', 'Ace');
INSERT INTO `adm_criteria` VALUES (3, 'C3', 'DP', '2021-06-17 16:18:33', 'Ace');
INSERT INTO `adm_criteria` VALUES (4, 'C4', 'Usia badan usaha', '2021-06-17 16:18:33', 'Ace');
INSERT INTO `adm_criteria` VALUES (5, 'C5', 'Jaminan', '2021-06-17 16:18:33', 'Ace');

-- ----------------------------
-- Table structure for adm_index
-- ----------------------------
DROP TABLE IF EXISTS `adm_index`;
CREATE TABLE `adm_index`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `index` int(2) NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for adm_score
-- ----------------------------
DROP TABLE IF EXISTS `adm_score`;
CREATE TABLE `adm_score`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NULL DEFAULT NULL,
  `score` decimal(5, 0) NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for adm_user
-- ----------------------------
DROP TABLE IF EXISTS `adm_user`;
CREATE TABLE `adm_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `birthdate` datetime(0) NULL DEFAULT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `role` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of adm_user
-- ----------------------------
INSERT INTO `adm_user` VALUES (2, 'ana', 'ana@mail.com', '123123', 'jl na', '2021-06-25 00:00:00', 'm', '202cb962ac59075b964b07152d234b70', '2021-06-13 14:30:52', NULL, NULL);
INSERT INTO `adm_user` VALUES (3, '123123', 'ma@mail.com', '123', '123', '2021-06-24 00:00:00', NULL, '202cb962ac59075b964b07152d234b70', '2021-06-13 14:31:30', NULL, NULL);
INSERT INTO `adm_user` VALUES (4, 'Anathan phamx', 'm@mail.com', '444444444', 'as', '2021-07-28 00:00:00', 'f', '202cb962ac59075b964b07152d234b70', '2021-06-14 15:12:08', 'Konsumen', '2021-06-14 18:11:31');
INSERT INTO `adm_user` VALUES (5, 'mem', 'meme@mail.co', '12344444', 'aokaosk asdlkn asnd xm nnxc vmnsd cvm  ansd nas,dm na,s dcxc vmna as dfman sdmfn amsdf', '2021-06-25 00:00:00', 'f', '202cb962ac59075b964b07152d234b70', '2021-06-14 18:15:02', NULL, '2021-06-14 18:15:50');
INSERT INTO `adm_user` VALUES (6, 'pian', 'pian@gmail.com', '79797969', 'jl bumiraya', '1999-06-02 00:00:00', 'm', '202cb962ac59075b964b07152d234b70', '2021-06-19 14:59:28', NULL, '2021-06-19 14:59:28');

SET FOREIGN_KEY_CHECKS = 1;
