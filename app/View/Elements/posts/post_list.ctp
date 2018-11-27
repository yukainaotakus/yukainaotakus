<table>
    <tr>
        <th>Id</th>
        <th>文章标题</th>
        <th>删改</th>
        <th>创建时间</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

   <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php
                echo $this->Html->link(
                    $post['Post']['title'],
                    array('action' => 'view', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php
                echo $this->Form->postLink(
                    '删除',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => '确定删除？你想掩盖些什么?')
                );
            ?>
            <?php
                echo $this->Html->link(
                    '编辑',
                    array('action' => 'edit', $post['Post']['id'])
                );
            ?>
        </td>
        <td>
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>