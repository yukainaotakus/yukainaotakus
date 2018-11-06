<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta charset="utf-8">
	<title>你™就不能用支付宝自带汇率计算器吗！非要用我写的网页版吗！好吧，原谅你了╮(╯▽╰)╭唉，我真善良 by程序猿</title>

</head>
<body>
<?php session_start(); ?>
<h1>低调奢华有内涵的汇率计算器~日元兑软妹币版</h1>



<?php   
$Amount = $_GET['Amount']; 
// echo  $Amount;


$url ="http://qq.ip138.com/hl.asp?from=JPY&to=CNY&q=$Amount";   
$getcontent = file_get_contents($url); 
$html = iconv("gb2312", "utf-8",$getcontent);

 
//echo  $html;

 $p = '/<tr><td>(.*?)<\/td>\s*<td>(.*?)<\/td>\s*<\/tr>/i';
 preg_match_all($p, $html, $matches);
$tmp=$matches[0][1];
//  echo "<pre>";
//  print_r($matches[0][1]);
//  echo "</pre>";
//var_dump($tmp);
//echo strstr($tmp,'<td>');

$length=strlen($Amount);


echo "当前汇率是:".$rmb=substr($tmp,$length+17,7)."<br>";

echo "换算后为:".$Amount*$rmb;















// $regex = "/class=/"rate/" >(.+?) "."/i"; //正则表达式.   
// if(preg_match_all($regex, $content, $matches)) {   
// echo $Amount.' JPY = '.$matches[1][0].'CNY';   
// }   
?> 



<form>

请输入数字<input type='number' name="Amount">

<input type="submit" value="开始计算">



</form>

</body>
</html>