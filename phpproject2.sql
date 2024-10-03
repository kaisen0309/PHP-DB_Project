-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2023-06-06 13:47:49
-- 伺服器版本： 8.0.31
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `phpproject`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `Co_ID` int NOT NULL AUTO_INCREMENT,
  `Co_recode` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Co_time` date NOT NULL,
  `Co_star` float NOT NULL,
  `C_ID` int NOT NULL,
  `T_ID` int NOT NULL,
  PRIMARY KEY (`Co_ID`),
  KEY `FK_C_ID` (`C_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`Co_ID`, `Co_recode`, `Co_time`, `Co_star`, `C_ID`, `T_ID`) VALUES
(1, '期待了很久的主題，終於玩到了~ 場景道具都很不錯，還有很搶鏡的微笑天使，謎題滿多的，雖然8位成員都不是全新手，但忙主線忙個人任務還是時間很緊湊，不太會有閒著的時候，最後集齊關鍵道具選了最好的逃脫方法真', '2023-06-01', 5, 2, 4),
(2, '謎題不難，適合新手入坑的佳作，場景非常可愛，劇情有洋蔥。', '2023-05-21', 5, 4, 5),
(3, '新手推薦，過程中有一些小的互動，謎題偏直覺，樂趣一樣是可以尋找金幣，故事鋪成也蠻流暢，喜歡海盜主題可以來試試看。', '2023-05-28', 4.5, 1, 10),
(4, '機關特殊，全機關互動主題。玩法特別，全程小天使陪伴，很有科技感的主題', '2023-05-22', 5, 3, 9),
(5, '有趣好玩!', '2023-05-23', 4, 4, 5),
(6, '適合新手!', '2023-06-13', 4, 2, 4),
(7, '推推!', '2023-06-06', 4.5, 7, 5),
(8, '結合現代科技真的太讚啦!', '2023-06-12', 5, 20, 9);

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `C_ID` int NOT NULL AUTO_INCREMENT,
  `C_name` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `C_phone` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `C_mail` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `C_sex` varchar(2) COLLATE utf8mb3_unicode_ci NOT NULL,
  `C_password` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `customer`
--

