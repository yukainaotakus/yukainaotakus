<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta charset="utf-8">
	<title>来呀~~~快爬数据啊~</title>

</head>
<body>

<h1>来人啊！关门放spider</h1>



<?php   
header('Content-Type:text/plain;charset=utf-8');

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "mysql";
 

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error){
//     die("连接失败: " . $conn->connect_error);
//     }else{
//         echo "连接成功";
//         }




$Amount=128;
$url ="http://www.a9vg.com/game/$Amount";  
$html = file_get_contents($url); 
//echo $html; 
//拿基本信息 0-name 1-类型 2-发售日期  2015-05-21  3-发行商 ok
$p = "/<dd>(.*?)<\/dd>/";
preg_match_all($p, $html, $matches);
$info=[$matches[1][0],$matches[1][2],$matches[1][6],$matches[1][4]];

//print_r($info);



$b="/<em class=\"icon_score(.*?)\"><\/em>/";
preg_match($b,$html,$point);  //拿分数 问题是有复数个 

//array_sum($point[1])/count($point[1]);//是个数组 取平均之后存入
$info[]= $point[1]==0?0:$point[1]/10 ;
//print_r($point);


//拿平台信息 ok
$a="/<em class=\"icon_(ps4|xb1|switch|win10|steam|xb1|wiiu|3ds|psv)\"><\/em>/";
preg_match_all($a,$html,$pl); 

//匹配抓取网页上的平台信息 
$match=array(1 => 'ps2', 2=>'ps3', 4=>'ps4', 8=>'psp', 16=>'steam', 32=>'psv', 64=>'3ds',128=>'switch',256=>'wiiu',512=>'xb11',1024=>'win10');

function Platform($platArray){
	$match=array(1 => 'ps2', 2=>'ps3', 4=>'ps4', 8=>'psp', 16=>'steam', 32=>'psv', 64=>'3ds',128=>'switch',256=>'wiiu',512=>'xb11',1024=>'win10');
	$result=array_intersect($match,$platArray);
	return $result;
	}
$result=Platform($pl[1]);

$plat=array_sum(array_keys($result)); //这是平台的十进制数 直接存入数据库


$lasthtml= strstr($html,'div class="gamebrief">');
//echo $lasthtml;

//$a="/<h6>游戏简介:<\/h6>\s<p>(.*?)<\p>/";
$a="/<p>(.*?)<\/p>/";
preg_match($a,$lasthtml,$ti);  //拿简介

$info[]= $ti[1]=="'+game_data.summary+'"?"暂无信息，敬请期待后续更新。":$ti[1]; //先存简介 5=>简介


$info[]= $plat==0?0:$plat;//存平台十进制数 上一部算出的


$info[]=rand(15,1000); //价格 目前是假数据

echo "<pre>";
print_r($info);
echo "</pre>";


//$sql = "INSERT INTO `game_info` VALUES ('$no', '$ty', '$name', '$lev', '$pla', '$atks')"

// $sql = "INSERT INTO game_info( game_name, type, release_date, publisher, score, introduction, platform, price)VALUES ('$info[0]', '$info[1]', '$info[2]', '$info[3]','$info[4]', '$info[5]', '$info[6]', '$info[7]');";
// if ($conn->query($sql) === TRUE) {
//     echo "新记录插入成功";
// 	} else {
//  	   echo "Error: " . $sql . "<br>" . $conn->error;
// 	}


// $conn->close();

?> 


</body>
</html>