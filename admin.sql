/*
Navicat MySQL Data Transfer

Source Server         : 39.106.180.91
Source Server Version : 50624
Source Host           : 39.106.180.91:16000
Source Database       : admin

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2018-12-11 14:43:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('demo测试账号', '320', '1544503585');
INSERT INTO `auth_assignment` VALUES ('超级管理员', '1', '1542121619');

-- ----------------------------
-- Table structure for auth_channel
-- ----------------------------
DROP TABLE IF EXISTS `auth_channel`;
CREATE TABLE `auth_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL COMMENT '应用id',
  `channel_id` int(11) NOT NULL COMMENT '渠道id',
  `url_id` int(11) DEFAULT NULL COMMENT '锻炼表外键',
  PRIMARY KEY (`id`),
  KEY `pk_au_ch_appid` (`app_id`) USING BTREE,
  KEY `pk_au_ch_channelid` (`channel_id`) USING BTREE,
  KEY `pk_au_ch_urlid` (`url_id`) USING BTREE,
  CONSTRAINT `auth_channel_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_channel_ibfk_2` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_channel_ibfk_3` FOREIGN KEY (`url_id`) REFERENCES `short_url` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57879 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_channel
-- ----------------------------
INSERT INTO `auth_channel` VALUES ('57754', '27', '348', null);
INSERT INTO `auth_channel` VALUES ('57755', '27', '349', null);
INSERT INTO `auth_channel` VALUES ('57756', '27', '350', null);
INSERT INTO `auth_channel` VALUES ('57757', '27', '354', null);
INSERT INTO `auth_channel` VALUES ('57758', '27', '361', null);
INSERT INTO `auth_channel` VALUES ('57759', '27', '362', null);
INSERT INTO `auth_channel` VALUES ('57760', '27', '365', null);
INSERT INTO `auth_channel` VALUES ('57761', '27', '369', null);
INSERT INTO `auth_channel` VALUES ('57762', '27', '370', null);
INSERT INTO `auth_channel` VALUES ('57763', '27', '371', null);
INSERT INTO `auth_channel` VALUES ('57764', '27', '373', null);
INSERT INTO `auth_channel` VALUES ('57765', '27', '374', null);
INSERT INTO `auth_channel` VALUES ('57766', '27', '375', null);
INSERT INTO `auth_channel` VALUES ('57767', '27', '376', null);
INSERT INTO `auth_channel` VALUES ('57768', '27', '377', null);
INSERT INTO `auth_channel` VALUES ('57769', '27', '379', null);
INSERT INTO `auth_channel` VALUES ('57770', '27', '380', null);
INSERT INTO `auth_channel` VALUES ('57771', '27', '382', null);
INSERT INTO `auth_channel` VALUES ('57772', '27', '384', null);
INSERT INTO `auth_channel` VALUES ('57773', '27', '385', null);
INSERT INTO `auth_channel` VALUES ('57774', '27', '387', null);
INSERT INTO `auth_channel` VALUES ('57775', '27', '389', null);
INSERT INTO `auth_channel` VALUES ('57776', '27', '390', null);
INSERT INTO `auth_channel` VALUES ('57777', '27', '391', null);
INSERT INTO `auth_channel` VALUES ('57778', '27', '392', null);
INSERT INTO `auth_channel` VALUES ('57779', '27', '393', null);
INSERT INTO `auth_channel` VALUES ('57780', '27', '396', null);
INSERT INTO `auth_channel` VALUES ('57781', '27', '397', null);
INSERT INTO `auth_channel` VALUES ('57782', '27', '398', null);
INSERT INTO `auth_channel` VALUES ('57783', '27', '399', null);
INSERT INTO `auth_channel` VALUES ('57784', '27', '400', null);
INSERT INTO `auth_channel` VALUES ('57785', '27', '402', null);
INSERT INTO `auth_channel` VALUES ('57786', '27', '403', null);
INSERT INTO `auth_channel` VALUES ('57787', '27', '404', null);
INSERT INTO `auth_channel` VALUES ('57788', '27', '405', null);
INSERT INTO `auth_channel` VALUES ('57789', '27', '406', null);
INSERT INTO `auth_channel` VALUES ('57790', '27', '407', null);
INSERT INTO `auth_channel` VALUES ('57791', '27', '408', null);
INSERT INTO `auth_channel` VALUES ('57792', '27', '410', null);
INSERT INTO `auth_channel` VALUES ('57793', '27', '411', null);
INSERT INTO `auth_channel` VALUES ('57794', '27', '412', null);
INSERT INTO `auth_channel` VALUES ('57795', '27', '413', null);
INSERT INTO `auth_channel` VALUES ('57796', '27', '414', null);
INSERT INTO `auth_channel` VALUES ('57797', '27', '415', null);
INSERT INTO `auth_channel` VALUES ('57798', '27', '420', null);
INSERT INTO `auth_channel` VALUES ('57799', '27', '430', null);
INSERT INTO `auth_channel` VALUES ('57800', '27', '432', null);
INSERT INTO `auth_channel` VALUES ('57801', '27', '433', null);
INSERT INTO `auth_channel` VALUES ('57802', '27', '434', null);
INSERT INTO `auth_channel` VALUES ('57803', '27', '436', null);
INSERT INTO `auth_channel` VALUES ('57804', '27', '446', null);
INSERT INTO `auth_channel` VALUES ('57805', '27', '450', null);
INSERT INTO `auth_channel` VALUES ('57806', '27', '457', null);
INSERT INTO `auth_channel` VALUES ('57807', '27', '458', null);
INSERT INTO `auth_channel` VALUES ('57808', '27', '459', null);
INSERT INTO `auth_channel` VALUES ('57809', '27', '463', null);
INSERT INTO `auth_channel` VALUES ('57810', '27', '464', null);
INSERT INTO `auth_channel` VALUES ('57811', '27', '466', null);
INSERT INTO `auth_channel` VALUES ('57812', '27', '468', null);
INSERT INTO `auth_channel` VALUES ('57813', '27', '469', null);
INSERT INTO `auth_channel` VALUES ('57814', '27', '471', null);
INSERT INTO `auth_channel` VALUES ('57815', '27', '475', null);
INSERT INTO `auth_channel` VALUES ('57816', '27', '476', null);
INSERT INTO `auth_channel` VALUES ('57817', '27', '478', null);
INSERT INTO `auth_channel` VALUES ('57818', '27', '479', null);
INSERT INTO `auth_channel` VALUES ('57819', '27', '482', null);
INSERT INTO `auth_channel` VALUES ('57820', '27', '483', null);
INSERT INTO `auth_channel` VALUES ('57821', '27', '486', null);
INSERT INTO `auth_channel` VALUES ('57822', '27', '491', null);
INSERT INTO `auth_channel` VALUES ('57823', '27', '494', null);
INSERT INTO `auth_channel` VALUES ('57824', '27', '496', null);
INSERT INTO `auth_channel` VALUES ('57825', '27', '498', null);
INSERT INTO `auth_channel` VALUES ('57826', '27', '506', null);
INSERT INTO `auth_channel` VALUES ('57827', '27', '509', null);
INSERT INTO `auth_channel` VALUES ('57828', '27', '513', null);
INSERT INTO `auth_channel` VALUES ('57829', '27', '516', null);
INSERT INTO `auth_channel` VALUES ('57830', '27', '518', null);
INSERT INTO `auth_channel` VALUES ('57831', '27', '520', null);
INSERT INTO `auth_channel` VALUES ('57832', '27', '521', null);
INSERT INTO `auth_channel` VALUES ('57833', '27', '524', null);
INSERT INTO `auth_channel` VALUES ('57834', '27', '526', null);
INSERT INTO `auth_channel` VALUES ('57835', '27', '528', null);
INSERT INTO `auth_channel` VALUES ('57836', '27', '530', null);
INSERT INTO `auth_channel` VALUES ('57837', '27', '534', null);
INSERT INTO `auth_channel` VALUES ('57838', '27', '540', null);
INSERT INTO `auth_channel` VALUES ('57839', '27', '541', null);
INSERT INTO `auth_channel` VALUES ('57840', '27', '542', null);
INSERT INTO `auth_channel` VALUES ('57841', '27', '550', null);
INSERT INTO `auth_channel` VALUES ('57842', '27', '551', null);
INSERT INTO `auth_channel` VALUES ('57843', '27', '555', null);
INSERT INTO `auth_channel` VALUES ('57844', '27', '558', null);
INSERT INTO `auth_channel` VALUES ('57845', '27', '571', null);
INSERT INTO `auth_channel` VALUES ('57846', '27', '572', null);
INSERT INTO `auth_channel` VALUES ('57847', '27', '576', null);
INSERT INTO `auth_channel` VALUES ('57848', '27', '577', null);
INSERT INTO `auth_channel` VALUES ('57849', '27', '580', null);
INSERT INTO `auth_channel` VALUES ('57850', '27', '581', null);
INSERT INTO `auth_channel` VALUES ('57851', '27', '584', null);
INSERT INTO `auth_channel` VALUES ('57852', '27', '585', null);
INSERT INTO `auth_channel` VALUES ('57853', '27', '587', null);
INSERT INTO `auth_channel` VALUES ('57854', '27', '591', null);
INSERT INTO `auth_channel` VALUES ('57855', '27', '593', null);
INSERT INTO `auth_channel` VALUES ('57856', '27', '599', null);
INSERT INTO `auth_channel` VALUES ('57857', '27', '602', null);
INSERT INTO `auth_channel` VALUES ('57858', '27', '605', null);
INSERT INTO `auth_channel` VALUES ('57859', '27', '606', null);
INSERT INTO `auth_channel` VALUES ('57860', '27', '613', null);
INSERT INTO `auth_channel` VALUES ('57861', '27', '614', null);
INSERT INTO `auth_channel` VALUES ('57862', '27', '617', null);
INSERT INTO `auth_channel` VALUES ('57863', '27', '619', null);
INSERT INTO `auth_channel` VALUES ('57864', '27', '624', null);
INSERT INTO `auth_channel` VALUES ('57865', '27', '630', null);
INSERT INTO `auth_channel` VALUES ('57866', '27', '639', null);
INSERT INTO `auth_channel` VALUES ('57867', '27', '642', null);
INSERT INTO `auth_channel` VALUES ('57868', '27', '649', null);
INSERT INTO `auth_channel` VALUES ('57869', '27', '650', null);
INSERT INTO `auth_channel` VALUES ('57870', '27', '651', null);
INSERT INTO `auth_channel` VALUES ('57871', '27', '655', null);
INSERT INTO `auth_channel` VALUES ('57872', '27', '657', null);
INSERT INTO `auth_channel` VALUES ('57873', '27', '661', null);
INSERT INTO `auth_channel` VALUES ('57874', '27', '669', null);
INSERT INTO `auth_channel` VALUES ('57875', '27', '674', null);
INSERT INTO `auth_channel` VALUES ('57876', '27', '676', null);
INSERT INTO `auth_channel` VALUES ('57877', '27', '677', null);
INSERT INTO `auth_channel` VALUES ('57878', '27', '689', null);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`) USING BTREE,
  KEY `idx-auth_item-type` (`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', 'root权限', null, null, '1445273347', '1531648328');
INSERT INTO `auth_item` VALUES ('/admin', '2', '首页', null, null, null, null);
INSERT INTO `auth_item` VALUES ('/admin/daily', '2', '首页', null, null, null, null);
INSERT INTO `auth_item` VALUES ('/admin/deny-login', '2', '禁止登录', null, null, '1540354033', '1540354033');
INSERT INTO `auth_item` VALUES ('/admin/deny-pay', '2', '禁止充值', null, null, '1540354033', '1540354033');
INSERT INTO `auth_item` VALUES ('/admin/pay-order', '2', '首页', null, null, null, null);
INSERT INTO `auth_item` VALUES ('/admin/pay-order/push-order', '2', '补单/补发', null, null, null, null);
INSERT INTO `auth_item` VALUES ('/admin/permission', '2', '权限列表-首页', null, null, '1542966636', '1542966636');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', '权限列表-新增', null, null, '1542966653', '1542966685');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', '权限列表-删除', null, null, '1542966663', '1542966663');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', '权限列表-更新', null, null, '1542966667', '1542966667');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', '权限列表-查看', null, null, '1542966659', '1542966659');
INSERT INTO `auth_item` VALUES ('/admin/roles', '2', '角色管理-首页', null, null, '1542966643', '1542966643');
INSERT INTO `auth_item` VALUES ('/admin/roles/create', '2', '角色管理-新增', null, null, '1542966679', '1542966679');
INSERT INTO `auth_item` VALUES ('/admin/roles/delete', '2', '角色管理-删除', null, null, '1542966690', '1542966690');
INSERT INTO `auth_item` VALUES ('/admin/roles/update', '2', '角色管理-更新', null, null, '1542966695', '1542966695');
INSERT INTO `auth_item` VALUES ('/admin/roles/view', '2', '角色管理-查看', null, null, '1542966699', '1542966699');
INSERT INTO `auth_item` VALUES ('/admin/route', '2', '路由列表-首页', null, null, '1542966726', '1542966726');
INSERT INTO `auth_item` VALUES ('/admin/route/delete', '2', '路由列表-删除', null, null, '1542966743', '1542966743');
INSERT INTO `auth_item` VALUES ('/admin/route/update', '2', '路由列表-更新', null, null, '1542966737', '1542966737');
INSERT INTO `auth_item` VALUES ('/admin/rule', '2', '规则列表-首页', null, null, '1542966765', '1542966765');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', '规则列表-新增', null, null, '1542966772', '1542966772');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', '规则列表-删除', null, null, '1542966781', '1542966781');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', '规则列表-修改', null, null, '1542966776', '1542966776');
INSERT INTO `auth_item` VALUES ('/admin/sdk-user', '2', '首页', null, null, '1540354033', '1540354033');
INSERT INTO `auth_item` VALUES ('/admin/user', '2', '用户管理-首页', null, null, '1542966797', '1542966797');
INSERT INTO `auth_item` VALUES ('/admin/user/change-name', '2', '用户管理-修改名字', null, null, '1542966813', '1542966813');
INSERT INTO `auth_item` VALUES ('/admin/user/create', '2', '用户管理-新增', null, null, '1542966819', '1542966830');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', '用户管理-删除', null, null, '1542966825', '1542966825');
INSERT INTO `auth_item` VALUES ('/admin/user/update', '2', '用户管理-更新', null, null, '1542966835', '1542966835');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', '用户管理-查看', null, null, '1542966802', '1542966802');
INSERT INTO `auth_item` VALUES ('/filter', '2', '过滤条件小组件请求', null, null, '1542377866', '1542377866');
INSERT INTO `auth_item` VALUES ('/filter/*', '2', '过滤条件小组件root', null, null, '1542377850', '1542377875');
INSERT INTO `auth_item` VALUES ('/setting/*', '2', '权限管理（所有）', null, null, '1445273367', '1446980086');
INSERT INTO `auth_item` VALUES ('/setting/permission', '2', '权限列表（菜单）', null, null, '1446978274', '1446978274');
INSERT INTO `auth_item` VALUES ('/setting/permission/*', '2', '权限列表（所有）', null, null, '1446978304', '1446978304');
INSERT INTO `auth_item` VALUES ('/setting/permission/create', '2', '权限列表（新增）', null, null, '1446978386', '1446978386');
INSERT INTO `auth_item` VALUES ('/setting/permission/delete', '2', '权限列表（删除）', null, null, '1446978795', '1446978795');
INSERT INTO `auth_item` VALUES ('/setting/permission/update', '2', '权限列表（修改）', null, null, '1446978532', '1446978532');
INSERT INTO `auth_item` VALUES ('/setting/permission/view', '2', '权限列表（授权）', null, null, '1446978634', '1446978634');
INSERT INTO `auth_item` VALUES ('/setting/roles', '2', '角色管理（菜单）', null, null, '1446385324', '1446977972');
INSERT INTO `auth_item` VALUES ('/setting/roles/*', '2', '角色管理（所有）', null, null, '1446977859', '1446977859');
INSERT INTO `auth_item` VALUES ('/setting/roles/create', '2', '角色管理（新增）', null, null, '1446385374', '1446976895');
INSERT INTO `auth_item` VALUES ('/setting/roles/delete', '2', '角色管理（删除）', null, null, '1446977154', '1446977154');
INSERT INTO `auth_item` VALUES ('/setting/roles/update', '2', '角色管理（修改）', null, null, '1446977126', '1446977126');
INSERT INTO `auth_item` VALUES ('/setting/roles/view', '2', '角色管理（授权）', null, null, '1446385418', '1446976924');
INSERT INTO `auth_item` VALUES ('/setting/route', '2', '路由列表（菜单）', null, null, '1446979171', '1446979171');
INSERT INTO `auth_item` VALUES ('/setting/route/*', '2', '路由列表（所有）', null, null, '1446979317', '1446979317');
INSERT INTO `auth_item` VALUES ('/setting/route/create', '2', '路由列表（新增）', null, null, '1446979199', '1446979199');
INSERT INTO `auth_item` VALUES ('/setting/route/delete', '2', '路由列表（删除）', null, null, '1446979221', '1446979221');
INSERT INTO `auth_item` VALUES ('/setting/rule', '2', '规则列表（菜单）', null, null, '1446979291', '1446979291');
INSERT INTO `auth_item` VALUES ('/setting/rule/*', '2', '规则列表（所有）', null, null, '1446979531', '1446979531');
INSERT INTO `auth_item` VALUES ('/setting/rule/create', '2', '规则列表（新增）', null, null, '1446979544', '1446979544');
INSERT INTO `auth_item` VALUES ('/setting/rule/delete', '2', '规则列表（删除）', null, null, '1446979583', '1446979583');
INSERT INTO `auth_item` VALUES ('/setting/rule/update', '2', '规则列表（修改）', null, null, '1446979567', '1446979567');
INSERT INTO `auth_item` VALUES ('/setting/rule/view', '2', '规则列表（详情）', null, null, '1446979599', '1446979599');
INSERT INTO `auth_item` VALUES ('/setting/user', '2', '用户管理（菜单）', null, null, '1446385148', '1446978141');
INSERT INTO `auth_item` VALUES ('/setting/user/*', '2', '用户管理（所有）', null, null, '1446978175', '1446978175');
INSERT INTO `auth_item` VALUES ('/setting/user/change-name', '2', '快捷改用户名', null, null, '1459411553', '1459411553');
INSERT INTO `auth_item` VALUES ('/setting/user/create', '2', '用户管理（新增）', null, null, '1446977571', '1446977571');
INSERT INTO `auth_item` VALUES ('/setting/user/delete', '2', '用户管理（删除）', null, null, '1446977488', '1446977488');
INSERT INTO `auth_item` VALUES ('/setting/user/update', '2', '用户管理（修改）', null, null, '1446977393', '1446977393');
INSERT INTO `auth_item` VALUES ('/setting/user/view', '2', '用户管理（授权）', null, null, '1446977422', '1446977422');
INSERT INTO `auth_item` VALUES ('/site', '2', 'Yii2-admin-theme后台首页', null, null, '1542017492', '1542017497');
INSERT INTO `auth_item` VALUES ('/site/about', '2', '关于我们', null, null, '1542017567', '1542017567');
INSERT INTO `auth_item` VALUES ('/site/captcha', '2', '登录验证码 ', null, null, '1542017356', '1542273403');
INSERT INTO `auth_item` VALUES ('/site/close-win', '2', '关闭iframe中转页面', null, null, '1542017584', '1542017584');
INSERT INTO `auth_item` VALUES ('/site/contact', '2', '联系我们', null, null, '1542017507', '1542017507');
INSERT INTO `auth_item` VALUES ('/site/error', '2', '错误页面', null, null, '1542016399', '1542273565');
INSERT INTO `auth_item` VALUES ('/site/login', '2', '登录', null, null, '1542017270', '1542017346');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', '注销', null, null, '1542017502', '1542017502');
INSERT INTO `auth_item` VALUES ('/site/main', '2', '首页-关键报表', null, null, '1542967756', '1542967756');
INSERT INTO `auth_item` VALUES ('/site/reset-password', '2', '修改密码', null, null, '1459780141', '1459780141');
INSERT INTO `auth_item` VALUES ('/site/select', '2', '选择游戏', null, null, '1459394594', '1459394594');
INSERT INTO `auth_item` VALUES ('demo测试账号', '1', 'demo测试账号', null, null, '1544503565', '1544503565');
INSERT INTO `auth_item` VALUES ('普通管理员', '1', '普通管理员', null, null, '1440871961', '1440871961');
INSERT INTO `auth_item` VALUES ('测试1', '2', '测试1', null, null, '1541997258', '1542009523');
INSERT INTO `auth_item` VALUES ('测试2', '2', '测试2', null, null, '1542009571', '1542009571');
INSERT INTO `auth_item` VALUES ('测试4', '2', '测试4', null, null, '1542010241', '1542010241');
INSERT INTO `auth_item` VALUES ('超级管理员', '1', '拥有所有权限', null, null, '1440871961', '1446885517');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('普通管理员', '/*');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '/*');
INSERT INTO `auth_item_child` VALUES ('测试1', '/admin');
INSERT INTO `auth_item_child` VALUES ('测试1', '/admin/daily');
INSERT INTO `auth_item_child` VALUES ('测试1', '/admin/pay-order');
INSERT INTO `auth_item_child` VALUES ('测试1', '/admin/pay-order/push-order');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/admin/permission');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/admin/roles');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/admin/route');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/admin/rule');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/admin/user');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/filter');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/site');
INSERT INTO `auth_item_child` VALUES ('demo测试账号', '/site/main');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '普通管理员');
INSERT INTO `auth_item_child` VALUES ('测试1', '测试2');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=321 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '-AyPgUhgAZ3F3439pvlXqoDqW_K4GAM8', '$2y$13$23.BtX8EftLRUZOo5N28JuOef.toRnGYF4aJNyWRcZuBRXS93OlCy', null, '1044748759@qq.com', '110', '10', '10', '1460604540', '1543558364');
INSERT INTO `user` VALUES ('320', 'demo', 'fLFmsQ1h5jVyDJmoRkE_C04CgoeoKoOz', '$2y$13$1D5OoJClOO7lMT2LtpG2zuEH0ukt/bZs9f2obid5Yde5N08UdRxgS', null, '', '110', '10', '10', '1542962893', '1542962893');
SET FOREIGN_KEY_CHECKS=1;
