<!-- File: /app/View/Monsters/index.ctp -->

<h1>游戏列表</h1>





<table> 
    <tr>
        <th>编号</th>
        <th>游戏名字</th>
        <th>游戏类型</th>
        <th>发行时间</th>
        <th>发行商</th>
        <th>评分</th>
        <th>游戏介绍</th>
        <th>游戏平台</th>
        <th>游戏价格</th>
    </tr>

    <!-- Here is where we loop through our $Monsters array, printing out Monster info -->

    <?php foreach ($gameinfo as $GameInfo): ?>
    <tr>
<td><?php echo $GameInfo['GameInfo']['id']; ?></td>
<td><?php echo $GameInfo['GameInfo']['game_name']; ?></td>
<td><?php echo $GameInfo['GameInfo']['type']; ?></td>
<td><?php echo $GameInfo['GameInfo']['release_date']; ?></td>
<td><?php echo $GameInfo['GameInfo']['publisher']; ?></td>
<td><?php echo $GameInfo['GameInfo']['score']; ?></td>
<td><?php echo $GameInfo['GameInfo']['introduction']; ?></td>
<td><?php echo $GameInfo['GameInfo']['platform']; ?></td>
<td><?php echo $GameInfo['GameInfo']['price']; ?></td>


    </tr>
    <?php endforeach; ?>
    

    
</table>
<?php
// echo "<pre>";
// print_r($_SESSION)  ;
// //$_SESSION['Auth']['User']['username']
// echo "</pre>";
//echo "我是用户".$uname = $this->Session->read('Auth.User.username')." id是".$uid = $this->Session->read('Auth.User.id')
?>