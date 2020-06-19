# Host: localhost  (Version: 5.5.47)
# Date: 2017-05-10 00:25:02
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES gb2312 */;

#
# Structure for table "admin"
#

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `name` varchar(200) NOT NULL DEFAULT '' COMMENT '管理名称',
  `pass` varchar(200) NOT NULL DEFAULT '' COMMENT '管理密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "admin"
#


#
# Structure for table "daxiu"
#

CREATE TABLE `daxiu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `hit` varchar(255) DEFAULT NULL,
  `diqu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

#
# Data for table "daxiu"
#

INSERT INTO `daxiu` VALUES (1,'daxiu/1.jpg','魅狐','http://www.wxrhjc.com/2.mp4','25','成都市'),(2,'daxiu/2.jpg','我爱台妹','http://www.wxrhjc.com/2.mp4','12','台湾省'),(3,'daxiu/3.jpg','小公举','http://www.wxrhjc.com/2.mp4','18','苏州市'),(4,'daxiu/4.jpg','演员王永峰','http://www.wxrhjc.com/2.mp4','29','酒泉市'),(5,'daxiu/5.jpg','EiWen','http://www.wxrhjc.com/2.mp4','30','商丘市'),(6,'daxiu/6.jpg','若曦 ','http://www.wxrhjc.com/2.mp4','25','浙江省'),(7,'daxiu/7.jpg','猫啊瞄吖猫','http://www.wxrhjc.com/2.mp4','25','重庆市'),(8,'daxiu/8.jpg','桃君','http://www.wxrhjc.com/2.mp4','25','淄博市');

#
# Structure for table "dingdan"
#

CREATE TABLE `dingdan` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `ddh` varchar(100) NOT NULL DEFAULT '' COMMENT '订单号',
  `ddzt` varchar(1000) NOT NULL DEFAULT '' COMMENT '订单状态',
  `money` varchar(100) NOT NULL DEFAULT '' COMMENT '订单金额',
  `des` varchar(100) NOT NULL DEFAULT '' COMMENT '订单类型',
  `pid` varchar(1000) NOT NULL DEFAULT '' COMMENT '推广ID',
  `uid` varchar(1000) NOT NULL DEFAULT '' COMMENT '推广UID',
  `shijian` varchar(100) NOT NULL DEFAULT '' COMMENT '订单时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

#
# Data for table "dingdan"
#


#
# Structure for table "kllist"
#

CREATE TABLE `kllist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `ddh` varchar(100) NOT NULL DEFAULT '' COMMENT '订单号',
  `ddzt` varchar(1000) NOT NULL DEFAULT '' COMMENT '订单状态',
  `money` varchar(100) NOT NULL DEFAULT '' COMMENT '订单金额',
  `des` varchar(100) NOT NULL DEFAULT '' COMMENT '订单类型',
  `pid` varchar(1000) NOT NULL DEFAULT '' COMMENT '推广ID',
  `uid` varchar(1000) NOT NULL DEFAULT '' COMMENT '推广UID',
  `shijian` varchar(100) NOT NULL DEFAULT '' COMMENT '订单时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

#
# Data for table "kllist"
#


#
# Structure for table "pl"
#

CREATE TABLE `pl` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `pic` varchar(1000) NOT NULL DEFAULT '' COMMENT '头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=gbk;

#
# Data for table "pl"
#

INSERT INTO `pl` VALUES (1,'pl/1.jpg'),(2,'pl/2.jpg'),(3,'pl/3.jpg'),(4,'pl/4.jpg'),(5,'pl/5.jpg'),(6,'pl/6.jpg'),(7,'pl/7.jpg'),(8,'pl/8.jpg'),(9,'pl/9.jpg'),(10,'pl/10.jpg'),(11,'pl/11.jpg'),(12,'pl/12.jpg'),(13,'pl/13.jpg'),(14,'pl/14.jpg'),(15,'pl/15.jpg'),(16,'pl/16.jpg'),(17,'pl/17.jpg'),(18,'pl/18.jpg'),(19,'pl/19.jpg'),(20,'pl/20.jpg'),(21,'pl/21.jpg'),(22,'pl/22.jpg'),(23,'pl/23.jpg'),(24,'pl/24.jpg'),(25,'pl/25.jpg'),(26,'pl/26.jpg'),(27,'pl/27.jpg'),(28,'pl/28.jpg'),(29,'pl/29.jpg'),(30,'pl/30.jpg'),(31,'pl/31.jpg'),(32,'pl/32.jpg'),(33,'pl/33.jpg'),(34,'pl/34.jpg'),(35,'pl/35.jpg'),(36,'pl/36.jpg'),(37,'pl/37.jpg'),(38,'pl/38.jpg'),(39,'pl/39.jpg'),(40,'pl/40.jpg');

#
# Structure for table "tzurl"
#

CREATE TABLE `tzurl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tzurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "tzurl"
#


