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
if(!empty($_SESSION['message'])){
    echo $_SESSION['message'];
	unset($_SESSION['message']);
}
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";

$age = $_SESSION['age'];
$name = $_SESSION['name'];
$messages=$_SESSION['messages'];

foreach ($messages as $message) {
	echo $message."<br>";
}
?>

<form action="userRegistValidate.php" method="post">
    名字: <input type="text" name="fname"value="<?php echo $name; ?>">
    年龄: <input type="text" name="age"value= "<?php echo $age; ?>">
    <input type="submit" value="提交">
</form>

</body>
</html>

