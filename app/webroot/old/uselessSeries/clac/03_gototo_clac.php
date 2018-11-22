<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta charset="utf-8">
	<title>一个很长~~~~~~~~~~~的标题~~~~~~~~~你™就不能用手机自带计算器算吗！非要用我写的网页版吗！好吧，原谅你了╮(╯▽╰)╭唉，我真善良 by程序猿</title>
<style>
        form button {
            width: 70px;
            height: 70px;
			margin-left:15px;
            background-color: #f1a822;
            border: none;
			border-radius:35px;
			font-size:24px; 	
        }
		table{
			position:fixed;
			left:50px;
			top:200px;
		}
		div p{
			color: #9e5008;
    		position: fixed;
    		left: 150px;
    		font-size: 25px;
   			font-weight: 500;
		}
		h1{
			color: #a6aef3f5;
		}
		a{
			text-decoration:none;
			color:black;
		}
        form button:hover {
            background-color: #f1bf65fa;
        }
</style>
</head>
<body>
<?php session_start(); ?>
<h1>低调奢华有内涵的计算器</h1>

<?php
$resule ="";
$x ="";
$y ="";
//判断拿到的输入是数字 or 运算符 or其他 clear则清空缓存
if(isset($_GET['figure'])){                 //当为数字 
	if(!isset($_SESSION['mark'])){	
		$x=$_SESSION['x'].$_GET['figure']; //记录至今为止拿到的数值
		$lastput=$_GET['figure']; 		//记录最后一次输入的数	
		$resule=$x;					//显示数字 
		$_SESSION['x']=$x; 			// session x
			}else{  					//拿到数字并已有符号  则赋值给y 
				$y=$_SESSION['y'].$_GET['figure']; 
				$lastput=$_GET['figure']; 
				$resule=$y;
				$_SESSION['y']=$y; 			// session y
			}
				}elseif(isset($_GET['mark'])){ 
					if($_SESSION['y']){            //不同符号连续运算 判断y是否有值，有y就看做等号，出得数
						
						$resule=opera($_SESSION['x'], $_SESSION['y'],$_SESSION['mark'])."<br>";
						$mark=$_SESSION['mark']=$_GET['mark'];
						$_SESSION['x']=$x=$resule;
						$_SESSION['tmp']=$_SESSION['y'];
						$_SESSION['y']=$y=null;
					}else{  						//正常x+y= 顺序
					$mark=$_GET['mark'];
					$_SESSION['mark']=$mark;
					$resule=$_SESSION['x'];  		//显示数字 
						}
						}elseif(isset($_GET['other'])){
							if($_GET['other']=="back"){ //后退键 减去左起第一位数
								isset($_SESSION['y']) ? $_SESSION['y']=$y=$resule=substr($_SESSION['y'],0,-1):$_SESSION['x']=$x=$resule=substr($_SESSION['x'],0,-1) ;	
								}elseif($_GET['other']=="mai"){
									isset($_SESSION['y'])?$_SESSION['y']=$y=$resule=-$_SESSION['y']:$_SESSION['x']=$x=$resule=-$_SESSION['x'];
										}
									}elseif(isset($_GET['equal'])){   //当输入等号
										if($_SESSION['mark']=="divi" && $_SESSION['y']=="0"){ //判断除数为0
											$resule="ERROR";
										}elseif(!isset($_SESSION['y']) && !isset($_SESSION['tmp'])){  //不输入y 运算符后直接等于
											$resule=opera($_SESSION['x'], $_SESSION['x'],$_SESSION['mark']);
											$_SESSION['x']=$x=$resule;		
											$_SESSION['tmp']=$_SESSION['y'];
											$_SESSION['y']=$y=null; 	
											}elseif(isset($_SESSION['tmp'])){  //有临时缓存y时 判断是否有新值y 沿用上次的运算符
												$_SESSION['tmp']= isset($_SESSION['y']) ? $_SESSION['y']:$_SESSION['tmp']; //有y的话优先使用
												$resule=opera($_SESSION['x'], $_SESSION['tmp'],$_SESSION['mark']);
												$_SESSION['x']=$x=$resule;								
													}elseif(isset($_SESSION['y'])){ //正常x+y= 顺序
													$resule=opera($_SESSION['x'], $_SESSION['y'],$_SESSION['mark']); //调用函数
													$_SESSION['x']=$x=$resule;		// 等号之后保留得数为x 清空y
													$_SESSION['tmp']=$_SESSION['y'];
													$_SESSION['y']=$y=null; 
													}
												}elseif(isset($_GET['clear'])){
													unset($_SESSION['figure']);
													unset($_SESSION['mark']);
													unset($_SESSION['x']);
													unset($_SESSION['y']);
													unset($_SESSION['tmp']);
													unset($_SESSION['resule']);
				    							}								
//运算
function opera($x, $y, $mark){
	switch ($mark) {
		case "plus":
			return $x + $y;
			break;
		case "minus":
			return $x - $y;
			break;
		case "multi":
			return $x*$y;
			break;
		case "divi":
			return $x/$y;
			break;		
	}
}
?>

<form>
<table id="calc">
<tr><div><p><?php echo $resule."<br>"; ?></p></div></tr>
<tr>
	<td><div><button name="figure" value="1">1</button></div></td>
	<td><div><button name="figure" value="2">2</button></div></td>
	<td><div><button name="figure" value="3">3</button></div></td>
	<td><div><button name="mark" value="plus">＋</button></div></td>
</tr>
<tr>
    <td><div><button name="figure" value="4">4</button></div></td>
	<td><div><button name="figure" value="5">5</button></div></td>
	<td><div><button name="figure" value="6">6</button></div></td>
	<td><div><button name="mark" value="minus">－</button></div></td>
</tr>
<tr>
    <td><div><button name="figure" value="7">7</button></div></td>
	<td><div><button name="figure" value="8">8</button></div></td>
	<td><div><button name="figure" value="9">9</button></div></td>
	<td><div><button name="mark" value="multi">×</button></div></td>
</tr>
<tr>
	<td><div><button name="figure" value="0">0</button></div></td>
	<td><div><button name="figure" value="." >.</button></div></td>   
    <td><div><button name="clear" value="clear" >C</button></div></td>
    <td><div><button name="mark" value="divi">÷</button></div></td>
</tr>
<tr>
	<td><div><button name="equal" value="equal">=</button></div></td>
	<td><div><button name="other" value="mai">±</button></div></td>
	<td><div><button name="other" value="back">←</button></div></td>
	<td><a href="https://yukainaotakus.dooun.net"><div><button>㊙︎</button></div></a></td>
</tr>
</table>
</form>

</body>
</html>