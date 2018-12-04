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
// $_SESSION['Auth']['User']['username']
// echo "</pre>";
//echo "我是用户".$uname = $this->Session->read('Auth.User.username')." id是".$uid = $this->Session->read('Auth.User.id')
?>
<?php 
//pagenation 数字
// function testsatoshi($page=1){
//     echo "这里是test";  
//}         
//     testsatoshi();


print_r($pagenation);
$pageBegin=$pagenation['pageBegin'];
$pageEnd=$pagenation['pageEnd'];
$page=isset($_GET['page'])?$_GET['page']:1;



// echo $this->Html->script('jquery-3.3.1.js');
// echo $this->Html->script('bootstrap.js');
// echo $this->Html->css('bootstrap');
echo '<nav aria-label="...">';
echo '<ul class="pagination pagination-lg">';
echo '<li class="page-item disabled">';
echo '<a class="page-link" href="" tabindex="-1"></a >';
echo '</li>';
echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'">上一页</a ></li>';


for($a=$pageBegin;$a<=$pageEnd;$a++){
    
echo '<li class="page-item"><a class="page-link" href="?page='.$a.'">'.$a.'</a ></li>';
}



echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'">下一页</a ></li>';
echo '</ul>';
echo '</nav>';




// $page="";
// $a="";
// $startPage=$page;

// echo '<nav aria-label="...">';
// echo  '<ul class="pagination pagination-lg">';
// echo     '<li class="page-item disabled">';

// echo     '</li>';
// echo     '<li class="page-item"><a class="page-link" href="?p='.($page-1).'">上一页</a></li>';
// for($a=$startPage;$a<=$endPage;$a++){
    
//     echo '<li class="page-item"><a class="page-link" href="?p='.$a.'">'.$a.'</a></li>';
// }
// echo    '<li class="page-item"><a class="page-link" href="?p='.($page+1).'">下一页</a></li>';
// echo   '</ul>';
// echo '</nav>';



// function getpage($page=1){
//     echo 1111;
//     return ;
// }


// //用框架方式的写法备份
// echo $this->Paginator->prev(
//     '上一页',
//     null,
//     null,
//     array('class' => 'disabled')
// );
// echo "&nbsp";
// echo $this->Paginator->numbers(
// ); 
// echo "&nbsp"; 
// echo $this->Paginator->next(
//     '下一页',
//     null,
//     null,
//     array('class' => 'disabled')
//   );

// 写法备份
//   echo $this->Paginator->counter(
//    // '{:page}'. //当前页
//    // '{:pages}'. //总页数
//   //  '{:count}' //总共多少条数据
   
// );


 ?>