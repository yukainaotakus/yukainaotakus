use yutaku;
DROP TABLE IF EXISTS `game_info`;
CREATE TABLE `game_info` (
`id` int(12) NOT NULL AUTO_INCREMENT COMMENT ''id '' ,
`game_name` varchar(100) NOT NULL COMMENT ''ゲーム名 ???明'' ,
`type` varchar(20) COMMENT ''ゲームタイプ '' ,
`release_date` datetime COMMENT ''リリース時間 '' ,
`publisher` varchar(50) COMMENT ''出版社 '' ,
`score` float COMMENT ''スコア '' ,
`introduction` text COMMENT ''ゲーム紹介 '' ,
`platform` int(20) COMMENT ''プラットフォーム '' ,
`price` float(20) COMMENT ''値段 '' ,
`created_user` varchar(12) DEFAULT ''System'' COMMENT ''作成者 '' ,
`created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT ''作成時間 '' ,
`updated_user` varchar(12) DEFAULT ''System'' COMMENT ''更新者 '' ,
`updated_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT ''更新日時 '' ,
PRIMARY KEY (`id`),
INDEX `index_id` (`id`) USING HASH 
);
