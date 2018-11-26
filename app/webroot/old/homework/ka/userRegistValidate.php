<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php session_start(); ?>
<?php

$_SESSION['age'] = $_POST['age'];
$_SESSION['name'] = $_POST['fname'];

$age = $_POST['age'];
$name = $_POST['fname'];

$allRgith = true;

$isInRange = isInRange($age, 0, 151);
$isEmpty = empty($age);

if ($isInRange && $isEmpty == false) {
	echo "合法 ";
}

// 判断是否通过验证
if (!$allRgith) {
	// 没通过
	$_SESSION['messages'] = $messages;
	// 跳转回到上一页
	header("Location: userRegist.php");
}


/**
 * 数字是否符合范围的函数
 * @param $num int 输入的值
 * @param $min int 最小值
 * @param $max int 最大值
 * @return bool 如果符合范围，则返回真，否则返回假
 */
function isInRange($num, $min, $max) {
	if ($num >= $min && $num <= $max) {
		return true;
	} else {
		return false;
	}
}

class human {
	static function ziwo($name) {
		if ($name == "zhang") {
			echo "你在第" . __LINE__ . "行被屏蔽了<br>";
			echo "你在" . __FILE__ . "代码里被屏蔽了<br>";
			echo "你在" . __DIR__ . "目录里被屏蔽了<br>";
			echo "你在" . __FUNCTION__ . "()函数里被屏蔽了<br>";
			echo "你在" . __CLASS__ . "类里被屏蔽了<br>";
			echo "你在" . __METHOD__ . "()方法里被屏蔽了<br>";
			echo "你在" . __NAMESPACE__ . "namespace 里被屏蔽了<br>";

			return;
		}
		echo "哈哈哈哈";
	}
}

human::ziwo($name);



?>


</body>
</html>