INSERT INTO `customer` (`C_ID`, `C_name`, `C_phone`, `C_mail`, `C_sex`, `C_password`) VALUES
(1, '柯阿潔', '0901103320', 'A1103320@mail.n', '女', 'A1103320'),
(2, '謝小勳', '0901103317', 'A1103317@mail.n', '男', 'A1103317'),
(3, '王大衡', '0901103325', 'A1103325@mail.n', '男', 'A1103325'),
(4, '張旆旆', '0901103301', 'A1103301@mail.n', '女', 'A1103301'),
(5, '楊阿翔', '0901103351', 'A1103351@mail.n', '男', 'A1103351'),
(6, '辜程程', '0901103311', 'A1103311@mail.n', '男', 'A1103311'),
(11, '阿德', '0901103399', 'A1103399@mail.n', '男', 'A1103399'),
(12, '阿楷', '0901103398', 'A1103398@mail.n', '男', 'A1103398'),
(13, '阿姍', '0901103333', 'A1103333@mail.n', '女', 'A1103333'),
(14, '阿毅', '0901105199', 'A1105199@mail.n', '男', 'A1105199'),
(15, '阿蘇', '0901105117', 'A1105117@mail.n', '女', 'A1105117'),
(16, '王小明', '0901234567', '1234567@mail.co', '男', '1234567'),
(17, '陳小美', '0907654321', '7654321@mail.co', '女', '7654321'),
(18, '和和', '0901105172', 'A1105172@mail.n', '男', 'A1105172'),
(19, '林尚恩', '0901105228', 'A1105228@mail.n', '女', 'A1105228'),
(20, '阿椽', '0901105198', 'A1105198@mail.n', '男', 'A1105198'),
(21, '小梁', '0901105299', 'A1105299@mail.n', '女', 'A1105299'),
(22, '小鎧', '0901105239', 'A1105239@mail.n', '男', 'A110539'),
(23, '雅七', '0901105277', 'A1105277@mail.n', '女', 'A1105277'),
(24, '小餅', '0901105229', 'A1105229@mail.n', '男', 'A1105229'),
(25, '思思', '0901105201', 'A1105201@mail.n', '女', 'A1105201'),
(26, '滑板哥', '0901105274', 'A1105274@mail.n', '男', 'A1105274'),
(27, '鳳梨', 'A1105288', 'A1105288@mail.n', '女', 'A1105288'),
(28, '丁丁', '0900000000', 'dingding@mail.n', '男', 'dingding'),
(29, '漢瑞', '0900111122', 'henrry@mail.n', '女', 'henrry'),
(30, 'Fred', '0912345678', 'fred@mail.com', '男', 'fred');

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `E_ID` int NOT NULL AUTO_INCREMENT,
  `E_name` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL,
  `E_phone` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `E_mail` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `E_password` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`E_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`E_ID`, `E_name`, `E_phone`, `E_mail`, `E_password`) VALUES
(1, '張起士', '0901103355', 'A1103355@mail.n', 'A1103355'),
(2, '劉ㄚ涵', '0901103303', 'A1103303@mail.n', 'A1103303'),
(3, '陳小晴', '0901103360', 'A1103360@mail.n', 'A1103360'),
(4, '酒保', '0901103344', 'A1103344@mail.n', 'A1103344'),
(5, '章小琪', '0901091246', 'A1091246@mail.n', 'A1091246');

-- --------------------------------------------------------

--
-- 資料表結構 `intro`
--

DROP TABLE IF EXISTS `intro`;
CREATE TABLE IF NOT EXISTS `intro` (
  `home_intro` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`home_intro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `intro`
--

INSERT INTO `intro` (`home_intro`) VALUES
('歡迎來到密室逃脫的世界！密室逃脫是一種具有挑戰性和刺激性的實境遊戲，讓您與一群朋友或家人一起體驗在限時內尋找線索、解決謎題和逃離密室的刺激冒險。\r\n\r\n\r\n在密室逃脫遊戲中，您將被鎖在一個佈滿謎題和隱藏物品的房間內。您需要仔細觀察房間的每個角落，找到隱藏的線索和解鎖機關，以解決各種謎題和困難，並最終找到通往自由的出口。\r\n');

-- --------------------------------------------------------

--
-- 資料表結構 `kind`
--

DROP TABLE IF EXISTS `kind`;
CREATE TABLE IF NOT EXISTS `kind` (
  `K_ID` int NOT NULL AUTO_INCREMENT,
  `K_NAME` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`K_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `kind`
--

INSERT INTO `kind` (`K_ID`, `K_NAME`) VALUES
(1, '懸疑恐怖'),
(2, '輕鬆歡樂'),
(3, '期間限定'),
(4, '古代文明'),
(5, '詼諧搞笑'),
(6, '科幻題材'),
(7, '神秘空間');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `O_ID` int NOT NULL AUTO_INCREMENT,
  `O_time` datetime NOT NULL,
  `O_date` date NOT NULL,
  `E_ID` int NOT NULL,
  `C_ID` int NOT NULL,
  `O_finish` int NOT NULL,
  `O_number` int NOT NULL,
  `S_ID` int NOT NULL,
  `T_ID` int NOT NULL,
  PRIMARY KEY (`O_ID`),
  KEY `FK_E_ID` (`E_ID`),
  KEY `FK_C_ID` (`C_ID`),
  KEY `fk_S_ID` (`S_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`O_ID`, `O_time`, `O_date`, `E_ID`, `C_ID`, `O_finish`, `O_number`, `S_ID`, `T_ID`) VALUES
