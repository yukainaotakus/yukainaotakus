<!-- File: /app/View/Monsters/index.ctp -->

<h1>Blog Monsters</h1>
<?php echo $this->Html->link(
    '增加一个新的mon',
    array('controller' => 'Monsters', 'action' => 'add')
); ?>
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
    <?php unset($Monster); ?>
</table>