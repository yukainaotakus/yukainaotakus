<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<meta charset="utf-8">
	<title>na</title>
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
  
  <form method="get"    >
      <table>
	  
			<tr>
                
               
            </tr>
     		<tr>
                <td><button  name="other" value="Clear">C</button></td>
                <td><button  name="ope" value="+/-">+/-</button></td>
                <td><button  name="ope" value="％">％</button></td>
                <td><button name="ope" value="division">/</button></td>
            </tr>
            <tr>
                <td><button  name="num" value="7">7</button></td>
                <td><button name="num" value="8">8</button></td>
                <td><button name="num" value="9">9</button></td>
                <td><button  name="ope" value="mult">*</button></td>
            </tr>
            <tr>
                <td><button  name="num" value="4">4</button></td>
                <td><button  name="num" value="5">5</button></td>
                <td><button  name="num" value="6">6</button></td>
                <td><button name="ope" value="minus">−</button></td>
            </tr>
            <tr>
                <td><button  name="num" value="1">1</button></td>
                <td><button  name="num" value="2">2</button></td>
                <td><button  name="num" value="3">3</button></td>
                <td><button  name="ope" value="plus">＋</button></td>
            </tr>
            <tr>
                <td ><button  name="num" value="0">0</button></td>
				<td ><button  name="num" value="00">00</button></td>
                <td><button  name="num" value=".">.</button></td>
                <td><button  name="eq" value="eq">＝</button></td>
            </tr>
         </table>
        
         
    
   </form>

<?php  session_start();

 $result = "";
 $b = "";
 $c = "";
 $q="";
  $isNeedClear = false;
//print_r($_GET['num']);

$z = isset($_SESSION['z']) ? $_SESSION['z'] : null;
$y = isset($_SESSION['y']) ? $_SESSION['y'] : null;
$ope = isset($_SESSION['ope']) ? $_SESSION['ope'] : null;
$a=isset($_SESSION['a'])?$_SESSION['a'] : 0;
$k=isset($_SESSION['k'])?$_SESSION['k'] : 0;
//$_SESSION['eq']=$result;



if(isset($_GET['num'])){                 
	if(!isset($_SESSION['ope'])){	
        $z=$_SESSION['z'].$_GET['num']; 
      
     	$_SESSION['z']=$z; 		//z就是第一个数	
			}else{  					
                $y=$_SESSION['y'].$_GET['num'];  
            			
                $_SESSION['y']=$y; //就是第二个数
            }  			



}

else if (isset($_GET['ope'])){
	$x=$_GET['ope'];
    $ope=$_GET['ope'];
    
}
//echo $ope;
else if (isset($_GET['eq'])){
    $x= $_GET['eq'];
  
    

//echo $z ;
if ($z && $y && $ope) {         //满足z,y,ope的变量都存在的时候，则result等于一个函数，然后echo它
             $result = calcu($z, $y, $ope);
            $_SESSION['res']=$result;
 		echo "这是结果".$result;
     }
     
}else if (isset($_GET['other'])) {
 	// 4 清除
 	$x = $_GET['other'];
 	$isNeedClear = true;
	
}
  
//  if(isset($_SESSION['eq'])){
//     $_SESSION['eq']=$_SESSION['z'];
//     $_SESSION['y']=null;

//  }


// if($_SESSION['eq']){
//     $_SESSION['z']=$_SESSION['eq'];
//     return $_SESSION['ope'];
//     }

//连加  当我再按下加号的时候 因为 y里面还有值所以 按下的数也会加在y上面 

// if(!isset($_SESSION["a"])){
//     $_SESSION["a"]=$_GET['ope'];
//     echo "wo" ;


// }


if(isset($_SESSION['res'])){
    $_SESSION['z']=$_SESSION['res'];  // 当结果有的时候吧结果给z；
    $z=$_SESSION['z'];
    //return $_SESSION['ope'];  
    if(isset($_GET['ope'])){
  $y=$q.$_GET['num'];
  $_SESSION['y']=$y ;
       
    }
}







//我应该怎么吧我按的键赋值给y









 echo "<pre>";
 print_r($_SESSION);
 echo "</pre>";

 echo "这一次你点击的按钮是：{$z}<br>";
 echo "z是：{$z}<br>";
 echo "y是：{$y}<br>";
 echo "运算符是：{$ope}<br>" ;





function calcu($z, $y, $ope) {
 	
 	switch ($ope) {
 		case "plus":
 			return $z + $y;
 			break;
 		case "minus":
 			return $z - $y;
 			break;
			
 		case "mult":
 			return $z * $y;
 			break; 		
			
		case "division":
 			return $z / $y;
 			break;
	
}
}
	
	
$_SESSION['z'] = $z;
 $_SESSION['y'] = $y;
 $_SESSION['ope'] = $ope;
 echo "z是：{$_SESSION['z']}<br>";
 echo "y是：{$_SESSION['y']}<br>";
 echo "运算符是：{$_SESSION['ope']}<br>";
		
if($isNeedClear){
 	 unset($_SESSION['z']);
 	 unset($_SESSION['y']);
 	 unset($_SESSION['ope']);
     unset($_SESSION['num']);
     unset($_SESSION['q']);
     unset($_SESSION['res']);
     unset($_SESSION['eq']);
     
 }
	
//session_destroy();
?>
  </body>
 </html>
 
 