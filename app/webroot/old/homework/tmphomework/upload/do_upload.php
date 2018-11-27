<!DOCTYPE HTML>


<html>
<head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<meta charset="utf-8">

	<title>do上传怪兽图片</title>
</head>
<body>
 
<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "learn";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);

$mno = $_REQUEST['mno'];
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg"))
&& ($_FILES["file"]["size"] < 9000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    //echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    }
  else
    {
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
  //  echo "Type: " . $_FILES["file"]["type"] . "<br/>";
  //  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br/>";
  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";

    if (file_exists("images/" . $_FILES["file"]["name"]))
      {
    //  echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/" . $_FILES["file"]["name"]);
   //   echo "Stored in: " . "images/" . $_FILES["file"]["name"];
      }
    }
}
else
  {
  //echo "Invalid file";
  }
 


$sql = "INSERT INTO `monster_images` (`mno`, `image_url`) VALUES ('$mno', '{$_FILES["file"]["name"]}');";
if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 

?>
<div><button><a href='../asdflise.php'>返回首页</a></button></div>

  
</body>
</html>