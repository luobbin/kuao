/*
 Navicat Premium Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : kuao

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 13/06/2022 09:08:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fanli_mingxi
-- ----------------------------
DROP TABLE IF EXISTS `fanli_mingxi`;
CREATE TABLE `fanli_mingxi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT 0 COMMENT '用户id',
  `shijian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '明细事件',
  `money` double(10, 2) NULL DEFAULT 0.00 COMMENT '商城奖励金额',
  `jifen` int(5) NOT NULL DEFAULT 0 COMMENT '奖励积分',
  `source` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '明细说明',
  `relate_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '关联订单id',
  `leave_money` double(10, 2) NULL DEFAULT 0.00 COMMENT '商城奖励累计金额',
  `jifenbao` double(10, 2) NOT NULL DEFAULT 0.00 COMMENT '奖励集分宝',
  `leave_jifenbao` double(10, 2) NOT NULL DEFAULT 0.00 COMMENT '累计集分宝',
  `leave_jifen` int(11) NOT NULL DEFAULT 0 COMMENT '累计积分',
  `income_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '（收入类型)：0被动收入 1自购收入 2分享收入 -1:提现/退款',
  `addtime` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uid_shijian_relate_id`(`uid`, `shijian`, `relate_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `shijian`(`shijian`) USING BTREE,
  INDEX `relate_id`(`relate_id`) USING BTREE,
  INDEX `jifenbao`(`jifenbao`) USING BTREE,
  INDEX `income_type`(`income_type`) USING BTREE,
  INDEX `uid_income_type`(`uid`, `income_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
