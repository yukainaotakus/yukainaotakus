<!-- File: /app/View/Monsters/index.ctp -->
<?php 
echo $this->Paginator->prev(
    '上一页',
    null,
    null,
    array('class' => 'disabled')
);

echo "&nbsp";

echo $this->Paginator->numbers(); 

echo "&nbsp";
  
  echo $this->Paginator->next(
    '下一页',
    null,
    null,
    array('class' => 'disabled')
  );
 ?>
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
    <?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'GameInfo', 'action' => 'add')
); ?>







    <!-- Here is where we loop through our $Monsters array, printing out Monster info -->
<?php
?>
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

	<td>
            <?php
                echo $this->Html->link(
                    '查看',
                    array('action' => 'view', $GameInfo['GameInfo']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Html->link(
                    '编辑',
                    array('action' => 'edit', $GameInfo['GameInfo']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $GameInfo['GameInfo']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
         
        </td>
       
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
