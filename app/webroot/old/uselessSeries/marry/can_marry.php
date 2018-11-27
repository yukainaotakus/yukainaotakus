<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>在线根据我国法律能否结婚</title>
</head>
<body>

有一个国家，有如下规定<br>
条件：如果姓张，必须20岁能结婚，否则18岁以后能结婚。

<?php
class human {
    var $name;
    var $age;
}

// 判断这个human对象是否能结婚
// 条件：如果姓张，必须20岁能结婚，否则18岁以后能结婚。
$zhangsan = new human();
$zhangsan->name = "李三张";
$zhangsan->age = 19;

echo "<pre>";
print_r($zhangsan);
echo "</pre>";

echo "这个人是".$zhangsan->name."今年".$zhangsan->age."岁<br>";

// 判断human对象的姓是不是张
$isZhang = mb_strpos($zhangsan->name, "张",0);
var_dump($isZhang);

if($isZhang === 0){
    echo __LINE__."是张<br>";
    
    // 如果大于20岁就能结婚
    if($zhangsan->age >=20){
        echo __LINE__."能结婚<br>";
    } else {
        echo __LINE__."不能结婚<br>";
    }

} else {
    // 不是姓张的人
    echo __LINE__."不是姓张<br>";
    if($zhangsan->age>=18){
        echo __LINE__."能结婚<br>";
    } else {
        echo __LINE__."不能结婚<br>";
    }


}


?>

法律正在完善中.

</body>
</html>