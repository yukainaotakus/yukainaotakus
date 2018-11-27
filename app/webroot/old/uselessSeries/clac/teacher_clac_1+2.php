<!DOCTYPE HTML>

<html>

<head>

    <meta http-equiv="pragma" content="no-cache">

    <meta http-equiv="cache-control" content="no-cache">

    <meta http-equiv="expires" content="0">





    <title>来呀~快算呀~</title>



    <style>

        form button {

            width: 70px;

            height: 50px;

            background-color: #48c7ce;

            border: none;

        }



        form button:hover {

            background-color: #328a91;

        }

    </style>

</head>

<body>



<?php

session_start();



// =================== 初始化变量 ===============

$result = "";

$lastValue = "";

// 是否需要清除

$isNeedClear = false;





// 当前运算符

// 上一个运算符



//





// 当session里有值的时候，让x的值为Session中储存的x；

$x = isset($_SESSION['x']) ? $_SESSION['x'] : 0;

$y = isset($_SESSION['y']) ? $_SESSION['y'] : 0;

$ope = isset($_SESSION['ope']) ? $_SESSION['ope'] : null;





// =================== 获取输入参数 ===============



// 从request中获取get数据



// 1 数字

//1.1 如果存在数字的话，则拿到他

if (isset($_GET['num'])) {

	$lastValue = $_GET['num'];

	// 把数字放到x里面

	if ($x) {

		$y = $lastValue;

	} else {

		$x = $lastValue;

	}

} else if (isset($_GET['ope'])) {

	// 2 运算符

	$lastValue = $_GET['ope'];

	// 当前的运算符为接收到的运算符

	$ope = $_GET['ope'];

} else if (isset($_GET['eq'])) {

	// 3 等号

	$lastValue = $_GET['eq'];



	if ($x && $y && $ope) {

		$result = calcu($x, $y, $ope);

		echo $result;

	}



} else if (isset($_GET['other'])) {

	// 4 清除

	$lastValue = $_GET['other'];

	$isNeedClear = true;

}



echo "<pre>";

print_r($_SESSION);

echo "</pre>";



echo "这一次你点击的按钮是：{$lastValue}<br>";

echo "x是：{$x}<br>";

echo "y是：{$y}<br>";

echo "运算符是：{$ope}<br>";







//计算的函数

/**

 * @param $x float 运算的第1个元素

 * @param $y float 运算的第2个元素

 * @param $ope string 运算符

 * @return float

 */

function calcu($x, $y, $ope) {

	if ($ope == "plus") {

		return $x + $y;

	}

	switch ($ope) {

		case "plus":

			return $x + $y;

			break;

		case "minus":

			return $x - $y;

			break;

	}

}





$_SESSION['x'] = $x;

$_SESSION['y'] = $y;

$_SESSION['ope'] = $ope;

echo "============= SESSION ==============<br>";



echo "x是：{$_SESSION['x']}<br>";

echo "y是：{$_SESSION['y']}<br>";

echo "运算符是：{$_SESSION['ope']}<br>";

?>





<form>

    <div>

		<?php echo $result; ?>

    </div>

    <div>

        <button name="num" value="1">1</button>

        <button name="num" value="2">2</button>

        <button name="ope" value="plus">+</button>

        <button name="ope" value="minus">-</button>

        <button name="eq" value="eq">=</button>

        <button name="other" value="clear">CE</button>

    </div>

</form>





<pre>

 <?php



 if ($isNeedClear) {

	 echo "进来了2";

	 unset($_SESSION['x']);

	 unset($_SESSION['y']);

	 unset($_SESSION['ope']);

	 echo "<pre>";

	 print_r($_SESSION);

	 echo "</pre>";

 }

 ?>

 </pre>





</body>

</html>