(1, '2023-05-16 21:20:14', '2023-06-01', 1, 2, 1, 5, 1, 4),
(2, '2023-05-16 21:20:14', '2023-05-21', 2, 4, 1, 5, 2, 5),
(3, '2023-05-18 21:20:14', '2023-05-28', 3, 1, 1, 4, 5, 10),
(4, '2023-05-18 21:20:14', '2023-05-22', 5, 3, 1, 5, 7, 9),
(5, '2023-05-19 21:20:14', '2023-06-01', 2, 3, 1, 5, 2, 4),
(6, '2023-05-20 21:20:14', '2023-05-23', 2, 4, 1, 5, 1, 5),
(7, '2023-05-21 21:20:14', '2023-05-31', 2, 2, 1, 4, 1, 4),
(8, '2023-05-22 21:20:14', '2023-05-31', 4, 8, 1, 3, 2, 5),
(9, '2023-05-22 21:20:14', '2023-05-30', 3, 10, 1, 5, 1, 1),
(10, '2023-05-30 21:20:14', '2023-06-06', 3, 7, 1, 5, 1, 5),
(11, '2023-06-06 21:20:14', '2023-06-13', 4, 2, 0, 4, 2, 4),
(12, '2023-06-06 21:20:14', '2023-06-12', 4, 20, 0, 4, 3, 9),
(13, '2023-06-07 21:20:14', '2023-06-20', 5, 16, 0, 4, 4, 1),
(14, '2023-06-07 21:20:14', '2023-06-14', 5, 21, 0, 5, 4, 9),
(15, '2023-06-08 21:20:14', '2023-06-15', 3, 18, 0, 6, 2, 5),
(16, '2023-06-08 21:20:14', '2023-06-15', 4, 19, 0, 4, 5, 10),
(17, '2023-06-08 21:20:14', '2023-06-22', 4, 11, 0, 4, 7, 3),
(18, '2023-06-09 21:20:14', '2023-06-22', 2, 3, 0, 5, 2, 4),
(19, '2023-06-09 21:20:14', '2023-06-16', 3, 14, 0, 5, 4, 8),
(20, '2023-06-10 21:20:14', '2023-06-17', 4, 12, 0, 6, 5, 6),
(21, '2023-06-11 21:20:14', '2023-06-18', 4, 15, 0, 7, 2, 8),
(22, '2023-06-12 21:20:14', '2023-06-20', 3, 10, 0, 5, 1, 1),
(23, '2023-06-12 21:20:14', '2023-06-19', 4, 19, 0, 5, 3, 4),
(24, '2023-06-13 21:20:14', '2023-06-14', 4, 2, 0, 4, 2, 4),
(25, '2023-06-13 21:20:14', '2023-06-20', 4, 20, 0, 4, 3, 9),
(26, '2023-06-14 21:20:14', '2023-06-20', 5, 16, 0, 4, 4, 1),
(27, '2023-06-15 21:20:14', '2023-06-18', 2, 2, 0, 7, 2, 7),
(28, '2023-06-16 21:20:14', '2023-07-01', 3, 10, 0, 5, 2, 6),
(29, '2023-06-16 21:20:14', '2023-06-19', 1, 21, 0, 6, 3, 6),
(30, '2023-06-17 21:20:14', '2023-06-29', 3, 1, 0, 7, 1, 5),
(31, '2023-06-17 21:20:14', '2023-06-20', 3, 22, 0, 4, 24, 9);

-- --------------------------------------------------------

--
-- 資料表結構 `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `S_ID` int NOT NULL AUTO_INCREMENT,
  `S_time` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`S_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `schedules`
--

INSERT INTO `schedules` (`S_ID`, `S_time`) VALUES
(1, '9:00'),
(2, '12:00'),
(3, '18:00'),
(4, '20:00'),
(5, '22:00');

-- --------------------------------------------------------

--
-- 資料表結構 `schedule_detail`
--

