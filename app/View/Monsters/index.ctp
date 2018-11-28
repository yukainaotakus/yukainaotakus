<!-- File: /app/View/Monsters/index.ctp -->

<h1>怪物列表</h1>

<!-- <button><?php //echo $this->Html->link("点我注册", array( 'controller' => 'Users',
                  //      'action' =>'add')); ?></button>
<button><?php //echo $this->Html->link("点我登录", array( 'controller' => 'Users',
                      //  'action' =>'login')); ?></button>
<button id='out'><?php // echo $this->Html->link("退出登录", array( 'controller' => 'Users',
                       // 'action' =>'logout')); ?></button> -->
<!-- <script>
$('#out').click(function(){
    alert("您已退出登录");
}); 


<table> 
    <tr>
        <th>编号</th>
        <th>名字</th>
        <th>编辑删除</th>
        <th>攻击力</th>
    </tr>

    <!-- Here is where we loop through our $Monsters array, printing out Monster info -->
<?php 
    
?>
    <?php foreach ($monsters as $Monster): ?>
    <tr>
        <td><?php echo $Monster['Monster']['mno']; ?></td>

        <td>
            <?php echo $this->Html->link($Monster['Monster']['m_name'],
array('controller' => 'Monsters', 'action' => 'view', $Monster['Monster']['mno'])); ?>
        </td>
        <td><?php
                echo $this->Html->link(
                    '编辑',
                    array('action' => 'edit', $Monster['Monster']['mno'])
                );
            ?>
            <?php
                echo $this->Form->postLink(
                    '删除',
                    array('action' => 'delete', $Monster['Monster']['mno']),
                    array('confirm' => '你确定要删掉怪物吗?')
                );
            ?>
        </td>
        <td><?php echo $Monster['Monster']['atk']; ?></td>
    </tr>
    <?php endforeach; ?>

    <?php unset($Monster);

    ?>
</table>


<?php
// echo "<pre>";
// print_r($_SESSION['Auth']['User'])  ;
// //$_SESSION['Auth']['User']['username']
// echo "</pre>";
?>