#
# Structure for table "uboip"
#

CREATE TABLE `uboip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jb` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `tx` varchar(255) DEFAULT NULL,
  `ms` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

#
# Data for table "uboip"
#


#
# Structure for table "ubotj"
#

CREATE TABLE `ubotj` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `pid` varchar(100) NOT NULL DEFAULT '' COMMENT '推广主ID',
  `uid` varchar(1000) NOT NULL DEFAULT '' COMMENT '推广子ID',
  `pidmoney` varchar(1000) NOT NULL DEFAULT '' COMMENT '主ID金额',
  `uidmoney` varchar(1000) NOT NULL DEFAULT '' COMMENT '子ID金额',
  `shijian` varchar(100) NOT NULL DEFAULT '' COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "ubotj"
#


#
# Structure for table "ubouid"
#

CREATE TABLE `ubouid` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `user` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `pass` varchar(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  `userid` varchar(100) NOT NULL DEFAULT '' COMMENT '用户ID',
  `pid` varchar(100) NOT NULL DEFAULT '' COMMENT '主ID',
  `fc` varchar(50) NOT NULL DEFAULT '' COMMENT '分成比例',
  `pay` varchar(200) NOT NULL DEFAULT '' COMMENT '收款姓名',
  `kahao` varchar(200) NOT NULL DEFAULT '' COMMENT '收款卡号',
  `qq` varchar(20) NOT NULL DEFAULT '' COMMENT '联系QQ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

#
# Data for table "ubouid"
#


#
# Structure for table "ubouser"
#

CREATE TABLE `ubouser` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `user` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `pass` varchar(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  `qq` varchar(12) NOT NULL DEFAULT '' COMMENT '联系QQ',
  `tel` varchar(12) NOT NULL DEFAULT '' COMMENT '联系电话',
  `alipayname` varchar(200) NOT NULL DEFAULT '' COMMENT '收款姓名',
  `alipay` varchar(200) NOT NULL DEFAULT '' COMMENT '收款账号',
  `userid` varchar(100) NOT NULL DEFAULT '' COMMENT '用户ID',
  `fencheng` varchar(50) NOT NULL DEFAULT '' COMMENT '分成比例',
  `kl` varchar(255) DEFAULT NULL COMMENT '扣量起始',
  `kl2` varchar(255) DEFAULT NULL COMMENT '扣量还原参数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

#
# Data for table "ubouser"
#


#
# Structure for table "ubozb"
#

CREATE TABLE `ubozb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(1000) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `hit` varchar(255) DEFAULT NULL,
  `diqu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

#
# Data for table "ubozb"
#

INSERT INTO `ubozb` VALUES (1,'img/1.jpg','魅狐','http://zbup.jiaxinjiafang.com/mp4/4bd7cb3e-f02f-4b06-a91a-ec9de76881af.mp4','2553','成都市'),(2,'img/2.jpg','我爱台妹','http://zbup.jiaxinjiafang.com/mp4/bd15355b-6cc5-40bf-9361-7dc546d34ed7.mp4','5896','台湾省'),(3,'img/3.jpg','小公举','http://zbup.jiaxinjiafang.com/mp4/8cd5da1a-61db-41a0-ac99-81e8dd731e2e.mp4','8965','苏州市'),(4,'5.jpg','演员王永峰','http://zbup.jiaxinjiafang.com/mp4/f98382bf-ee67-4159-9416-b507d5a96d26.mp4','5893','酒泉市'),(5,'img/6.jpg','EiWen','http://zbup.jiaxinjiafang.com/mp4/f1881d3b-5867-4952-8481-539dbfd96d65.mp4','6698','商丘市'),(6,'img/7.jpg','若曦 ','http://zbup.jiaxinjiafang.com/mp4/dd7c3225-803b-46cc-bed1-85b8653e6dd5.mp4','8987','浙江省'),(7,'img/8.jpg','猫啊瞄吖猫','http://zbup.jiaxinjiafang.com/mp4/5f104851-8ea7-4c0c-b99a-b4b36f804365.mp4','4658','重庆市'),(8,'img/9.jpg','桃君','http://zbup.jiaxinjiafang.com/mp4/f77d612e-9382-4a59-8ce0-6b1ed035d100.mp4','1235','淄博市'),(9,'img/10.jpg','小小酥','http://zbup.jiaxinjiafang.com/mp4/787fee9f-5abb-46b0-b4af-1deff68f87e4.mp4','9988','上海市'),(10,'img/11.jpg','六儿','http://zbup.jiaxinjiafang.com/mp4/83d135d6-7103-47d9-9e4b-956747911014.mp4','1025','福州市'),(11,'img/12.jpg','David','http://zbup.jiaxinjiafang.com/mp4/voice/black_voice1.mp4','8895','长春市'),(12,'img/13.jpg','阿培','http://zbup.jiaxinjiafang.com/mp4/0a41adfc-4dbb-4efa-afe3-3b3dbfbbb7d8.mp4','9985','内江市'),(13,'img/14.jpg','雅熙','http://zbup.jiaxinjiafang.com/mp4/voice/black_voice2.mp4','2588','郑州市'),(14,'img/15.jpg','寒雪菲菲','http://zbup.jiaxinjiafang.com/mp4/ca85d1fc-6c6b-4a45-a267-927c0cb8488c.mp4','822','丹东市'),(15,'img/16.jpg','小淑','http://zbup.jiaxinjiafang.com/mp4/5c8564a8-f3ad-4c51-bdf4-78f2defa2a56.mp4','8895','上海市'),(16,'img/17.jpg','ZXY','http://zbup.jiaxinjiafang.com/mp4/1da34f85-8a5c-4632-8e96-664f389c37c6.mp4','8966','绍兴市'),(17,'img/18.jpg','yang','http://zbup.jiaxinjiafang.com/mp4/9c7ae9cc-4e3a-485b-9a5f-46b5470479f0.mp4','1563','常州市'),(18,'img/19.jpg','露娜','http://zbup.jiaxinjiafang.com/mp4/4a2c32f3-e50f-4fba-bed2-5f907c38bb53.mp4','897','庆阳市'),(19,'img/20.jpg','旧爱','http://zbup.jiaxinjiafang.com/mp4/cc81cec7-41fd-49f4-821c-5b6088881196.mp4','8955','北京市'),(20,'img/21.jpg','龙坤','http://zbup.jiaxinjiafang.com/mp4/19debdfd-b3c3-4451-bd24-a40db39a60d2.mp4','1569','洛阳市'),(21,'img/22.jpg','阳阳','http://zbup.jiaxinjiafang.com/mp4/ad36022f-002a-47da-971a-2dab73b890db.mp4','2356','鹤岗市'),(22,'img/23.jpg','研研baby','http://zbup.jiaxinjiafang.com/mp4/c550ab87-9cf1-4424-8890-5f61d07a747a.mp4','1986','嘉兴市'),(23,'img/24.jpg','2尧','http://zbup.jiaxinjiafang.com/mp4/e681b321-1a9d-478a-830a-f18733d053f7.mp4','1786','葫芦岛市'),(24,'img/26.jpg','豆豆萌主','http://zbup.jiaxinjiafang.com/mp4/4aa93fc2-81d1-419c-9e08-6e8f1e94d5f6.mp4','1658','牡丹江市'),(25,'img/27.jpg','蛋仔','http://zbup.jiaxinjiafang.com/mp4/c9090ce7-8f91-413d-83c1-85d50dbd7715.mp4','1596','貌似不在地球'),(26,'img/28.jpg','沫熙','http://zbup.jiaxinjiafang.com/mp4/28f71af0-6a59-472c-8e2a-aa1bf17aec32.mp4','1478','东莞市'),(27,'img/29.jpg','木梳','http://zbup.jiaxinjiafang.com/mp4/8ff44df1-bff0-4a19-8a76-7152a9295647.mp4','1356','来宾市'),(28,'img/30.jpg','MissXu','http://zbup.jiaxinjiafang.com/mp4/8e5bfd7e-87f6-4163-b91f-182c846d3d1f.mp4','1236','衡州市'),(29,'img/31.jpg','可爱瑞','http://zbup.jiaxinjiafang.com/mp4/9197ff1d-aca4-460b-9a6e-bab81c3f9d61.mp4','5987','东莞市'),(30,'img/33.jpg','思新','http://zbup.jiaxinjiafang.com/mp4/76f77abd-cc52-42aa-9e85-6fe37aaa33c3.mp4','3568','武汉市'),(31,'img/34.jpg','欣宝','http://zbup.jiaxinjiafang.com/mp4/e4a39c59-8a6f-499c-a426-5f4560530b0a.mp4','3698','杭州市'),(32,'img/35.jpg','思思','http://zbup.jiaxinjiafang.com/mp4/6c5f91d7-c738-4850-a69c-3787a1115222.mp4','3795','惠州市'),(33,'img/36.jpg','露露姐','http://zbup.jiaxinjiafang.com/mp4/c99cffc5-f473-45b2-9cfb-2e0f52bd8382.mp4','3896','武汉市'),(34,'img/37.jpg','荣儿','http://zbup.jiaxinjiafang.com/mp4/edfd0463-46b5-4f3b-9d07-9a918f137548.mp4','3986','成都市'),(38,'img/38.jpg','柚子柚子呀','http://zbup.jiaxinjiafang.com/mp4/21f84b05-480f-4fd8-8a31-6301211e7740.mp4','3986','漳州市'),(39,'img/39.jpg','小妖精','http://zbup.jiaxinjiafang.com/mp4/e4a0f098-a469-4337-9e31-31a3728e8291.mp4','13986','无锡市'),(40,'img/40.jpg','猫猫','http://zbup.jiaxinjiafang.com/mp4/2792690a-e046-4da9-894b-f3c5fd119bfe.mp4','1986','营口市'),(41,'img/41.jpg','夏天','http://zbup.jiaxinjiafang.com/mp4/e889c36e-e3ed-466d-bb89-df35e9af479a.mp4','1987','武汉市'),(42,'img/42.jpg','勿忘初心','http://zbup.jiaxinjiafang.com/mp4/ea5b0193-c378-49a8-98cb-e3d33159cfe9.mp4','1988','咸阳市'),(44,'img/44.jpg','南姑','http://zbup.jiaxinjiafang.com/mp4/df2e736b-edb4-46ea-84c8-0cb621afe118.mp4','1989','黄石市'),(45,'img/45.jpg','女神熙','http://zbup.jiaxinjiafang.com/mp4/4b82be95-5fb9-4321-bdd5-1e2e612c1e3c.mp4','1990','台州市'),(46,'img/46.jpg','木子','http://zbup.jiaxinjiafang.com/mp4/78067885-071a-4328-9bd0-12507c3c3ade.mp4','1991','貌似不在地球'),(47,'img/47.jpg','樱宁','http://zbup.jiaxinjiafang.com/mp4/74719961-e813-4218-8db5-40000e62dc70.mp4','1992','湖州市'),(48,'img/48.jpg','妖精','http://zbup.jiaxinjiafang.com/mp4/22d8a008-e49d-4c96-8b4b-cf3896484182.mp4','1993','佛山市'),(49,'img/49.jpg','筱筱','http://zbup.jiaxinjiafang.com/mp4/e668c62a-233e-4011-8dc3-b5936258ac2c.mp4','1993','舟山市'),(50,'img/50.jpg','小柳岩','http://zbup.jiaxinjiafang.com/mp4/1711219f-907a-4b9d-bad1-9468ad0d1b96.mp4','1993','宁波市'),(51,'img/51.jpg','涵涵','http://zbup.jiaxinjiafang.com/mp4/4b8da55d-6a7f-43e1-ad79-775a9333d1d0.mp4','1993','秦皇岛'),(52,'img/52.jpg','波多野荔枝','http://zbup.jiaxinjiafang.com/mp4/a5ae13b0-c117-47c9-ab1d-fd9acb9833f1.mp4','1993','厦门市'),(53,'img/53.jpg','寒晓凝','http://zbup.jiaxinjiafang.com/mp4/e5794b12-1a03-4d84-b193-b4beef9b2d18.mp4','1993','绍兴市'),(54,'img/54.jpg','贝拉','http://zbup.jiaxinjiafang.com/mp4/edccfc27-f141-4760-b458-95165c902f19.mp4','1993','杭州市'),(55,'img/55.jpg','娜宝','http://zbup.jiaxinjiafang.com/mp4/17d605c3-edd6-43c9-a9e4-448ad20781bf.mp4','1993','黄石市'),(56,'img/56.jpg','Luna','http://zbup.jiaxinjiafang.com/mp4/8580de73-134d-4300-ab49-0c042ffc5f4c.mp4','1993','重庆市'),(57,'img/57.jpg','桃花姐姐','http://zbup.jiaxinjiafang.com/mp4/949fc475-85bb-49ae-9022-eba94f3e005a.mp4','1993','杭州市'),(58,'img/58.jpg','佳音','http://zbup.jiaxinjiafang.com/mp4/6196f039-84e7-4011-8764-dba08756f5c7.mp4','1993','辽阳市'),(59,'img/59.jpg','当当','http://zbup.jiaxinjiafang.com/mp4/df740d0b-e6c3-4cdc-ae8f-4bcca0ea132b.mp4','1993','深圳市'),(60,'img/60.jpg','麦兜宝宝','http://zbup.jiaxinjiafang.com/mp4/c612def1-57f6-4af0-8ce8-b8cf2d0b043d.mp4','1993','漳州市'),(61,'img/61.jpg','杨小云','http://zbup.jiaxinjiafang.com/mp4/6398c447-1553-43a0-b2ca-3c0d17c5758d.mp4','1993','成都市'),(62,'img/62.jpg','羊咩咩','http://zbup.jiaxinjiafang.com/mp4/d0301121-d43a-4c87-b92c-df383ab3d9e9.mp4','1993','广州市'),(63,'img/63.jpg','丹妮','http://zbup.jiaxinjiafang.com/mp4/3f2b5482-7984-46b4-bc8a-486fcb974cf3.mp4','1993','成都市'),(64,'img/64.jpg','慧儿','http://zbup.jiaxinjiafang.com/mp4/c6955fbf-9b4b-4cd2-bbe2-cf5c266bb6b7.mp4','1993','东莞市'),(65,'img/65.jpg','小叶子','http://zbup.jiaxinjiafang.com/mp4/4648f869-b5a9-4077-8d96-9e530c193027.mp4','1993','安庆市'),(66,'img/66.jpg','忘梦悠','http://zbup.jiaxinjiafang.com/mp4/c111b709-3272-490f-aac9-2e9c1661e893.mp4','1993','大连市'),(67,'img/67.jpg','童童童','http://zbup.jiaxinjiafang.com/mp4/f845f629-a079-413c-8ef8-aafe71036390.mp4','1993','徐州市'),(68,'img/68.jpg','Auue','http://zbup.jiaxinjiafang.com/mp4/eaf2e0d1-adb1-47b3-95ed-3754c1231c02.mp4','1993','成都市'),(70,'img/70.jpg','虎牙妹妹','http://zbup.jiaxinjiafang.com/mp4/8a82bc36-c71c-4c74-8b9e-ccc2f100f58e.mp4','1993','苏州市'),(71,'img/71.jpg','宝宝','http://zbup.jiaxinjiafang.com/mp4/e41bba8b-ff36-4a51-ae19-fd69ae2134a5.mp4','1993','成都市'),(72,'img/72.jpg','水妹儿','http://zbup.jiaxinjiafang.com/mp4/20043a73-b014-4bef-b0b6-44d66308b51e.mp4','1993','三明市'),(73,'img/73.jpg','粉红玛丽','http://zbup.jiaxinjiafang.com/mp4/ddc808b2-a557-47ba-8cc7-17c731bbc8df.mp4','1993','济南市'),(74,'img/74.jpg','珍妃','http://zbup.jiaxinjiafang.com/mp4/eed40e89-5435-4610-a6c3-ea175ff91511.mp4','1993','西安市'),(75,'img/75.jpg','小雨伞','http://zbup.jiaxinjiafang.com/mp4/979c6517-f807-409f-9f20-5111c9093870.mp4','1993','北京市'),(76,'img/76.jpg','大波波','http://zbup.jiaxinjiafang.com/mp4/18bea6e4-7e77-48a1-a07d-c9c3e76d3145.mp4','1993','杭州市'),(77,'img/77.jpg','茉莉姐','http://zbup.jiaxinjiafang.com/mp4/97cb66b1-a5c7-4409-9f76-a2ef71b62a08.mp4','1993','天津市'),(78,'img/78.jpg','小媛媛','http://zbup.jiaxinjiafang.com/mp4/02784249-adb1-491a-8d71-9ca2dbdef8c4.mp4','1993','南京市'),(79,'img/79.jpg','鹿美子','http://zbup.jiaxinjiafang.com/mp4/848852c9-8ca6-4ddf-b154-f0b1eb677663.mp4','1993','大庆市'),(80,'img/80.jpg','希饭尼','http://zbup.jiaxinjiafang.com/mp4/a02d15e4-8338-41ee-878c-de0a6dfa7953.mp4','1993','新乡市'),(81,'img/81.jpg','银儿','http://zbup.jiaxinjiafang.com/mp4/5a0602ce-36bc-4cda-a6a3-6806566e7cc7.mp4','1993','七台河市'),(82,'img/82.jpg','小妹','http://zbup.jiaxinjiafang.com/mp4/41216a99-3786-496a-8d40-d8a285e9d52a.mp4','1993','成都市'),(83,'img/83.jpg','如若初见','http://zbup.jiaxinjiafang.com/mp4/dd29f7b4-40fd-45b0-b1e7-07e87d9c450a.mp4','1993','无锡市'),(84,'img/84.jpg','水溶CC','http://zbup.jiaxinjiafang.com/mp4/25b93b3f-9753-44c0-b857-bb8fcca96ef8.mp4','1993','平顶山市'),(85,'img/85.jpg','LInda女王','http://zbup.jiaxinjiafang.com/mp4/845e6dd8-d2bc-458b-bc4d-45d569174ed4.mp4','1993','六安市'),(86,'img/86.jpg','九九','http://zbup.jiaxinjiafang.com/mp4/4b4fe49c-c7f5-4338-b1ab-abefd57904f1.mp4','1993','绍兴市'),(87,'img/87.jpg','安妮','http://zbup.jiaxinjiafang.com/mp4/ed288d61-bb9c-4e59-ae5a-8d4e4b0b58f1.mp4','1993','宿迁市'),(88,'img/88.jpg','糖果','http://zbup.jiaxinjiafang.com/mp4/f3483654-8661-4591-a45c-ae3630419161.mp4','1993','临沂市'),(89,'img/89.jpg','小蚊子','http://zbup.jiaxinjiafang.com/mp4/83232d14-e730-427a-a7c9-18916537367e.mp4','1993','南通市'),(90,'img/90.jpg','小西','http://zbup.jiaxinjiafang.com/mp4/8596639f-9c3b-47c4-a5ba-ac9c66ad2dad.mp4','1993','南阳市');

#
# Structure for table "ubozf"
#

CREATE TABLE `ubozf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money1` varchar(1000) NOT NULL,
  `money2` varchar(1000) NOT NULL,
  `money3` varchar(255) DEFAULT NULL,
  `money4` varchar(255) DEFAULT NULL,
  `money5` varchar(255) DEFAULT NULL,
  `daxiu1` varchar(255) DEFAULT NULL,
  `daxiu2` varchar(255) DEFAULT NULL,
  `zhibo1` varchar(255) DEFAULT NULL,
  `zhibo2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

#
# Data for table "ubozf"
#

INSERT INTO `ubozf` VALUES (1,'30','70','150','200','300','15','40','45','60');

#
# Structure for table "wzpeizhi"
#

CREATE TABLE `wzpeizhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID编号',
  `gb` varchar(20) DEFAULT NULL COMMENT '站点开关',
  `tip` varchar(1000) DEFAULT NULL COMMENT '站点开关描述',
  `pc` varchar(20) DEFAULT NULL COMMENT 'PC打开方式选择',
  `pctip` varchar(1000) DEFAULT NULL COMMENT 'PC关闭提示',
  `kl` varchar(255) DEFAULT NULL COMMENT '扣量功能 1为关闭 0开启',
  `tz` varchar(255) DEFAULT NULL,
  `pcurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "wzpeizhi"
#

INSERT INTO `wzpeizhi` VALUES (1,'0','网站关闭','0','无资源','0','1','http://www.baidu.com');
