/*
 Navicat Premium Data Transfer

 Source Server         : demo
 Source Server Type    : MySQL
 Source Server Version : 80040 (8.0.40)
 Source Host           : localhost:3306
 Source Schema         : adminstrator

 Target Server Type    : MySQL
 Target Server Version : 80040 (8.0.40)
 File Encoding         : 65001

 Date: 30/12/2024 13:46:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pending_questions
-- ----------------------------
DROP TABLE IF EXISTS `pending_questions`;
CREATE TABLE `pending_questions`  (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `option_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `option_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `option_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT NULL,
  `option_d` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT NULL,
  `correct_answer` enum('A','B','C','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `difficulty` enum('easy','medium','hard') CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT 'medium',
  PRIMARY KEY (`question_id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `pending_questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pending_questions
-- ----------------------------
INSERT INTO `pending_questions` VALUES (1, 7, '“你好”用日语怎么说', '阿里嘎多', '空尼几瓦', '果咩纳塞', '私密马赛', 'A', 'easy');

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `question_id` int NOT NULL AUTO_INCREMENT,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `option_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `option_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `option_c` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT NULL,
  `option_d` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT NULL,
  `correct_answer` enum('A','B','C','D') CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `difficulty` enum('easy','medium','hard') CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT 'medium',
  `accuracy_rate` decimal(5, 2) NULL DEFAULT 0.00,
  `total_times` int NULL DEFAULT 0,
  `correct_times` int NULL DEFAULT 0,
  PRIMARY KEY (`question_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES (1, '《天工开物》的作者是', '沈括', '宋应星', '徐光启', '李时珍', 'B', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (2, '《天工开物》中记载的哪种技术涉及到利用水力驱动机械装置', '制瓷\r\n\r\n', '冶铁', '纺织', '鼓风冶铁中的水排', 'D', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (3, '在《天工开物》“乃粒” 章节中，重点讲述的是', '各种矿物开采', '农作物种植', '金属冶炼', '陶瓷制作', 'B', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (4, '《天工开物》中提到的 “炒钢法” 属于', '制盐工艺', '纺织工艺', '炼钢工艺', ' 造纸工艺', 'C', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (5, '以下哪种物品的制作在《天工开物》中有详细记载且与百姓生活密切相关', ' 仙丹', '琉璃盏', '瓦罐', '玉如意', 'C', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (6, '《天工开物》中提到的 “升炼倭铅” 之法，是关于哪种金属的冶炼技术', '铜', '锌', '铁', '锡', 'B', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (7, '以下哪种说法符合《天工开物》中对制瓷过程的记载', '制瓷原料只需高岭土一种', '瓷器烧制温度在 800℃左右', '釉料配方固定不变', '需经过淘泥、拉坯、印坯、利坯、画坯、上釉、烧窑等多道工序', 'D', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (8, '根据《天工开物》，以下关于古代纺织技术的说法正确的是', ' 麻纺织不需要进行脱胶处理', '提花机只能织出简单的花纹', '蚕茧缫丝时水温对丝质没有影响', '棉纺织中 “弹花” 是为了使棉花疏松', 'D', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (9, '《天工开物》中记载的 “灌钢法” 主要是用于', '提高铜的纯度', '制作青铜器', '炼钢', '铸造铁器', 'C', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (10, '在《天工开物》的 “作咸” 篇中，没有提到的制盐方法是', '海盐煎晒法', '井盐开采法', '池盐晒制法', '岩盐挖掘法', 'D', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (11, '按照《天工开物》的记载，以下哪种物品的制作过程中用到了 “固济” 这一操作', '朱砂', '石灰', '纸张', '砖瓦', 'A', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (12, '《天工开物》中提到的利用自然发酵除去丝胶的方法，是在以下哪个工序中', '缫丝', '络丝', '捻丝', '染丝', 'A', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (13, '根据《天工开物》，以下关于古代颜料制作的说法错误的是', '银朱是由水银和硫反应制成', '铅白的制作与醋酸有关', '石绿只能从天然矿石中获取', '制作朱砂的过程中涉及化学反应', 'C', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (14, '《天工开物》中记载的 “采煤” 章节提到，为了防止瓦斯积聚引发事故，采用了何种措施', '向矿井中注水', '用竹筒通风换气', '在矿井内燃烧艾草', '用石灰吸收瓦斯', 'B', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (15, '在《天工开物》的 “舟车” 篇中，对哪种交通工具的结构、制造材料及工艺描述最为详细', '马车', '帆船', '独轮车', '轿子', 'B', 'medium', 0.00, 0, 0);
INSERT INTO `questions` VALUES (16, '《天工开物》中提到的利用金、银、铜、锡、铅、锌、汞等金属的物理性质和化学活泼性的不同来分离或检验金属的方法中，把白银从含银的黄金里分离出来时，利用硼砂起助熔作用，再入铅少许把银钩出，这种方法在近代冶金学中被称为', '熔融分离法', '熔融提取法', '助熔分离法', '铅钩提取法', 'B', 'hard', 0.00, 0, 0);
INSERT INTO `questions` VALUES (17, '根据《天工开物》记载，在红曲制造过程中，加入明矾水的主要作用是', '提供营养物质', '调节酸碱度以抑制杂菌生长', '加速发酵过程', '使红曲颜色更鲜艳', 'B', 'hard', 0.00, 0, 0);
INSERT INTO `questions` VALUES (18, '《天工开物》中描述的水碓是利用水力驱动，通过连杆机构将水力转化为舂米的动力，其连杆机构的主要作用不包括以下哪一项', '改变力的方向', '增加力的大小', '传递动力', '使运动更平稳', 'B', 'hard', 0.00, 0, 0);
INSERT INTO `questions` VALUES (19, '在《天工开物》记载的制糖过程中，加石灰于蔗汁中，其目的是', '使蔗汁颜色更洁白', '达到非糖分凝聚的最佳 pH 值', '增加蔗糖的产量', '去除蔗汁中的异味', 'B', 'hard', 0.00, 0, 0);
INSERT INTO `questions` VALUES (20, '《天工开物》中提到的 “舟车” 篇里，帆船能够逆风行驶的主要原理是', '利用特殊的船帆形状，使风产生侧向力推动帆船前进', '通过调整船舵的角度，改变水流对船的作用力来实现逆风行驶', '依靠船身的特殊设计，减少逆风的阻力从而缓慢前进', '借助海流的力量，抵消逆风的影响实现逆风行驶', 'A', 'hard', 0.00, 0, 0);
INSERT INTO `questions` VALUES (21, '《天工开物》中记载了一种金属冶炼方法：“凡铁分生、熟，出炉未炒则生，既炒则熟。生熟相和，炼成则钢。” 在此过程中，“炒” 这一步骤的主要作用是', '降低铁的熔点', '除去铁中的杂质', '增加铁中的含碳量', '调节铁中的碳含量', 'D', 'hard', 0.00, 0, 0);
INSERT INTO `questions` VALUES (25, '元旦是几月几日？', '2月2日', '1月31日', '10月1日', '1月1日', 'D', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (26, '《你的名字》是哪个导演的作品？', '宫崎骏', '新海诚', '韩寒', '郭敬明', 'B', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (27, '“你好”用日语怎么说？', '私密马赛', '阿里嘎多', '空尼几瓦', '果咩纳塞', 'B', 'easy', 0.00, 0, 0);
INSERT INTO `questions` VALUES (28, '一个星期有几天？', '1', '7', '5', '3', 'B', 'easy', 0.00, 0, 0);

-- ----------------------------
-- Table structure for responses
-- ----------------------------
DROP TABLE IF EXISTS `responses`;
CREATE TABLE `responses`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `response` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL,
  `status` enum('unread','read') CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT 'unread',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of responses
-- ----------------------------
INSERT INTO `responses` VALUES (1, 4, '感谢您提供的题目，我们已加入题库中', 'unread');
INSERT INTO `responses` VALUES (2, 5, '抱歉您的题目并没有通过审核', 'unread');
INSERT INTO `responses` VALUES (4, 4, '抱歉您的题目并没有通过审核', 'unread');
INSERT INTO `responses` VALUES (5, 6, 'hello', 'unread');
INSERT INTO `responses` VALUES (6, 5, '感谢您提供的题目，我们已加入题库中', 'unread');
INSERT INTO `responses` VALUES (7, 6, 'nihao', 'unread');
INSERT INTO `responses` VALUES (9, 18, '祝全平台用户元旦快乐！！', 'unread');
INSERT INTO `responses` VALUES (13, 18, '感谢您提供的题目，我们已加入题库中', 'unread');
INSERT INTO `responses` VALUES (14, 46, '抱歉您的题目并没有通过审核', 'unread');
INSERT INTO `responses` VALUES (18, 46, '对啊', 'unread');
INSERT INTO `responses` VALUES (19, 18, '抱歉您的题目并没有通过审核', 'unread');
INSERT INTO `responses` VALUES (20, 18, '感谢您提供的题目，我们已加入题库中', 'unread');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT NULL,
  `score` int UNSIGNED NULL DEFAULT 0,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT 'img/default-avatar.svg',
  PRIMARY KEY (`id`, `email`) USING BTREE,
  INDEX `id`(`id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (4, 'jk', '13384938@163.com', '$2y$10$iXPV6jyKIXXrVXDvV0BlJeiomMEE3Wi/4bp/OBNDDXieLizMckmi2', 25, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (5, 'a', '789324732948@qq.com', '$2y$10$NrOelThwPqyoH/FRfgTwIuhFiGGfTGRq/amdhdtsPNgVfxfGGPdHe', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (6, 'ewiu', '389208@qq.com', '$2y$10$VVdIGlAIJkgzTmPWMB7nleGpCtqJDNeZu.00TjWdwJKJdhf/sMDlC', 0, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (7, '王', '1277339251@qq.com', '$2y$10$LqDf6i8oEUIcvCNrSS/Aa.wvaVWUtr9eaGfdHuWQiKss45JK2ztqW', 0, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (9, 'z', '111111@qq.com', '$2y$10$VRd5nqgMLFrnPuPDPEEx7uqyHLgdOHoUWIbQ4vuEW72lGkYIZiPea', 0, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (10, '欧珀', '483905823@qq.com', '$2y$10$jGeZ5oawPAOfTEYPPtVlueHnq0N6ICtd9nnNFyfzjbCw7IsUUAHAO', 0, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (11, '你谁啊', '79878576@163.com', '$2y$10$xAaDHCSvYcS.sSpvADPOXOiCaI66U9gtiePL18rF0DkvJZbpzpLnC', 30, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (13, '我是第一', 'wqiu1219i@163.com', '$2y$10$QHSALttKjXOtVGTbcu7Yhu2KkZMXM6cbcJFCmMI1t0igygN8D54qO', 10000, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (14, 'ye', '73482211847@qq.com', '$2y$10$sG.Q8qnILZhC6baZ6wXyTeGCVvc3m8icLjfEqJ2xI80v9VwJmDKL6', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (15, 'huwu', '66767483@qq.com', '$2y$10$pY2iMJpOiCRHr.HGdG/DbuPfMDEIrRuIOU.Db7h3WT9VG2R5FE3oi', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (16, '00', '00000000@qq.com', '$2y$10$Pd2bf4cp/BfnbrY5ksE.juQvcp5iwLnrqrxdiiVSJ/F8ky4XlVavG', 45, 'img/avatar9.svg');
INSERT INTO `user` VALUES (17, 'gsh', 'y907803932902-3@qq.com', '$2y$10$Alj8HRcnYGv4IF4uiuBSV.R72DElMP1TPsrAxdGS73i0fRihOeXZa', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (18, '66', '666666@google.com', '$2y$10$nRd6aAD4WU.KX7VOOS487uGUL/zvHU/GjmUAf9zj9wNqNdRM8VVHS', 75, 'img/avatar2.svg');
INSERT INTO `user` VALUES (19, '1', '11111111@qq.com', '$2y$10$E/6HtAYBw5CX.f04zPf/ZeP3ZmZa45CEf2ADxZamQII3ICJG2OoH2', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (20, 'gou', 'gogogo@google.com', '$2y$10$azxvm4rowdN1F/AZKH9FNu7JOYpmi0hcAVXw6KsOYo3Vh8f1wq1J2', 0, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (21, 'out', 'outoutout@google.com', '$2y$10$olrayLxJcqdTffIGyAS3q.bCWbGH1JedKBaoK95rHB8Aztq5kH672', 0, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (22, 'haha', 'hhhhhhh@123.com', '$2y$10$Wh2H2f10.HTUDgaINF0iTO4mg7yuFraPGpIg8/.T.CrAmqabxdHwy', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (23, '2', '22222222@qq.com', '$2y$10$kKzNsNzvxKJKrj3UTAz3KeX/OgVDFPpUeimK61L.It6QLsIvtr89e', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (24, '3', '33333333@qq.com', '$2y$10$Y/yTiQHCf4NznUfhOyuijeoOwQ.CWARjpxAe7FOeb/NP/M3Hw95jC', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (25, '玛卡巴卡', 'makabaka@outlook.com', '$2y$10$tTM5FUxHlwERFySMAj5gZOgJxzbTlDtjZiiWL2zItkq5imxaNdA5m', 20, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (26, '唔西迪西', 'wuxidixi@outlook.com', '$2y$10$IZfiKEh1bv1VcQGQWix6JuYoPYb.tweWqHPoEtsPnK9RB0gBCiGSW', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (27, 'daiyu', 'lindaiyu@outlook.com', '$2y$10$gxeUBW4bhlAwWWAzLlfPTeJN9X.ZFYzHxvNS6ANNXE4H5lMR4VpSy', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (28, 'baoyu', 'jiabaoyu@outlook.com', '$2y$10$sacBzRZtvvjY7IRnpi5pLeLCtT0f3R0NuPrUkbKjsdTbIW2sdfdOS', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (29, '疯狂戴夫', 'fengkuangdaifu@outlook.com', '$2y$10$zUBpAl1s7egu/H7OYsWLzO3Pa36v9Pn4EWidAUi9LT4CHje8tidNy', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (30, '僵尸', 'jiangshi@outlook.com', '$2y$10$Q8BaTlpJSgfaH59vDXDR2OHduPntUGnh4bxRW7IxPfJQkjY9DDuiW', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (31, '僵尸吃掉了你的脑子', 'jiangshichinaozi@outlook.com', '$2y$10$O0B3UM3kUI4.Zsrf42lKeOEtDhh4h/BJeIus.FdMsoSZK1oiGyXii', 20, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (32, 'pigpig', 'zhuzhuxia@outlook.com', '$2y$10$YxbFRVmUdCMuJOxgkw.qbeV8qoZbmfBKGzMShnznItQmm4aTK8DX2', 15, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (33, '你是猪', 'nishizhu@outlook.com', '$2y$10$.26yXfLaokGDYzE7sU34ferDhUnuNdooCQaVAll1FTQ9time4noHi', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (34, '好人', 'haoren@outlook.com', '$2y$10$R5qIXVbxEeqtFQQlxCJFGuVUwGKfmx1OMBQ7zbwllAjmYFZ4BPa8C', 20, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (35, '坏人', 'huairen@outlook.com', '$2y$10$zJJfhWb3SaBQn0poGgjXz.AHg3SrCR90YJ6PChZz2UPjbN5TXzqUK', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (36, '小人', 'xiaoren@outlook.com', '$2y$10$DyX2JeDwcPGVphaEK6bpPecmf4FpZikcXLfKXL7RNzR1DMv4Z9eHe', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (37, '大人', 'daren@outlook.com', '$2y$10$odEtighKAMf0HTP8yBDSiuPmxk3b59AWzQR09jaxUSmxdilcBPTHm', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (38, '你牛', 'niniu@outlook.com', '$2y$10$5ZZUS8kULFhzWOdyq8bo9.IgNJxiBWKgqr10LrVaAmr6wPBWEzaom', 30, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (39, '包天', 'baoqintian@outlook.com', '$2y$10$/KjZ32ihvMrNMkyK8nY5Gef/uqlQqWuj3hBIDNoftQdDL4xIfZ0Pa', 20, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (40, '健将', 'jianjiang@outlook.com', '$2y$10$AndsMUMSDa6GLCxvKaoOwugWPxTGKeBhNkGNTyVyGaXplp8EJ6YVa', 10, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (41, '健身狂', 'jianshenkuang@outlook.com', '$2y$10$Hq1QdV6k5PykvFdIXSlEY.elIphNwzHkKaeeJOdzV7WQ/pGuea5C2', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (42, '杠铃', 'gangling@outlook.com', '$2y$10$KhX1ogO68RNLXTW0IN/.eOyXnK2L/BGjEofQCX3Vc4RjKELop1dhu', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (43, '哑铃', 'yaling@outlook.com', '$2y$10$zKNBGQbtD6MLsp2a1pTAoOBxXEW/nbhG4RzcTAF8VyVsf9hP5wWrG', 5, 'img/default-avatar.svg');
INSERT INTO `user` VALUES (44, 'hhh', '1313@qq.com', '$2y$10$A6V5OZdtUbOGJQYzK7G68ujpSpa1nIgDSY8SAjiPU/4bQRp8Eu41C', 5, 'img/avatar2.svg');
INSERT INTO `user` VALUES (46, 'uu', '222@qq.com', '$2y$10$IzFtHrrqacCcs4F.zqsWQu/Jexap2af6XQGxBUw2BMwUCBF2S.39W', 20, 'img/avatar4.svg');
INSERT INTO `user` VALUES (47, '9', '999999@qq.com', '$2y$10$TPO5MvR0GCvwtHm7COR1aubiG09bGClyOjBDi.ci1k6WVnNnDz2FS', 0, 'img/default-avatar.svg');

-- ----------------------------
-- Table structure for user_feedback
-- ----------------------------
DROP TABLE IF EXISTS `user_feedback`;
CREATE TABLE `user_feedback`  (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `status` enum('未答复','已答复') CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NULL DEFAULT '未答复',
  PRIMARY KEY (`feedback_id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_feedback
-- ----------------------------
INSERT INTO `user_feedback` VALUES (1, 6, 'hello', '已答复');
INSERT INTO `user_feedback` VALUES (2, 16, '我觉得你们做的网站太好看了！！一定要继续加油呀！！！！！！！', '已答复');
INSERT INTO `user_feedback` VALUES (3, 16, '期待下一个作品！\r\n', '已答复');
INSERT INTO `user_feedback` VALUES (4, 16, '元旦快乐！', '已答复');
INSERT INTO `user_feedback` VALUES (5, 46, '今天跨年夜', '已答复');
INSERT INTO `user_feedback` VALUES (6, 16, '过年发红包吗', '未答复');

SET FOREIGN_KEY_CHECKS = 1;
