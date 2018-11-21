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
                <td><button  name="ope" value="+/-">-</button></td>
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

$z = isset($_SESSION['z']) ? $_SESSION['z'] : 0;
$y = isset($_SESSION['y']) ? $_SESSION['y'] : 0;
$ope = isset($_SESSION['ope']) ? $_SESSION['ope'] : null;
$a=isset($_SESSION['a'])?$_SESSION['a'] : 0;
$k=isset($_SESSION['a'])?$_SESSION['k'] : 0;


print_r($_SESSION);

    
        // if($_SESSION['z']=null){$_SESSION['z']=0;} 
        // else{$_SESSION['z']=$_SESSION['zz'];

        //     echo $_SESSION['zz']= $_SESSION['z'].$num;
        // }
            
        
    
        // if($_SESSION['y']=null){$_SESSION['y']=0;} 
        // else{$_SESSION['y']=$_SESSION['yy'];

        //     echo $_SESSION['yy']= $_SESSION['y'].$num;
        // }

// }
// }
// }
// if($a=null){
//     $a=0;
// }else {$a=$z;
// echo $a;}
// if(isset($_GET['num'])){
    
//    $z=$_GET['num'];
//    echo $z;
//    echo $k=$a.$z;
   
  //if(isset($a)){
      
 // }


if(isset($_GET['num'])){                 
	if(!isset($_SESSION['ope'])){	
        $z=$_SESSION['z'].$_GET['num']; 
      
     	$_SESSION['z']=$z; 			
			}else{  					
                $y=$_SESSION['y'].$_GET['num'];  
            			
				$_SESSION['y']=$y; 			
}
}

// }elseif(isset($_GET['ope'])){ 
//     if($_SESSION['y']){          
//         //计算让y等于零 得数保留在eq 
       
//         $m=$_SESSION['ope']=$_GET['ope'];
//         $_SESSION['z']=$result;
//         // $_SESSION['tp']=$_SESSION['y'];
//         // $_SESSION['y']=$y=null;
//     }else{  						
//     $m=$_GET['ope'];
//     $_SESSION['ope']=$m;
//     $result=$_SESSION['z'];  		
//         }
    
// $_SESSION['eq']=$result;
// print_r($_SESSION['eq']);
// if(isset($_GET['ope'])){
   
//  }





// elseif(isset($_GET['ope'])){ 
//     if($_SESSION['y']){          
        
//         $result=calcu($_SESSION['z'], $_SESSION['y'],$_SESSION['ope'])."<br>";
//         $opr=$_SESSION['ope']=$_GET['ope'];
//         $_SESSION['z']=$z=$result;
//         $_SESSION['bc']=$_SESSION['y'];
//         $_SESSION['y']=$y=null;
//     }else{  						
//     $opr=$_GET['ope'];
//     $_SESSION['ope']=$opr;
//     $result=$_SESSION['z'];  		
//         }
//     }
//if (isset($_GET['num'])) {
  //  $x=$_GET['num'];
//	//echo $x;

//if($z){
//		$y=$x;
//}else {
//	    $z=$x; 
//	echo $z;		
//}
//}
//if(isset($_GET['eq'])){   
//if($_SESSION['ope']=="division" && $_SESSION['y']=="0"){ 

//}}
//if(isset($_SESSION['y'])){ 
//($_SESSION['x'], $_SESSION['y'],$_SESSION['ope']); 
//$_SESSION['z']=$z;		
//$_SESSION['y']=$y=null; 
						//							}
//







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
             $_SESSION['eq']=$result;
 		echo "这是结果".$result;
     }
     
}else if (isset($_GET['other'])) {
 	// 4 清除
 	$x = $_GET['other'];
 	$isNeedClear = true;
	
}


//连续等于 
//  $_SESSION['eq']=$result;
// if($_SESSION['eq']){
//     $_SESSION['z']=$_SESSION['eq'];

//    return $_SESSION['ope'];
// }




//$_SESSION['eq']=$result;


//连续加减乘除
// if(isset($_SESSION['y'])){
//     $result=calcu($_SESSION['z'], $_SESSION['y'],$_SESSION['ope']); 
    
//     $_SESSION['ig']=$_SESSION['y'];
//     $_SESSION['y']=null; 
//     }else{
//         $_SESSION['eq']=null;
       
//     }
    
 
//     if($_SESSION['eq']){
//         $_SESSION['z']=$_SESSION['eq'];

//        return $_SESSION['ope'];
//     }elseif($_SESSION['eq']){
//         $_SESSION['y']=$_SESSION['eq'];
   
//        return $_SESSION['ope'];}


if(isset($_SESSION['eq'])){
    $_SESSION['z']=$_SESSION['eq'];  // 当结果有的时候吧结果给z；
    $z=$_SESSION['z'];
    //return $_SESSION['ope'];  
    if(isset($_GET['ope'])){
  $y=$q.$_GET['num'];
  $_SESSION['y']=$y ;
       
    }
}

if(isset($_SESSION['eq'])){
    $_SESSION['ope']=$_SESSION['eq'];  // 当结果有的时候吧结果给z；
    $b=$_SESSION['ope'];
}



//   if(isset($_SESSION['ig'])){
//       // $_SESSION['eq']=$_SESSION['ig'];

//        $result=calcu($_SESSION['z'], $_SESSION['y'],$_SESSION['ope']); 
//        $_SESSION['z']=$result;
//   }



   
    // if($_SESSION['eq']){
       
       
        
    //         $_SESSION['jie']=$_SESSION['y'];
    //         unset($_SESSION['jie']);
    //         echo "zheesh";
    // }
// if(empty($_SESSION['yy'])){


//  if($_SESSION['y']){
//    if($_SESSION['y']=$_SESSION('eq')){
//        $_SESSION['y']=null;
//    }  
// }
		// 等号之后保留得数为x 清空y
//$_SESSION['tp']=$_SESSION['y'];
//$_SESSION['y']=$y=null; 

// $flag=true;
// if(empty($_SESSION['yy'])){
// echo "空";
// $flag=false;
// $_SESSION['yy'];}
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
     unset($_SESSION['zz']);
     unset($_SESSION['yy']);
     unset($_SESSION['eq']);
     unset($_SESSION['jie']);
     unset($_SESSION['mk']);

     unset($_SESSION['ig']);
 }
	
//session_destroy();
?>
  </body>
 </html>
 
 