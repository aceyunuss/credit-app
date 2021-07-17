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

 Date: 17/07/2021 22:07:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for criteria
-- ----------------------------
DROP TABLE IF EXISTS `criteria`;
CREATE TABLE `criteria`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `weight` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of criteria
-- ----------------------------
INSERT INTO `criteria` VALUES (6, 'C1', 'Penghasilan per bulan (net)', '2021-06-17 00:00:00', 'Pian', 40);
INSERT INTO `criteria` VALUES (7, 'C2', 'Status kredit', '2021-06-17 00:00:00', 'Pian', 10);
INSERT INTO `criteria` VALUES (8, 'C3', 'Tempat usaha', '2021-06-17 00:00:00', 'Pian', 25);
INSERT INTO `criteria` VALUES (9, 'C4', 'Lama usaha', '2021-06-17 00:00:00', 'Pian', 15);
INSERT INTO `criteria` VALUES (10, 'C5', 'Pemilik usaha', '2021-06-17 00:00:00', 'Pian', 10);

-- ----------------------------
-- Table structure for criteria_index
-- ----------------------------
DROP TABLE IF EXISTS `criteria_index`;
CREATE TABLE `criteria_index`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NULL DEFAULT NULL,
  `index` int(2) NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of criteria_index
-- ----------------------------
INSERT INTO `criteria_index` VALUES (47, 6, 40, '1.000.000 - 2.000.000');
INSERT INTO `criteria_index` VALUES (48, 6, 60, '2.000.000 - 4.000.000');
INSERT INTO `criteria_index` VALUES (49, 6, 80, '4.000.000 - 6.000.000');
INSERT INTO `criteria_index` VALUES (50, 6, 100, '> 8.000.000');
INSERT INTO `criteria_index` VALUES (51, 7, 100, 'Tidak Punya Kredit Lain');
INSERT INTO `criteria_index` VALUES (52, 7, 50, 'Punya Kreditan Lain');
INSERT INTO `criteria_index` VALUES (53, 8, 100, 'Tempat Usaha Tetap / Punya Pribadi');
INSERT INTO `criteria_index` VALUES (54, 8, 50, 'Tempat Usaha Kontrak ( > 2 Tahun )');
INSERT INTO `criteria_index` VALUES (55, 8, 25, 'Tempat Usaha Kontrak ( < 2 Tahun )');
INSERT INTO `criteria_index` VALUES (56, 9, 75, '> 3 Tahun');
INSERT INTO `criteria_index` VALUES (57, 9, 50, '> 1 Tahun');
INSERT INTO `criteria_index` VALUES (58, 9, 25, '< 1 Tahun');
INSERT INTO `criteria_index` VALUES (59, 10, 100, 'Pribadi / Owner');
INSERT INTO `criteria_index` VALUES (60, 10, 50, 'Karyawan');

-- ----------------------------
-- Table structure for installment
-- ----------------------------
DROP TABLE IF EXISTS `installment`;
CREATE TABLE `installment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `items_id` int(11) NOT NULL,
  `period` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for item_criteria
-- ----------------------------
DROP TABLE IF EXISTS `item_criteria`;
CREATE TABLE `item_criteria`  (
  `citem_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NULL DEFAULT NULL,
  `criteria_id` int(11) NULL DEFAULT NULL,
  `item_weight` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`citem_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `dp` decimal(10, 2) NULL DEFAULT NULL,
  `pict` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for submission
-- ----------------------------
DROP TABLE IF EXISTS `submission`;
CREATE TABLE `submission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_number` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `nik` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `store_addr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `home_addr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `item` int(11) NULL DEFAULT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `item_pict` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `installment` int(11) NULL DEFAULT NULL,
  `installment_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `dp` decimal(10, 2) NULL DEFAULT NULL,
  `ktp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `kk` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `score` int(3) NULL DEFAULT NULL,
  `insert_date` datetime(0) NULL DEFAULT NULL,
  `review_date` datetime(0) NULL DEFAULT NULL,
  `birth_place` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `birth_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for submission_quest
-- ----------------------------
DROP TABLE IF EXISTS `submission_quest`;
CREATE TABLE `submission_quest`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) NULL DEFAULT NULL,
  `cid` int(11) NULL DEFAULT NULL,
  `cidx` int(11) NULL DEFAULT NULL,
  `cid_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `cidx_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `score` int(11) NULL DEFAULT NULL,
  `max_score` int(11) NULL DEFAULT NULL,
  `alias` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `weight` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (9, 'pian', 'pian@gmail.com', '6288778552464', 'jl bumiraya V rt 08 rw 03 no 12 kel. durensawit kec. durensawit Jakarta Timur 13440', '2008-02-25 00:00:00', 'm', '202cb962ac59075b964b07152d234b70', '2021-06-26 13:54:01', 'Konsumen', '2021-06-26 13:54:01');
INSERT INTO `user` VALUES (10, 'Staff', 'staff@gmail.com', '6285888829', 'Jl Bintara', '2021-06-09 00:00:00', 'm', '202cb962ac59075b964b07152d234b70', '2021-06-26 00:00:00', 'Staff', '2021-06-17 00:00:00');
INSERT INTO `user` VALUES (11, 'Manager', 'manager@gmail.com', '6286675545', 'Jl Bintara', '2021-06-17 00:00:00', 'm', '202cb962ac59075b964b07152d234b70', '2021-06-26 00:00:00', 'Manager', '2021-06-17 00:00:00');

SET FOREIGN_KEY_CHECKS = 1;
