/*
 Navicat Premium Data Transfer

 Source Server         : BigCool
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : tyzejmym_faucet

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 21/10/2024 17:47:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for amba_group
-- ----------------------------
DROP TABLE IF EXISTS `amba_group`;
CREATE TABLE `amba_group`  (
  `group_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `group_chat_message` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_on` datetime NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 801 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of amba_group
-- ----------------------------
INSERT INTO `amba_group` VALUES (564, 5, '/RAIN 23 TO 2', '2024-10-19 01:32:50', 'Indonesia');
INSERT INTO `amba_group` VALUES (565, 5, '/RAIN 21 BTC 2', '2024-10-19 01:33:07', 'Indonesia');
INSERT INTO `amba_group` VALUES (566, 5, '<br> <b>RAINMASTER</b> <br>Alveraz RAINED 21 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-19 01:33:07', 'Indonesia');
INSERT INTO `amba_group` VALUES (567, 5, '/TIP 10 TRX harry', '2024-10-19 01:33:43', 'Indonesia');
INSERT INTO `amba_group` VALUES (568, 5, '/TIP 20 TRX harry', '2024-10-19 01:41:32', 'Indonesia');
INSERT INTO `amba_group` VALUES (569, 5, '/TIP 21 TRX harry', '2024-10-19 01:42:39', 'Indonesia');
INSERT INTO `amba_group` VALUES (570, 5, '/TIP 21 TRX harry', '2024-10-19 01:43:02', 'Indonesia');
INSERT INTO `amba_group` VALUES (571, 5, '/TIP 21 TRX harry', '2024-10-19 01:44:43', 'Indonesia');
INSERT INTO `amba_group` VALUES (572, 5, '/TIP 21 TRX harry', '2024-10-19 01:52:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (573, 5, '/TIP 20 TRX harry', '2024-10-19 01:57:20', 'Indonesia');
INSERT INTO `amba_group` VALUES (574, 5, '/TIP 21 TRX harry', '2024-10-19 01:59:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (575, 5, '/TIP 21 TRX harry', '2024-10-19 01:59:26', 'Indonesia');
INSERT INTO `amba_group` VALUES (576, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 21 21 to TRX<br>', '2024-10-19 01:59:26', 'Indonesia');
INSERT INTO `amba_group` VALUES (577, 5, '/TIP 21 TRX harry', '2024-10-19 02:00:53', 'Indonesia');
INSERT INTO `amba_group` VALUES (578, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 21 TRX to harry<br>', '2024-10-19 02:00:53', 'Indonesia');
INSERT INTO `amba_group` VALUES (579, 5, '/TIP 78 TRX Johns Kevin', '2024-10-19 02:01:10', 'Indonesia');
INSERT INTO `amba_group` VALUES (580, 5, '/TIP 20 TRX Johns Kevin', '2024-10-19 02:01:55', 'Indonesia');
INSERT INTO `amba_group` VALUES (581, 5, '/TIP 20 TRX Johns Kevin', '2024-10-19 02:01:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (582, 5, '/TIP 23 BTC harry', '2024-10-19 02:06:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (583, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 23 BTC to harry<br>', '2024-10-19 02:06:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (584, 5, '/RAIN 23 BTC 1', '2024-10-19 02:08:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (585, 5, '<br> <b>RAINMASTER</b> <br>Alveraz RAINED 23 BTC to 1 random users! <br>Lucky Person1 : harry<br>', '2024-10-19 02:08:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (586, 5, '/RAIN 32 XAU 2', '2024-10-19 02:08:40', 'Indonesia');
INSERT INTO `amba_group` VALUES (587, 5, '<br> <b>RAINMASTER</b> <br>Alveraz RAINED 32 XAU to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-19 02:08:40', 'Indonesia');
INSERT INTO `amba_group` VALUES (588, 5, '/TIP 23 BTC harry', '2024-10-19 02:09:14', 'Indonesia');
INSERT INTO `amba_group` VALUES (589, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 23 BTC to harry<br>', '2024-10-19 02:09:14', 'Indonesia');
INSERT INTO `amba_group` VALUES (590, 16, '/RAIN 32 ASD 2', '2024-10-19 02:10:31', 'Victnames');
INSERT INTO `amba_group` VALUES (591, 16, '<br> <b>RAINMASTER</b> <br>harry RAINED 32 ASD to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-19 02:10:31', 'Victnames');
INSERT INTO `amba_group` VALUES (592, 16, '/TIP 32 BTC Alveraz', '2024-10-19 02:10:50', 'Victnames');
INSERT INTO `amba_group` VALUES (593, 16, '<br> <b>TIP MASTER</b> <br>harry GIVE 32 BTC to Alveraz<br>', '2024-10-19 02:10:50', 'Victnames');
INSERT INTO `amba_group` VALUES (594, 16, '/TIP 32 BTC Johns Kevin', '2024-10-19 02:11:11', 'Victnames');
INSERT INTO `amba_group` VALUES (595, 5, '1', '2024-10-19 02:12:54', 'Indonesia');
INSERT INTO `amba_group` VALUES (596, 5, '2', '2024-10-19 02:12:55', 'Indonesia');
INSERT INTO `amba_group` VALUES (597, 5, '3', '2024-10-19 02:12:55', 'Indonesia');
INSERT INTO `amba_group` VALUES (598, 5, '4', '2024-10-19 02:12:55', 'Indonesia');
INSERT INTO `amba_group` VALUES (599, 5, '5', '2024-10-19 02:12:56', 'Indonesia');
INSERT INTO `amba_group` VALUES (600, 5, '6', '2024-10-19 02:12:56', 'Indonesia');
INSERT INTO `amba_group` VALUES (601, 5, '7', '2024-10-19 02:12:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (602, 5, '9', '2024-10-19 02:12:58', 'Indonesia');
INSERT INTO `amba_group` VALUES (603, 5, '10', '2024-10-19 02:13:00', 'Indonesia');
INSERT INTO `amba_group` VALUES (604, 5, '11', '2024-10-19 02:13:02', 'Indonesia');
INSERT INTO `amba_group` VALUES (605, 5, '12', '2024-10-19 02:13:03', 'Indonesia');
INSERT INTO `amba_group` VALUES (606, 5, '13', '2024-10-19 02:13:03', 'Indonesia');
INSERT INTO `amba_group` VALUES (607, 5, '14', '2024-10-19 02:13:04', 'Indonesia');
INSERT INTO `amba_group` VALUES (608, 5, '15', '2024-10-19 02:13:05', 'Indonesia');
INSERT INTO `amba_group` VALUES (609, 5, '16', '2024-10-19 02:13:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (610, 5, '17', '2024-10-19 02:13:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (611, 5, '18', '2024-10-19 02:13:07', 'Indonesia');
INSERT INTO `amba_group` VALUES (612, 5, '19', '2024-10-19 02:13:08', 'Indonesia');
INSERT INTO `amba_group` VALUES (613, 5, '20', '2024-10-19 02:13:09', 'Indonesia');
INSERT INTO `amba_group` VALUES (614, 5, '21', '2024-10-19 02:13:10', 'Indonesia');
INSERT INTO `amba_group` VALUES (615, 5, '22', '2024-10-19 02:13:11', 'Indonesia');
INSERT INTO `amba_group` VALUES (616, 5, '23', '2024-10-19 02:13:12', 'Indonesia');
INSERT INTO `amba_group` VALUES (617, 5, '24', '2024-10-19 02:13:13', 'Indonesia');
INSERT INTO `amba_group` VALUES (618, 5, '25', '2024-10-19 02:13:16', 'Indonesia');
INSERT INTO `amba_group` VALUES (619, 5, '26', '2024-10-19 02:13:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (620, 5, '27', '2024-10-19 02:13:18', 'Indonesia');
INSERT INTO `amba_group` VALUES (621, 5, '28', '2024-10-19 02:13:19', 'Indonesia');
INSERT INTO `amba_group` VALUES (622, 5, '29', '2024-10-19 02:13:19', 'Indonesia');
INSERT INTO `amba_group` VALUES (623, 5, '30', '2024-10-19 02:13:20', 'Indonesia');
INSERT INTO `amba_group` VALUES (624, 5, '31', '2024-10-19 02:13:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (625, 5, '32', '2024-10-19 02:13:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (626, 5, '33', '2024-10-19 02:13:22', 'Indonesia');
INSERT INTO `amba_group` VALUES (627, 5, '34', '2024-10-19 02:13:23', 'Indonesia');
INSERT INTO `amba_group` VALUES (628, 5, '35', '2024-10-19 02:13:24', 'Indonesia');
INSERT INTO `amba_group` VALUES (629, 5, '36', '2024-10-19 02:13:24', 'Indonesia');
INSERT INTO `amba_group` VALUES (630, 5, '37', '2024-10-19 02:13:26', 'Indonesia');
INSERT INTO `amba_group` VALUES (631, 5, '38', '2024-10-19 02:13:26', 'Indonesia');
INSERT INTO `amba_group` VALUES (632, 5, '39', '2024-10-19 02:13:27', 'Indonesia');
INSERT INTO `amba_group` VALUES (633, 5, '40', '2024-10-19 02:13:29', 'Indonesia');
INSERT INTO `amba_group` VALUES (634, 5, '41', '2024-10-19 02:13:29', 'Indonesia');
INSERT INTO `amba_group` VALUES (635, 5, '42', '2024-10-19 02:13:30', 'Indonesia');
INSERT INTO `amba_group` VALUES (636, 5, '43', '2024-10-19 02:13:31', 'Indonesia');
INSERT INTO `amba_group` VALUES (637, 5, '44', '2024-10-19 02:13:31', 'Indonesia');
INSERT INTO `amba_group` VALUES (638, 5, '45', '2024-10-19 02:13:32', 'Indonesia');
INSERT INTO `amba_group` VALUES (639, 5, '46', '2024-10-19 02:13:33', 'Indonesia');
INSERT INTO `amba_group` VALUES (640, 5, '47', '2024-10-19 02:13:33', 'Indonesia');
INSERT INTO `amba_group` VALUES (641, 5, '48', '2024-10-19 02:13:34', 'Indonesia');
INSERT INTO `amba_group` VALUES (642, 5, '49', '2024-10-19 02:13:35', 'Indonesia');
INSERT INTO `amba_group` VALUES (643, 5, '50.', '2024-10-19 02:13:37', 'Indonesia');
INSERT INTO `amba_group` VALUES (644, 5, '1', '2024-10-19 02:13:51', 'Indonesia');
INSERT INTO `amba_group` VALUES (645, 5, '1', '2024-10-19 02:13:54', 'Indonesia');
INSERT INTO `amba_group` VALUES (646, 5, '2', '2024-10-19 02:13:56', 'Indonesia');
INSERT INTO `amba_group` VALUES (647, 5, '3', '2024-10-19 02:13:56', 'Indonesia');
INSERT INTO `amba_group` VALUES (648, 5, '/RAIN 2 BTC 2', '2024-10-21 02:46:29', 'Indonesia');
INSERT INTO `amba_group` VALUES (649, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 02:46:30', 'Indonesia');
INSERT INTO `amba_group` VALUES (650, 5, '/RAIN 2 BTC 2', '2024-10-21 02:47:45', 'Indonesia');
INSERT INTO `amba_group` VALUES (651, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 02:47:45', 'Indonesia');
INSERT INTO `amba_group` VALUES (652, 5, '/RAIN 2 BTC 2', '2024-10-21 02:48:45', 'Indonesia');
INSERT INTO `amba_group` VALUES (653, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 02:48:45', 'Indonesia');
INSERT INTO `amba_group` VALUES (654, 5, '/RAIN 2 BTC 2', '2024-10-21 02:49:53', 'Indonesia');
INSERT INTO `amba_group` VALUES (655, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 02:49:53', 'Indonesia');
INSERT INTO `amba_group` VALUES (656, 5, '/RAIN 2 BTC 2', '2024-10-21 02:50:03', 'Indonesia');
INSERT INTO `amba_group` VALUES (657, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 02:50:03', 'Indonesia');
INSERT INTO `amba_group` VALUES (658, 5, '/RAIN 2 BTC 2', '2024-10-21 02:51:34', 'Indonesia');
INSERT INTO `amba_group` VALUES (659, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 02:51:35', 'Indonesia');
INSERT INTO `amba_group` VALUES (660, 5, '/RAIN 2 BTC 2', '2024-10-21 02:52:59', 'Indonesia');
INSERT INTO `amba_group` VALUES (661, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 02:52:59', 'Indonesia');
INSERT INTO `amba_group` VALUES (662, 5, '/RAIN 2 BTC 2', '2024-10-21 02:53:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (663, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 02:53:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (664, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 02:53:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (665, 5, '		$temp_money = \"\";', '2024-10-21 02:57:12', 'Indonesia');
INSERT INTO `amba_group` VALUES (666, 5, '/RAIN 2 BTC 2', '2024-10-21 02:57:18', 'Indonesia');
INSERT INTO `amba_group` VALUES (667, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 02:57:18', 'Indonesia');
INSERT INTO `amba_group` VALUES (668, 5, '/RAIN 2 BTC 2', '2024-10-21 02:57:48', 'Indonesia');
INSERT INTO `amba_group` VALUES (669, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 02:57:48', 'Indonesia');
INSERT INTO `amba_group` VALUES (670, 5, '/RAIN 2 BTC 2', '2024-10-21 02:58:04', 'Indonesia');
INSERT INTO `amba_group` VALUES (671, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 02:58:04', 'Indonesia');
INSERT INTO `amba_group` VALUES (672, 5, '/RAIN 2 BTC 2', '2024-10-21 02:59:54', 'Indonesia');
INSERT INTO `amba_group` VALUES (673, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 02:59:54', 'Indonesia');
INSERT INTO `amba_group` VALUES (674, 5, '/RAIN 2 BTC 2', '2024-10-21 03:00:34', 'Indonesia');
INSERT INTO `amba_group` VALUES (675, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:00:35', 'Indonesia');
INSERT INTO `amba_group` VALUES (676, 5, '/RAIN 2 BTC 2', '2024-10-21 03:05:12', 'Indonesia');
INSERT INTO `amba_group` VALUES (677, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:05:12', 'Indonesia');
INSERT INTO `amba_group` VALUES (678, 5, '/RAIN 2 BTC 2', '2024-10-21 03:08:11', 'Indonesia');
INSERT INTO `amba_group` VALUES (679, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:08:11', 'Indonesia');
INSERT INTO `amba_group` VALUES (680, 5, '/RAIN 2 BTC 2', '2024-10-21 03:08:37', 'Indonesia');
INSERT INTO `amba_group` VALUES (681, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:08:37', 'Indonesia');
INSERT INTO `amba_group` VALUES (682, 5, '/RAIN 2 BTC 2', '2024-10-21 03:09:18', 'Indonesia');
INSERT INTO `amba_group` VALUES (683, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:09:18', 'Indonesia');
INSERT INTO `amba_group` VALUES (684, 5, '/RAIN 2 BTC 2', '2024-10-21 03:09:50', 'Indonesia');
INSERT INTO `amba_group` VALUES (685, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:09:51', 'Indonesia');
INSERT INTO `amba_group` VALUES (686, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:09:51', 'Indonesia');
INSERT INTO `amba_group` VALUES (687, 5, '/RAIN 2 BTC 2', '2024-10-21 03:10:00', 'Indonesia');
INSERT INTO `amba_group` VALUES (688, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:10:00', 'Indonesia');
INSERT INTO `amba_group` VALUES (689, 5, '/RAIN 2 BTC 2', '2024-10-21 03:10:30', 'Indonesia');
INSERT INTO `amba_group` VALUES (690, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:10:30', 'Indonesia');
INSERT INTO `amba_group` VALUES (691, 5, '/RAIN 2 BTC 2', '2024-10-21 03:10:43', 'Indonesia');
INSERT INTO `amba_group` VALUES (692, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:10:43', 'Indonesia');
INSERT INTO `amba_group` VALUES (693, 5, '/RAIN 2 BTC 2', '2024-10-21 03:10:58', 'Indonesia');
INSERT INTO `amba_group` VALUES (694, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:10:58', 'Indonesia');
INSERT INTO `amba_group` VALUES (695, 5, '/RAIN 2 BTC 2', '2024-10-21 03:11:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (696, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:11:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (697, 5, '/RAIN 2 BTC 2', '2024-10-21 03:11:47', 'Indonesia');
INSERT INTO `amba_group` VALUES (698, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:11:47', 'Indonesia');
INSERT INTO `amba_group` VALUES (699, 5, '/RAIN 2 BTC 2', '2024-10-21 03:12:08', 'Indonesia');
INSERT INTO `amba_group` VALUES (700, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:12:08', 'Indonesia');
INSERT INTO `amba_group` VALUES (701, 5, '/RAIN 2 BTC 2', '2024-10-21 03:12:28', 'Indonesia');
INSERT INTO `amba_group` VALUES (702, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:12:28', 'Indonesia');
INSERT INTO `amba_group` VALUES (703, 5, '/RAIN 2 BTC 2', '2024-10-21 03:12:35', 'Indonesia');
INSERT INTO `amba_group` VALUES (704, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:12:35', 'Indonesia');
INSERT INTO `amba_group` VALUES (705, 5, '/RAIN 2 BTC 2', '2024-10-21 03:13:16', 'Indonesia');
INSERT INTO `amba_group` VALUES (706, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:13:16', 'Indonesia');
INSERT INTO `amba_group` VALUES (707, 5, '/RAIN 2 BTC 2', '2024-10-21 03:13:33', 'Indonesia');
INSERT INTO `amba_group` VALUES (708, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:13:33', 'Indonesia');
INSERT INTO `amba_group` VALUES (709, 5, '/RAIN 2 BTC 2', '2024-10-21 03:13:50', 'Indonesia');
INSERT INTO `amba_group` VALUES (710, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:13:50', 'Indonesia');
INSERT INTO `amba_group` VALUES (711, 5, '/RAIN 2 BTC 2', '2024-10-21 03:14:01', 'Indonesia');
INSERT INTO `amba_group` VALUES (712, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:14:01', 'Indonesia');
INSERT INTO `amba_group` VALUES (713, 5, '/RAIN 2 BTC 2', '2024-10-21 03:14:28', 'Indonesia');
INSERT INTO `amba_group` VALUES (714, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:14:28', 'Indonesia');
INSERT INTO `amba_group` VALUES (715, 5, '/RAIN 2 BTC 2', '2024-10-21 03:16:12', 'Indonesia');
INSERT INTO `amba_group` VALUES (716, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:16:12', 'Indonesia');
INSERT INTO `amba_group` VALUES (717, 5, '/RAIN 2 BTC 2', '2024-10-21 03:16:45', 'Indonesia');
INSERT INTO `amba_group` VALUES (718, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:16:45', 'Indonesia');
INSERT INTO `amba_group` VALUES (719, 5, '/RAIN 2 BTC 2', '2024-10-21 03:17:03', 'Indonesia');
INSERT INTO `amba_group` VALUES (720, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:17:03', 'Indonesia');
INSERT INTO `amba_group` VALUES (721, 5, '/RAIN 2 BTC 2', '2024-10-21 03:20:38', 'Indonesia');
INSERT INTO `amba_group` VALUES (722, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:20:38', 'Indonesia');
INSERT INTO `amba_group` VALUES (723, 5, '/RAIN 2 BTC 2', '2024-10-21 03:20:52', 'Indonesia');
INSERT INTO `amba_group` VALUES (724, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:20:52', 'Indonesia');
INSERT INTO `amba_group` VALUES (725, 5, '/RAIN 2 BTC 2', '2024-10-21 03:23:38', 'Indonesia');
INSERT INTO `amba_group` VALUES (726, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:23:38', 'Indonesia');
INSERT INTO `amba_group` VALUES (727, 5, '/RAIN 2 BTC 2', '2024-10-21 03:24:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (728, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:24:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (729, 5, '/RAIN 2 ETH 2', '2024-10-21 03:25:39', 'Indonesia');
INSERT INTO `amba_group` VALUES (730, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:25:40', 'Indonesia');
INSERT INTO `amba_group` VALUES (731, 5, '/RAIN 2 BTC 2', '2024-10-21 03:30:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (732, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:30:07', 'Indonesia');
INSERT INTO `amba_group` VALUES (733, 5, '/RAIN 2 BTC 2', '2024-10-21 03:32:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (734, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:32:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (735, 5, '/RAIN 2 ETH 2', '2024-10-21 03:37:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (736, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:37:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (737, 5, '/RAIN 2 ETH 2', '2024-10-21 03:37:40', 'Indonesia');
INSERT INTO `amba_group` VALUES (738, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:37:40', 'Indonesia');
INSERT INTO `amba_group` VALUES (739, 5, '/RAIN 2 BTC 2', '2024-10-21 03:40:08', 'Indonesia');
INSERT INTO `amba_group` VALUES (740, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:40:08', 'Indonesia');
INSERT INTO `amba_group` VALUES (741, 5, '/RAIN 2 BTC 2', '2024-10-21 03:43:42', 'Indonesia');
INSERT INTO `amba_group` VALUES (742, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:43:42', 'Indonesia');
INSERT INTO `amba_group` VALUES (743, 5, '/RAIN 2 BTC 2', '2024-10-21 03:44:01', 'Indonesia');
INSERT INTO `amba_group` VALUES (744, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:44:01', 'Indonesia');
INSERT INTO `amba_group` VALUES (745, 5, '/RAIN 2 BTC 2', '2024-10-21 03:44:33', 'Indonesia');
INSERT INTO `amba_group` VALUES (746, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:44:33', 'Indonesia');
INSERT INTO `amba_group` VALUES (747, 5, '/RAIN 2 ETH 2', '2024-10-21 03:46:01', 'Indonesia');
INSERT INTO `amba_group` VALUES (748, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:46:01', 'Indonesia');
INSERT INTO `amba_group` VALUES (749, 5, '/RAIN 2 BTC 2', '2024-10-21 03:49:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (750, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:49:06', 'Indonesia');
INSERT INTO `amba_group` VALUES (751, 5, '/RAIN 2 BTC 2', '2024-10-21 03:49:29', 'Indonesia');
INSERT INTO `amba_group` VALUES (752, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:49:29', 'Indonesia');
INSERT INTO `amba_group` VALUES (753, 5, '/RAIN 2 ETH 2', '2024-10-21 03:49:37', 'Indonesia');
INSERT INTO `amba_group` VALUES (754, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:49:37', 'Indonesia');
INSERT INTO `amba_group` VALUES (755, 5, '/RAIN 2 BTC 2', '2024-10-21 03:50:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (756, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 03:50:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (757, 5, '/RAIN 0.05 BTC 3', '2024-10-21 03:57:52', 'Indonesia');
INSERT INTO `amba_group` VALUES (758, 5, '/RAIN 32 BTC 1', '2024-10-21 03:58:20', 'Indonesia');
INSERT INTO `amba_group` VALUES (759, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 32 BTC to 1 random users! <br>Lucky Person1 : harry<br>', '2024-10-21 03:58:20', 'Indonesia');
INSERT INTO `amba_group` VALUES (760, 5, '/RAIN 2 BTC 2', '2024-10-21 03:59:19', 'Indonesia');
INSERT INTO `amba_group` VALUES (761, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 03:59:19', 'Indonesia');
INSERT INTO `amba_group` VALUES (762, 5, '/RAIN 2 BTC 2', '2024-10-21 04:01:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (763, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 04:01:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (764, 5, '/RAIN 2 BTC 2', '2024-10-21 04:01:52', 'Indonesia');
INSERT INTO `amba_group` VALUES (765, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 04:01:52', 'Indonesia');
INSERT INTO `amba_group` VALUES (766, 5, '/RAIN 2 BTC 2', '2024-10-21 04:02:05', 'Indonesia');
INSERT INTO `amba_group` VALUES (767, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 04:02:05', 'Indonesia');
INSERT INTO `amba_group` VALUES (768, 5, '/RAIN 2 BTC 2', '2024-10-21 04:04:11', 'Indonesia');
INSERT INTO `amba_group` VALUES (769, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 BTC to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 04:04:11', 'Indonesia');
INSERT INTO `amba_group` VALUES (770, 5, '/RAIN 2 ETH 2', '2024-10-21 04:04:51', 'Indonesia');
INSERT INTO `amba_group` VALUES (771, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 04:04:51', 'Indonesia');
INSERT INTO `amba_group` VALUES (772, 5, '/RAIN 2 ETH 2', '2024-10-21 04:06:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (773, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : harry<br>Lucky Person2 : Alveraz<br>', '2024-10-21 04:06:21', 'Indonesia');
INSERT INTO `amba_group` VALUES (774, 5, '/RAIN 2 ETH 2', '2024-10-21 04:11:31', 'Indonesia');
INSERT INTO `amba_group` VALUES (775, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 04:11:31', 'Indonesia');
INSERT INTO `amba_group` VALUES (776, 5, '/RAIN 2 ETH 2', '2024-10-21 04:12:25', 'Indonesia');
INSERT INTO `amba_group` VALUES (777, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 04:12:26', 'Indonesia');
INSERT INTO `amba_group` VALUES (778, 5, '/RAIN 5 DASH 2', '2024-10-21 04:12:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (779, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 5 DASH to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 04:12:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (780, 5, '/TIP 34 BTC harry', '2024-10-21 04:27:53', 'Indonesia');
INSERT INTO `amba_group` VALUES (781, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:27:53', 'Indonesia');
INSERT INTO `amba_group` VALUES (782, 5, '/TIP 34 BTC harry', '2024-10-21 04:30:35', 'Indonesia');
INSERT INTO `amba_group` VALUES (783, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:30:35', 'Indonesia');
INSERT INTO `amba_group` VALUES (784, 5, '/TIP 34 BTC harry', '2024-10-21 04:31:48', 'Indonesia');
INSERT INTO `amba_group` VALUES (785, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:31:48', 'Indonesia');
INSERT INTO `amba_group` VALUES (786, 5, '/TIP 34 BTC harry', '2024-10-21 04:33:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (787, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:33:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (788, 5, '/TIP 34 BTC harry', '2024-10-21 04:47:14', 'Indonesia');
INSERT INTO `amba_group` VALUES (789, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:47:14', 'Indonesia');
INSERT INTO `amba_group` VALUES (790, 5, '/TIP 34 BTC harry', '2024-10-21 04:48:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (791, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:48:17', 'Indonesia');
INSERT INTO `amba_group` VALUES (792, 5, '/TIP 34 BTC harry', '2024-10-21 04:48:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (793, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:48:57', 'Indonesia');
INSERT INTO `amba_group` VALUES (794, 5, '/TIP 34 BTC harry', '2024-10-21 04:49:08', 'Indonesia');
INSERT INTO `amba_group` VALUES (795, 5, '<br> <b>TIP MASTER</b> <br>Alveraz GIVE 34 BTC to harry<br>', '2024-10-21 04:49:09', 'Indonesia');
INSERT INTO `amba_group` VALUES (796, 5, '/RAIN 2 ETH 2', '2024-10-21 04:50:42', 'Indonesia');
INSERT INTO `amba_group` VALUES (797, 5, '<br><b>RAINMASTER</b> <br>Alveraz RAINED 2 ETH to 2 random users! <br>Lucky Person1 : Alveraz<br>Lucky Person2 : harry<br>', '2024-10-21 04:50:42', 'Indonesia');
INSERT INTO `amba_group` VALUES (798, 21, '/TIP 50 DOGE Alveraz', '2024-10-21 04:51:38', 'Indonesia');
INSERT INTO `amba_group` VALUES (799, 21, '/TIP 50 DOGE Alveraz', '2024-10-21 04:52:42', 'Indonesia');
INSERT INTO `amba_group` VALUES (800, 21, '<br> <b>TIP MASTER</b> <br>harry GIVE 50 DOGE to Alveraz<br>', '2024-10-21 04:52:42', 'Indonesia');

-- ----------------------------
-- Table structure for amba_private
-- ----------------------------
DROP TABLE IF EXISTS `amba_private`;
CREATE TABLE `amba_private`  (
  `private_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_message_id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `private_chat_message` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`private_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of amba_private
-- ----------------------------
INSERT INTO `amba_private` VALUES (79, 0, 16, 5, 'Hello', '2024-10-19 02:07:00', 'Yes');
INSERT INTO `amba_private` VALUES (80, 0, 16, 5, 'Hello', '2024-10-19 02:09:37', 'Yes');
INSERT INTO `amba_private` VALUES (81, 0, 16, 5, 'Hi', '2024-10-19 02:09:51', 'Yes');
INSERT INTO `amba_private` VALUES (82, 0, 5, 16, 'Hi', '2024-10-19 02:09:58', 'Yes');
INSERT INTO `amba_private` VALUES (83, 0, 5, 16, 'Welcome', '2024-10-19 02:11:32', 'Yes');
INSERT INTO `amba_private` VALUES (84, 0, 5, 16, 'Welcome', '2024-10-19 02:11:36', 'Yes');
INSERT INTO `amba_private` VALUES (85, 0, 5, 16, 'Welcome', '2024-10-19 02:11:40', 'Yes');
INSERT INTO `amba_private` VALUES (86, 0, 5, 16, 'Welcome', '2024-10-19 02:11:40', 'Yes');
INSERT INTO `amba_private` VALUES (87, 0, 5, 16, 'Welcome', '2024-10-19 02:11:40', 'Yes');
INSERT INTO `amba_private` VALUES (88, 0, 5, 16, 'Welcome', '2024-10-19 02:11:41', 'Yes');
INSERT INTO `amba_private` VALUES (89, 0, 5, 16, 'Welcome', '2024-10-19 02:11:41', 'Yes');
INSERT INTO `amba_private` VALUES (90, 0, 5, 16, 'Welcome', '2024-10-19 02:11:41', 'Yes');

-- ----------------------------
-- Table structure for amba_rain
-- ----------------------------
DROP TABLE IF EXISTS `amba_rain`;
CREATE TABLE `amba_rain`  (
  `rain_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `rain_people` int NOT NULL,
  `rain_money` int NOT NULL,
  `rain_ok` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`rain_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of amba_rain
-- ----------------------------
INSERT INTO `amba_rain` VALUES (1, 100, 222, 'YES');

-- ----------------------------
-- Table structure for amba_users
-- ----------------------------
DROP TABLE IF EXISTS `amba_users`;
CREATE TABLE `amba_users`  (
  `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_profile` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_country` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_order` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_blocktime` bigint NULL DEFAULT NULL,
  `user_blockreason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `user_created_on` time NULL DEFAULT NULL,
  `user_verification_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `user_login_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `user_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `user_connection_id` int NULL DEFAULT NULL,
  `user_gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_balance` bigint NULL DEFAULT NULL,
  `money_btc` float NOT NULL DEFAULT 0,
  `money_eth` float NOT NULL DEFAULT 0,
  `money_doge` float NOT NULL DEFAULT 0,
  `money_ltc` float NOT NULL DEFAULT 0,
  `money_bch` float NOT NULL DEFAULT 0,
  `money_dash` float NOT NULL DEFAULT 0,
  `money_dgb` float NOT NULL DEFAULT 0,
  `money_trx` float NOT NULL DEFAULT 0,
  `money_usdt` float NOT NULL DEFAULT 0,
  `money_fey` float NOT NULL DEFAULT 0,
  `money_zec` float NOT NULL DEFAULT 0,
  `money_bnb` float NOT NULL DEFAULT 0,
  `money_sol` float NOT NULL DEFAULT 0,
  `money_xrp` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of amba_users
-- ----------------------------
INSERT INTO `amba_users` VALUES (5, 'Alveraz', 'images/1096322992.png', 'alveraz@gmail.com', 'friendship', 'UK', 'ADMIN', NULL, NULL, NULL, NULL, 'Online', '9c8fe8684bd501885536192114c15afb', 198, 'Female', NULL, -34, -0.9996, 50, 0, 0, -2.4996, 0.0004021, 0.0004021, 0.0004021, 0.0004021, 0.0004021, 0.0004021, 0.0004021, 0.0004021);
INSERT INTO `amba_users` VALUES (17, 'Johns Kevin', 'images/prof1.png', 'johns@gmail.com', 'friendship', 'USA', 'CUSTOMER', 1729426353, 'He is very lazy, He didn\'t send mail for 2 days', NULL, NULL, NULL, NULL, NULL, 'Male', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `amba_users` VALUES (21, 'harry', 'images/prof1.png', 'harry@gmail.com', 'friendship', 'UK', 'CUSTOMER', NULL, NULL, NULL, NULL, 'Online', '9176d895c7c7b18ef1692821ed1c20b3', 412, 'Male', NULL, 34, 3, -50, 0, 0, 2.5, 0, 0, 0, 0, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for banned_users
-- ----------------------------
DROP TABLE IF EXISTS `banned_users`;
CREATE TABLE `banned_users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `banned_user_id` int NULL DEFAULT NULL,
  `banned_by_admin_id` int NULL DEFAULT NULL,
  `ban_start_time` timestamp NOT NULL DEFAULT current_timestamp,
  `ban_end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ban_reason` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `banned_user_id`(`banned_user_id`) USING BTREE,
  INDEX `banned_by_admin_id`(`banned_by_admin_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banned_users
-- ----------------------------

-- ----------------------------
-- Table structure for bans
-- ----------------------------
DROP TABLE IF EXISTS `bans`;
CREATE TABLE `bans`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `ban_expires_at` datetime NULL DEFAULT NULL,
  `ban_reason` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bans
-- ----------------------------

-- ----------------------------
-- Table structure for betting_history
-- ----------------------------
DROP TABLE IF EXISTS `betting_history`;
CREATE TABLE `betting_history`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `bet_amount` decimal(16, 8) NOT NULL,
  `currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'trx',
  `client_seed` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `server_seed` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dice_roll` int NOT NULL,
  `bet_choice` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `result` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `payout` decimal(16, 8) NOT NULL,
  `created_at` datetime NULL DEFAULT current_timestamp,
  `amount_change` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of betting_history
-- ----------------------------

-- ----------------------------
-- Table structure for chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE `chat_messages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chat_messages
-- ----------------------------

-- ----------------------------
-- Table structure for crypto_rates
-- ----------------------------
DROP TABLE IF EXISTS `crypto_rates`;
CREATE TABLE `crypto_rates`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `crypto_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rate_usd` decimal(16, 8) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `crypto_name`(`crypto_name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of crypto_rates
-- ----------------------------

-- ----------------------------
-- Table structure for daily_claims
-- ----------------------------
DROP TABLE IF EXISTS `daily_claims`;
CREATE TABLE `daily_claims`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `claim_time` timestamp NOT NULL DEFAULT current_timestamp,
  `amount` decimal(16, 8) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of daily_claims
-- ----------------------------

-- ----------------------------
-- Table structure for deposit_requests
-- ----------------------------
DROP TABLE IF EXISTS `deposit_requests`;
CREATE TABLE `deposit_requests`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` decimal(16, 8) NOT NULL,
  `currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` enum('pending','completed','failed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `completed_at` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `transaction_id`(`transaction_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of deposit_requests
-- ----------------------------

-- ----------------------------
-- Table structure for faucet_chat
-- ----------------------------
DROP TABLE IF EXISTS `faucet_chat`;
CREATE TABLE `faucet_chat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faucet_chat
-- ----------------------------

-- ----------------------------
-- Table structure for faucetpay_balances
-- ----------------------------
DROP TABLE IF EXISTS `faucetpay_balances`;
CREATE TABLE `faucetpay_balances`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `balance` decimal(20, 8) NOT NULL,
  `balance_usd` decimal(20, 8) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `currency`(`currency`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of faucetpay_balances
-- ----------------------------

-- ----------------------------
-- Table structure for fees
-- ----------------------------
DROP TABLE IF EXISTS `fees`;
CREATE TABLE `fees`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `transaction_type` enum('deposit','withdraw') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fee_percentage` decimal(5, 4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of fees
-- ----------------------------

-- ----------------------------
-- Table structure for group_chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `group_chat_messages`;
CREATE TABLE `group_chat_messages`  (
  `id` int NOT NULL,
  `userid` int NOT NULL,
  `group_chat_message` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group_chat_messages
-- ----------------------------
INSERT INTO `group_chat_messages` VALUES (6, 11, 'First chat message', '2023-09-28 03:56:09');
INSERT INTO `group_chat_messages` VALUES (7, 11, 'Test chat \n', '2023-09-28 03:57:35');
INSERT INTO `group_chat_messages` VALUES (8, 11, 'Fine\n', '2023-09-28 03:59:19');
INSERT INTO `group_chat_messages` VALUES (9, 11, 'Hey\n', '2023-09-29 09:23:19');
INSERT INTO `group_chat_messages` VALUES (10, 11, 'f', '2023-09-29 09:24:29');
INSERT INTO `group_chat_messages` VALUES (11, 11, 'ff', '2023-09-29 09:27:05');
INSERT INTO `group_chat_messages` VALUES (12, 11, 'g', '2023-09-29 09:31:53');
INSERT INTO `group_chat_messages` VALUES (13, 11, 'test', '2023-09-30 01:25:41');
INSERT INTO `group_chat_messages` VALUES (14, 11, 'test 2', '2023-09-30 01:25:52');
INSERT INTO `group_chat_messages` VALUES (15, 11, 'test', '2023-09-30 01:26:01');
INSERT INTO `group_chat_messages` VALUES (16, 11, 'hello\n', '2023-09-30 01:54:51');
INSERT INTO `group_chat_messages` VALUES (17, 11, 'f', '2023-09-30 01:56:44');
INSERT INTO `group_chat_messages` VALUES (18, 11, 'f', '2023-09-30 01:56:49');
INSERT INTO `group_chat_messages` VALUES (19, 11, 'yh', '2023-09-30 02:25:20');
INSERT INTO `group_chat_messages` VALUES (20, 11, 'teas\n', '2023-09-30 02:36:36');
INSERT INTO `group_chat_messages` VALUES (21, 11, 'jkn\nnlkhnjhn\n', '2023-09-30 02:37:18');
INSERT INTO `group_chat_messages` VALUES (22, 11, 'joipjiojoijio', '2023-09-30 02:37:23');
INSERT INTO `group_chat_messages` VALUES (23, 11, 'd', '2023-09-30 03:51:33');
INSERT INTO `group_chat_messages` VALUES (24, 11, 'dafasg', '2023-09-30 03:51:43');
INSERT INTO `group_chat_messages` VALUES (25, 11, 'g', '2023-09-30 03:53:18');
INSERT INTO `group_chat_messages` VALUES (26, 11, 'sghsdzhg', '2023-09-30 03:54:42');
INSERT INTO `group_chat_messages` VALUES (27, 11, 'sgsg', '2023-09-30 03:57:08');
INSERT INTO `group_chat_messages` VALUES (28, 11, 'sfgs', '2023-09-30 03:57:16');
INSERT INTO `group_chat_messages` VALUES (29, 11, 'f', '2023-09-30 04:05:51');
INSERT INTO `group_chat_messages` VALUES (30, 11, 'ff', '2023-09-30 04:06:48');
INSERT INTO `group_chat_messages` VALUES (31, 11, 'fffff', '2023-09-30 04:10:31');
INSERT INTO `group_chat_messages` VALUES (32, 11, 'gsfdghsdfhg', '2023-09-30 04:11:05');
INSERT INTO `group_chat_messages` VALUES (33, 11, 'ashasdhdsh', '2023-09-30 04:11:06');
INSERT INTO `group_chat_messages` VALUES (34, 11, 'ashsadhdsah', '2023-09-30 04:11:08');
INSERT INTO `group_chat_messages` VALUES (35, 15, 'f', '2023-09-30 04:15:16');
INSERT INTO `group_chat_messages` VALUES (36, 15, 'im fatma', '2023-09-30 04:15:31');
INSERT INTO `group_chat_messages` VALUES (37, 11, 'fff', '2023-09-30 04:17:34');
INSERT INTO `group_chat_messages` VALUES (38, 11, 'ff', '2023-09-30 04:17:49');
INSERT INTO `group_chat_messages` VALUES (39, 11, 'g', '2023-09-30 04:19:12');
INSERT INTO `group_chat_messages` VALUES (40, 11, 'hsdh', '2023-09-30 04:19:19');
INSERT INTO `group_chat_messages` VALUES (41, 11, 'n', '2023-09-30 04:19:24');
INSERT INTO `group_chat_messages` VALUES (42, 11, 'f', '2023-09-30 04:20:02');
INSERT INTO `group_chat_messages` VALUES (43, 11, 'test', '2023-09-30 04:20:23');
INSERT INTO `group_chat_messages` VALUES (44, 11, 'testtttt', '2023-09-30 04:21:04');
INSERT INTO `group_chat_messages` VALUES (45, 11, 'ffffffffffffffffffffffff', '2023-09-30 04:32:50');
INSERT INTO `group_chat_messages` VALUES (46, 11, 'take care', '2023-09-30 04:37:35');
INSERT INTO `group_chat_messages` VALUES (47, 11, 'ffff', '2023-09-30 04:38:13');
INSERT INTO `group_chat_messages` VALUES (48, 11, 'fff', '2023-09-30 04:39:32');
INSERT INTO `group_chat_messages` VALUES (49, 11, 'q', '2023-09-30 04:39:55');
INSERT INTO `group_chat_messages` VALUES (50, 11, 'f', '2023-09-30 04:43:33');
INSERT INTO `group_chat_messages` VALUES (51, 11, 'f', '2023-09-30 04:43:55');
INSERT INTO `group_chat_messages` VALUES (52, 15, 'fat', '2023-09-30 04:56:24');
INSERT INTO `group_chat_messages` VALUES (53, 15, 'fat', '2023-09-30 04:56:47');
INSERT INTO `group_chat_messages` VALUES (54, 11, 'd', '2023-09-30 04:57:26');
INSERT INTO `group_chat_messages` VALUES (55, 11, 'q', '2023-09-30 04:57:46');
INSERT INTO `group_chat_messages` VALUES (56, 15, 'fffffff', '2023-09-30 04:57:57');
INSERT INTO `group_chat_messages` VALUES (57, 11, 'f', '2023-09-30 05:29:52');
INSERT INTO `group_chat_messages` VALUES (58, 15, 'f', '2023-09-30 05:30:24');
INSERT INTO `group_chat_messages` VALUES (59, 11, 'test', '2023-09-30 05:32:42');
INSERT INTO `group_chat_messages` VALUES (60, 15, 'f', '2023-09-30 05:32:51');
INSERT INTO `group_chat_messages` VALUES (61, 11, 'f', '2023-09-30 05:35:49');
INSERT INTO `group_chat_messages` VALUES (62, 11, 'f', '2023-09-30 05:36:25');
INSERT INTO `group_chat_messages` VALUES (63, 15, 'f', '2023-09-30 05:38:41');
INSERT INTO `group_chat_messages` VALUES (64, 11, 'f', '2023-09-30 05:38:56');
INSERT INTO `group_chat_messages` VALUES (65, 15, 'f', '2023-09-30 05:39:03');
INSERT INTO `group_chat_messages` VALUES (66, 11, 'f', '2023-09-30 05:39:42');
INSERT INTO `group_chat_messages` VALUES (67, 15, 'f', '2023-09-30 05:39:47');
INSERT INTO `group_chat_messages` VALUES (68, 11, 'f', '2023-09-30 05:49:52');
INSERT INTO `group_chat_messages` VALUES (69, 11, 'a', '2023-09-30 05:50:00');
INSERT INTO `group_chat_messages` VALUES (70, 11, 'f', '2023-09-30 05:55:22');
INSERT INTO `group_chat_messages` VALUES (71, 11, 'f', '2023-09-30 05:55:31');
INSERT INTO `group_chat_messages` VALUES (72, 11, 'ffff', '2023-09-30 05:55:52');
INSERT INTO `group_chat_messages` VALUES (73, 11, 'ffff', '2023-09-30 05:56:22');
INSERT INTO `group_chat_messages` VALUES (74, 11, 'fffff', '2023-09-30 05:56:28');
INSERT INTO `group_chat_messages` VALUES (75, 11, 'f', '2023-09-30 05:57:16');
INSERT INTO `group_chat_messages` VALUES (76, 11, 'qqqqqq', '2023-09-30 05:57:30');
INSERT INTO `group_chat_messages` VALUES (77, 11, 'q', '2023-09-30 05:57:37');
INSERT INTO `group_chat_messages` VALUES (78, 11, 'q', '2023-09-30 05:57:39');
INSERT INTO `group_chat_messages` VALUES (79, 11, 'q', '2023-09-30 05:57:47');
INSERT INTO `group_chat_messages` VALUES (80, 11, 'f', '2023-09-30 05:58:48');
INSERT INTO `group_chat_messages` VALUES (81, 11, 'fasgsagasg', '2023-09-30 05:59:13');
INSERT INTO `group_chat_messages` VALUES (82, 11, 'f', '2023-09-30 06:00:07');
INSERT INTO `group_chat_messages` VALUES (83, 11, 'q', '2023-09-30 06:03:53');
INSERT INTO `group_chat_messages` VALUES (84, 11, 'qq', '2023-09-30 06:04:01');
INSERT INTO `group_chat_messages` VALUES (85, 11, 'f', '2023-09-30 06:07:15');
INSERT INTO `group_chat_messages` VALUES (86, 11, 'd', '2023-09-30 06:07:52');
INSERT INTO `group_chat_messages` VALUES (87, 11, 'd', '2023-09-30 06:10:46');
INSERT INTO `group_chat_messages` VALUES (88, 11, 'd', '2023-09-30 06:10:48');
INSERT INTO `group_chat_messages` VALUES (89, 11, 'a', '2023-09-30 06:10:52');
INSERT INTO `group_chat_messages` VALUES (90, 11, 'qq', '2023-09-30 06:11:19');
INSERT INTO `group_chat_messages` VALUES (91, 11, 'fffff', '2023-09-30 06:13:49');
INSERT INTO `group_chat_messages` VALUES (92, 11, 'c', '2023-09-30 06:14:14');
INSERT INTO `group_chat_messages` VALUES (93, 11, 'ccccc', '2023-09-30 06:14:28');
INSERT INTO `group_chat_messages` VALUES (94, 11, 'c', '2023-09-30 06:26:12');
INSERT INTO `group_chat_messages` VALUES (95, 11, 'f', '2023-09-30 09:06:46');
INSERT INTO `group_chat_messages` VALUES (96, 11, 'q', '2023-09-30 10:39:54');
INSERT INTO `group_chat_messages` VALUES (97, 11, 'qqqq', '2023-09-30 11:04:43');
INSERT INTO `group_chat_messages` VALUES (98, 11, 'q', '2023-09-30 11:39:27');
INSERT INTO `group_chat_messages` VALUES (99, 11, 'qq', '2023-09-30 11:39:42');
INSERT INTO `group_chat_messages` VALUES (100, 11, 'qq', '2023-09-30 11:39:43');
INSERT INTO `group_chat_messages` VALUES (101, 11, 'qwe', '2023-09-30 11:41:48');
INSERT INTO `group_chat_messages` VALUES (102, 11, 'qwe', '2023-09-30 11:42:09');
INSERT INTO `group_chat_messages` VALUES (103, 11, 'qweq', '2023-09-30 11:42:11');
INSERT INTO `group_chat_messages` VALUES (104, 11, 'q', '2023-09-30 11:42:16');
INSERT INTO `group_chat_messages` VALUES (105, 11, 'qqqq', '2023-09-30 11:42:24');
INSERT INTO `group_chat_messages` VALUES (106, 11, 'qqqqqqqqqqqqqqqqqqqqqqq', '2023-09-30 11:42:52');
INSERT INTO `group_chat_messages` VALUES (107, 11, 'qqq', '2023-09-30 11:43:19');
INSERT INTO `group_chat_messages` VALUES (108, 11, 'q', '2023-09-30 11:44:19');
INSERT INTO `group_chat_messages` VALUES (109, 15, 'qqqqq', '2023-09-30 11:44:53');
INSERT INTO `group_chat_messages` VALUES (110, 11, 'q', '2023-09-30 11:44:57');
INSERT INTO `group_chat_messages` VALUES (111, 15, 'fatma', '2023-09-30 11:45:45');
INSERT INTO `group_chat_messages` VALUES (112, 15, 'fatma', '2023-09-30 11:45:46');
INSERT INTO `group_chat_messages` VALUES (113, 11, 'its me fatma', '2023-09-30 11:46:13');
INSERT INTO `group_chat_messages` VALUES (114, 15, 'f', '2023-09-30 11:46:44');
INSERT INTO `group_chat_messages` VALUES (115, 11, 'q', '2023-09-30 11:54:51');
INSERT INTO `group_chat_messages` VALUES (116, 11, 'q', '2023-09-30 11:54:57');
INSERT INTO `group_chat_messages` VALUES (117, 11, 'q', '2023-09-30 11:55:10');
INSERT INTO `group_chat_messages` VALUES (118, 15, 'q', '2023-10-01 12:06:09');
INSERT INTO `group_chat_messages` VALUES (119, 15, 'q', '2023-10-01 01:11:04');
INSERT INTO `group_chat_messages` VALUES (120, 15, 'fat', '2023-10-01 01:11:19');
INSERT INTO `group_chat_messages` VALUES (121, 15, 'f', '2023-10-03 04:51:51');
INSERT INTO `group_chat_messages` VALUES (122, 15, 'f', '2023-10-03 04:52:02');
INSERT INTO `group_chat_messages` VALUES (123, 11, 'q', '2023-10-03 04:53:21');
INSERT INTO `group_chat_messages` VALUES (124, 11, 'q', '2023-10-03 04:58:14');
INSERT INTO `group_chat_messages` VALUES (125, 11, 'test', '2023-10-03 05:05:24');
INSERT INTO `group_chat_messages` VALUES (126, 15, 'q', '2023-10-03 05:06:01');
INSERT INTO `group_chat_messages` VALUES (127, 11, 'q', '2023-10-03 05:24:56');
INSERT INTO `group_chat_messages` VALUES (128, 11, 'qqq', '2023-10-03 07:38:06');
INSERT INTO `group_chat_messages` VALUES (129, 11, 'This is a test', '2023-10-03 08:18:03');
INSERT INTO `group_chat_messages` VALUES (130, 15, 'this is a test\n', '2023-10-03 08:18:33');
INSERT INTO `group_chat_messages` VALUES (131, 11, 'test test', '2023-10-03 08:21:57');
INSERT INTO `group_chat_messages` VALUES (132, 11, 'How are you all?', '2023-10-03 08:25:31');
INSERT INTO `group_chat_messages` VALUES (133, 11, 'How are you all?', '2023-10-03 08:25:51');
INSERT INTO `group_chat_messages` VALUES (134, 11, 'q', '2023-10-04 12:00:41');

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `token` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for private_chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `private_chat_messages`;
CREATE TABLE `private_chat_messages`  (
  `chat_message_id` int NOT NULL,
  `to_user_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `private_chat_message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp,
  `status` enum('Yes','No') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Chat Message is either \'Read\' or \'Unread\''
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of private_chat_messages
-- ----------------------------
INSERT INTO `private_chat_messages` VALUES (1, 15, 11, 'HelloFatma', '2023-10-03 06:14:38', 'Yes');
INSERT INTO `private_chat_messages` VALUES (2, 15, 11, 'test test', '2023-10-03 06:24:30', 'Yes');
INSERT INTO `private_chat_messages` VALUES (3, 15, 11, 'How are you', '2023-10-03 06:24:48', 'Yes');
INSERT INTO `private_chat_messages` VALUES (4, 15, 11, 'How are you Fatma?\n', '2023-10-03 06:26:39', 'Yes');
INSERT INTO `private_chat_messages` VALUES (5, 15, 11, 'd', '2023-10-03 07:23:25', 'Yes');
INSERT INTO `private_chat_messages` VALUES (6, 11, 15, 'qqq', '2023-10-03 07:23:33', 'Yes');
INSERT INTO `private_chat_messages` VALUES (7, 11, 15, 'q', '2023-10-03 07:23:37', 'Yes');
INSERT INTO `private_chat_messages` VALUES (8, 11, 15, 'q', '2023-10-03 07:23:47', 'Yes');
INSERT INTO `private_chat_messages` VALUES (9, 11, 15, 'q', '2023-10-03 07:23:58', 'Yes');
INSERT INTO `private_chat_messages` VALUES (10, 15, 11, 'q', '2023-10-03 07:37:44', 'Yes');
INSERT INTO `private_chat_messages` VALUES (11, 15, 11, 'q', '2023-10-03 07:37:50', 'Yes');
INSERT INTO `private_chat_messages` VALUES (12, 11, 15, 'q', '2023-10-03 07:38:01', 'Yes');
INSERT INTO `private_chat_messages` VALUES (13, 15, 11, 'test', '2023-10-03 07:38:33', 'Yes');
INSERT INTO `private_chat_messages` VALUES (14, 11, 15, 'g', '2023-10-03 07:38:49', 'Yes');
INSERT INTO `private_chat_messages` VALUES (15, 11, 15, 'tttt', '2023-10-03 07:39:19', 'Yes');
INSERT INTO `private_chat_messages` VALUES (16, 11, 15, 'test', '2023-10-03 07:48:20', 'Yes');
INSERT INTO `private_chat_messages` VALUES (17, 15, 11, 'q', '2023-10-03 08:18:22', 'Yes');
INSERT INTO `private_chat_messages` VALUES (18, 12, 11, 'q', '2023-10-03 08:47:37', 'Yes');
INSERT INTO `private_chat_messages` VALUES (19, 12, 11, 'q', '2023-10-03 08:47:45', 'Yes');
INSERT INTO `private_chat_messages` VALUES (20, 15, 11, 'q', '2023-10-03 08:48:03', 'Yes');
INSERT INTO `private_chat_messages` VALUES (21, 11, 15, 'q', '2023-10-03 08:48:29', 'Yes');
INSERT INTO `private_chat_messages` VALUES (22, 15, 11, 'h', '2023-10-04 09:29:15', 'Yes');
INSERT INTO `private_chat_messages` VALUES (23, 11, 15, 'h', '2023-10-04 09:29:34', 'Yes');
INSERT INTO `private_chat_messages` VALUES (24, 11, 15, 'Hello Ahmed', '2023-10-04 09:30:47', 'Yes');
INSERT INTO `private_chat_messages` VALUES (25, 11, 15, 'Where Have you been?\n', '2023-10-04 09:31:00', 'Yes');
INSERT INTO `private_chat_messages` VALUES (26, 11, 15, 'Where are you???', '2023-10-04 09:31:46', 'Yes');
INSERT INTO `private_chat_messages` VALUES (27, 11, 15, 'Hmmm', '2023-10-04 09:32:19', 'Yes');
INSERT INTO `private_chat_messages` VALUES (28, 11, 15, 'qqq', '2023-10-04 09:32:29', 'Yes');
INSERT INTO `private_chat_messages` VALUES (29, 15, 11, 'Im here\n', '2023-10-04 09:32:47', 'Yes');
INSERT INTO `private_chat_messages` VALUES (30, 15, 11, 'how are you?', '2023-10-04 09:33:04', 'Yes');
INSERT INTO `private_chat_messages` VALUES (31, 15, 11, 'test', '2023-10-04 09:33:09', 'Yes');
INSERT INTO `private_chat_messages` VALUES (32, 11, 15, 'hey', '2023-10-04 09:35:10', 'Yes');
INSERT INTO `private_chat_messages` VALUES (33, 11, 15, 'Hello Ahmed', '2023-10-04 23:47:04', 'Yes');
INSERT INTO `private_chat_messages` VALUES (34, 11, 15, 'g', '2023-10-05 00:21:55', 'Yes');
INSERT INTO `private_chat_messages` VALUES (35, 11, 15, 'ggggg', '2023-10-05 00:22:14', 'Yes');
INSERT INTO `private_chat_messages` VALUES (36, 11, 15, 'tesst', '2023-10-05 00:22:24', 'Yes');
INSERT INTO `private_chat_messages` VALUES (37, 15, 11, 'q', '2023-10-05 00:23:39', 'Yes');
INSERT INTO `private_chat_messages` VALUES (38, 11, 15, 'q', '2023-10-05 00:23:44', 'Yes');
INSERT INTO `private_chat_messages` VALUES (39, 11, 15, 'q', '2023-10-05 00:23:51', 'Yes');
INSERT INTO `private_chat_messages` VALUES (40, 11, 15, 'qqqqq', '2023-10-05 00:24:00', 'Yes');
INSERT INTO `private_chat_messages` VALUES (41, 15, 11, 'q', '2023-10-05 00:24:03', 'Yes');
INSERT INTO `private_chat_messages` VALUES (42, 11, 15, 'qqq', '2023-10-05 00:24:07', 'Yes');
INSERT INTO `private_chat_messages` VALUES (43, 11, 15, 'qqq', '2023-10-05 00:40:36', 'Yes');
INSERT INTO `private_chat_messages` VALUES (44, 11, 15, 'f', '2023-10-05 01:11:43', 'Yes');
INSERT INTO `private_chat_messages` VALUES (45, 12, 11, 'q', '2023-10-05 01:11:52', 'No');
INSERT INTO `private_chat_messages` VALUES (46, 11, 15, 'q', '2023-10-05 01:11:56', 'Yes');
INSERT INTO `private_chat_messages` VALUES (47, 11, 15, 'q', '2023-10-05 01:30:55', 'Yes');
INSERT INTO `private_chat_messages` VALUES (48, 11, 15, 'test', '2023-10-05 01:31:04', 'Yes');
INSERT INTO `private_chat_messages` VALUES (49, 11, 15, 'q', '2023-10-05 01:32:57', 'Yes');
INSERT INTO `private_chat_messages` VALUES (50, 11, 15, 'q', '2023-10-05 01:33:04', 'Yes');
INSERT INTO `private_chat_messages` VALUES (51, 11, 15, 'q', '2023-10-05 01:33:10', 'Yes');
INSERT INTO `private_chat_messages` VALUES (52, 11, 15, 'q', '2023-10-05 01:34:14', 'Yes');
INSERT INTO `private_chat_messages` VALUES (53, 11, 15, 'q', '2023-10-05 01:34:18', 'Yes');
INSERT INTO `private_chat_messages` VALUES (54, 11, 15, 'q', '2023-10-05 01:34:23', 'Yes');
INSERT INTO `private_chat_messages` VALUES (55, 11, 15, 'q', '2023-10-05 01:37:20', 'Yes');
INSERT INTO `private_chat_messages` VALUES (56, 11, 15, 'q', '2023-10-05 01:37:34', 'Yes');
INSERT INTO `private_chat_messages` VALUES (57, 11, 15, 'q', '2023-10-05 01:37:45', 'Yes');

-- ----------------------------
-- Table structure for referral_earnings
-- ----------------------------
DROP TABLE IF EXISTS `referral_earnings`;
CREATE TABLE `referral_earnings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `referrer_id` int NOT NULL,
  `referred_user_id` int NOT NULL,
  `amount` decimal(18, 8) NOT NULL,
  `currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bonus` decimal(18, 8) NOT NULL,
  `earned_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `referrer_id`(`referrer_id`) USING BTREE,
  INDEX `referred_user_id`(`referred_user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of referral_earnings
-- ----------------------------

-- ----------------------------
-- Table structure for staking
-- ----------------------------
DROP TABLE IF EXISTS `staking`;
CREATE TABLE `staking`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `amount` decimal(16, 8) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp,
  `lock_period` int NOT NULL,
  `refund` tinyint(1) NULL DEFAULT 0,
  `status` enum('active','completed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'active',
  `reward_rate` decimal(5, 2) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of staking
-- ----------------------------

-- ----------------------------
-- Table structure for swap_history
-- ----------------------------
DROP TABLE IF EXISTS `swap_history`;
CREATE TABLE `swap_history`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `from_currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `to_currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `swap_amount` decimal(16, 8) NULL DEFAULT NULL,
  `fee` decimal(16, 8) NULL DEFAULT NULL,
  `final_amount` decimal(16, 8) NULL DEFAULT NULL,
  `swap_time` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of swap_history
-- ----------------------------

-- ----------------------------
-- Table structure for user_activity_log
-- ----------------------------
DROP TABLE IF EXISTS `user_activity_log`;
CREATE TABLE `user_activity_log`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `login_time` datetime NULL DEFAULT NULL,
  `logout_time` datetime NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` enum('logged_in','logged_out') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'logged_in',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `fingerprint` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_activity_log
-- ----------------------------

-- ----------------------------
-- Table structure for user_levels
-- ----------------------------
DROP TABLE IF EXISTS `user_levels`;
CREATE TABLE `user_levels`  (
  `level` int NOT NULL,
  `experience_required` int NOT NULL,
  PRIMARY KEY (`level`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of user_levels
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NULL DEFAULT 0,
  `level` int NULL DEFAULT 1,
  `exp` int NULL DEFAULT 1,
  `is_verified` tinyint(1) NULL DEFAULT 0,
  `balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `last_login` timestamp NULL DEFAULT NULL,
  `btc_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `eth_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `doge_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `ltc_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `bch_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `dash_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `dgb_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `trx_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `usdt_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `fey_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `zec_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `bnb_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `sol_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `xrp_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `matic_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `ada_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `ton_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `xlm_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `usdc_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `xmr_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `tara_balance` decimal(16, 8) NULL DEFAULT 0.00000000,
  `last_active` datetime NULL DEFAULT current_timestamp,
  `referrer_id` int NULL DEFAULT NULL,
  `device_fingerprint` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `fingerprint` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `admin` tinyint(1) NULL DEFAULT 0,
  `verification_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `last_verification_request` timestamp NULL DEFAULT NULL,
  `login_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email` ASC) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for withdraw_requests
-- ----------------------------
DROP TABLE IF EXISTS `withdraw_requests`;
CREATE TABLE `withdraw_requests`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` decimal(20, 8) NOT NULL,
  `currency` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `completed_at` timestamp NULL DEFAULT NULL,
  `payout_user_hash` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of withdraw_requests
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
