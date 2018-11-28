<!-- File: /app/View/Monsters/view.ctp -->
<?php 
// debug($monsterList);

?>

<h1><?php echo h($monsterList['Monster']['mno']); ?></h1>

<p><small> <?php //echo $monsterList['Monster']['type']; ?></small></p>
<p><?php echo h($monsterList['Monster']['type']); ?></p>
<p><?php echo h($monsterList['Monster']['m_name']); ?></p>
<p><?php echo h($monsterList['Monster']['m_level']); ?></p>



<p><?php echo h($monsterList['Monster']['address']); ?></p>
<p><?php echo h($monsterList['Monster']['atk']); ?></p>


<?php echo $this->Html->link(
    '返回怪物列表',
    array( 'action' => 'index')
); ?>