DROP TABLE IF EXISTS `schedule_detail`;
CREATE TABLE IF NOT EXISTS `schedule_detail` (
  `S_ID` int NOT NULL,
  `T_ID` int NOT NULL,
  PRIMARY KEY (`S_ID`,`T_ID`),
  KEY `FK_S_ID` (`S_ID`),
  KEY `S_ID` (`S_ID`),
  KEY `T_ID` (`T_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `schedule_detail`
--

INSERT INTO `schedule_detail` (`S_ID`, `T_ID`) VALUES
(1, 1),
(1, 4),
(2, 4),
(2, 5),
(4, 1),
(5, 1),
(5, 10),
(7, 9);

-- --------------------------------------------------------

--
-- 資料表結構 `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `T_ID` int NOT NULL AUTO_INCREMENT,
  `T_name` varchar(40) COLLATE utf8mb3_unicode_ci NOT NULL,
  `T_photo` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `T_number` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL,
  `T_price` varchar(40) COLLATE utf8mb3_unicode_ci NOT NULL,
  `T_long` int NOT NULL,
  `T_star` int NOT NULL,
  `T_information` varchar(300) COLLATE utf8mb3_unicode_ci NOT NULL,
  `K_ID` int NOT NULL,
  `t_exist` int NOT NULL,
  PRIMARY KEY (`T_ID`),
  KEY `FK_KID` (`K_ID`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- 傾印資料表的資料 `topic`
--

INSERT INTO `topic` (`T_ID`, `T_name`, `T_photo`, `T_number`, `T_price`, `T_long`, `T_star`, `T_information`, `K_ID`, `t_exist`) VALUES
(1, '靈居', 'images\\1.webp', '2~5人', '$500/人', 120, 4, '72 年 12 月 3 號\r\n根據鄰居的口供，濃濃的瓦斯味，隱約的哭泣聲，不尋常的歌聲，打破了單親家庭的平凡生活，看似簡單的命案，卻隱約散發出駭人的氣息，我必須破案…', 1, 1),
(2, '隧道', 'images\\2.webp', '2~6人', '$750/人', 120, 5, '⚠乘車小提醒⚠\r\n1.18歲以上才可上車\r\n2.旅程刺激，謝絕孕婦、心臟病患者、黑暗/幽閉恐懼症患者等乘客\r\n3.乘客需穿輕便服裝，不建議穿裙子\r\n4.不可誤點 準時發車\r\n5.如遇中途下車的乘客是不會退票的喔', 1, 0),
(3, '荒村小學', 'images\\3.webp', '4~8人', '$700/人', 150, 4, '不久前，你們都不約而同的被拉進了一個叫三年二班的群，群主竟然是曾經山咀村小學的王老師，他提議，大家回到學校，舉行一場同學會聚聚，但令大家詫異的是，日期居然選在了七月七號這一天！當大家回到學校，卻發現曾經書聲琅琅的校園變得破敗不堪，七年前的同學，七年前的記憶，再次拿起兒時的書包竟讓你們心生疑惑…我是誰？我為什麼會回到這裏？', 1, 0),
(4, '微笑謎藏', 'images\\4.webp', '4~8人', '$750/人', 150, 4, '西元 2006 年，東歐地區發生了一連串的孩童誘拐案件，隨著新聞的渲染，媒體將兇手冠上一個詭異的稱號 -「微笑天使」\r\n\r\n多項傳聞指出，「微笑天使」很有可能與斯邁爾孤兒院的院長有關…\r\n案件最終以院長的自殺作結，孤兒院也成為廢墟。\r\n\r\n然而在幾年後的今天，一群懷著不同目的的人，來到廢棄已久的孤兒院。\r\n不該有人的庭院深處，竟傳來呼救的聲音？！\r\n\r\n當微笑的殺意接近，只有互相合作才能逃出\r\n「噓！祂出現了！… 」\r\n「趁祂進入祈禱室，1、2、3 跑！」', 1, 0),
(5, '這個Case有點Big', 'images\\5.webp', '2~6人', '$680/人', 120, 4, '『一場發生在行李箱中的奇幻冒險，世界上怎麼會有那麼大的行李箱啊？\r\n再不逃出去，就要被永遠困在這裡了！』\r\n\r\nLoGin偵探社最近收到了一封奇怪的委託信，\r\n一位著急的媽媽聲稱她失蹤的10歲兒子被邪惡的科學家綁架了。(這年代還有邪惡的科學家嗎…)\r\n但當偵探社聯繫她時，卻又堅決否認寄出過這封信，這個案子也就不了了之…\r\n\r\n但這位媽媽突然又聯繫了偵探社表示她已潛入科學家的研究所，\r\n希望我們能派出偵探協助她，但一時之間實在抽不出人手…\r\n你看起來挺聰明的，能幫個忙嗎？\r\n這裡是這位媽媽的LINE：點我加羅媽媽好友\r\n嗯！那就麻煩你啦！(๑•̀ㅂ•́)و✧', 2, 1),
(6, '瑪莉控', 'images\\6.webp', '3~6人', '$300/人', 180, 5, '全世界最暢銷的漫畫MY WORLD(我的世界)截稿日即將到來，粉絲都興奮地等待著漫畫連載，然而身為漫畫編輯部的我們，卻遲遲聯絡不上漫畫家田中一郎也沒有收到他新的連載作品，在時間的催促下我們編輯部只好前往田中一郎的家中，卻發現…', 2, 0),
(7, '熊熊危機', 'images\\7.webp', '3~6人', '$400/人', 180, 3, '大雪紛飛的平安夜裡，大家團聚在爐邊聊天，此時媽媽從櫃子拿出一本”熊熊危機”的童話書，她說這是她小時候最喜歡聽奶奶講的故事書，每當想到奶奶就會翻開來讀，媽媽興致勃勃述說著裡面的故事，但講到最精采的地方，我們竟然睡著了….', 2, 1),
(8, '醉後任務', 'images\\8.webp', '8~10人', '$700/人', 120, 4, '在一個充滿歡笑與希望的城市—巴利市，\r\n看似平靜的夜晚卻暗潮洶湧，幾位素昧平生的人陸續造訪 Deja Vu 酒吧，\r\n一杯充滿惡意的調酒將每個人的意識抽離……\r\n隔天早晨，醒在酒吧樓上的飯店房間裡，\r\n周圍是一群生面孔以及一顆即將摧毀小鎮的炸彈，\r\n昨晚酒酣耳熱之際，被遺忘的派對時光裡究竟發生了什麼事情？\r\n這些人是敵是友？是否能信任？\r\n所有人各懷鬼胎，我得一邊回想自己的目的，一邊拯救小鎮倖免於難。', 2, 0),
(9, '宇宙逃脫 Vicky', 'images\\9.webp', '5~10人', '$700/人', 90, 2, '「聖誕老人求求你，我不要禮物了，你把爸爸帶回來好不好？」\r\n\r\n2034 年的平安夜，小女孩坐在客廳的聖誕樹下\r\n\r\n數著樹上掛燈的顏色，念念有詞的望向門口\r\n\r\n盼望那個熟悉的身影能再次出現。\r\n\r\n● 外星科技機關、人工智慧AI互動\r\n\r\n● Ptt 熱門！新手最推薦\r\n\r\n● 適合機關控、深度故事理解\r\n\r\n● 感人故事情節', 3, 0),
(10, '獨眼傑克', 'images\\10.webp', '2~6人', '$600/人', 120, 3, '18 世紀，極其光榮與黑暗的時代。\r\n海上歷史寫下了新頁，同時締造許多傳奇，\r\n獨眼傑克，便是那其中之一。\r\n\r\n我們將化身海盜，依循傑克留下的線索，\r\n秘密潛入東印度公司船隻，\r\n劫取商船，搶奪船上所有的財寶??', 3, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
