<!DOCTYPE HTML>


<html>
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta charset="utf-8">

	<title>结果发表~</title>
</head>
<body>
 
<?php
$a=substr($_GET["birthday"],3);
switch ($a){
case "1":
echo "亲爱的".$_GET["name"]."，你今天会捡到钱";
break;
case "2":
echo "亲爱的".$_GET["name"]."，你今天会见到爱豆";
break;
case "3":
echo "亲爱的".$_GET["name"]."，你今天会平地摔";
break;
case "4":
echo "亲爱的".$_GET["name"]."，你今天会吃刀削面";
break;
case "5":
echo "亲爱的".$_GET["name"]."，你今天会分手（首先你要先有个女朋友）";
break;
case "6":
echo "亲爱的".$_GET["name"]."，你今天会吃咖喱饭";
break;
case "7":
echo "亲爱的".$_GET["name"]."，你今天会被人喊666";
break;
case "8":
echo "亲爱的".$_GET["name"]."，你今天会咸鱼翻身";
break;
case "9":
echo "亲爱的".$_GET["name"]."，你今天运势超棒！代码之神保佑你没bug！";
break;
case "0":
echo "亲爱的".$_GET["name"]."，你今随便过过吧...文案想不出来了";
break;
}


 
?>


 
  
</body>
</html>