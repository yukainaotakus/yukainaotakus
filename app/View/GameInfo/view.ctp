<!-- File: /app/View/Monsters/view.ctp -->
<?php 
 //debug($GameInfo);
?>




<p><?php echo h($gameinfo['GameInfo']['game_name']); ?></p>
<p><?php echo h($gameinfo['GameInfo']['type']); ?></p>
<p><?php echo h($gameinfo['GameInfo']['release_date']); ?></p>
<p><?php echo h($gameinfo['GameInfo']['publisher']); ?></p>
<p><?php echo h($gameinfo['GameInfo']['score']); ?></p>
<p><?php echo h($gameinfo['GameInfo']['introduction']); ?></p>
<p><?php echo h($gameinfo['GameInfo']['platform']); ?></p>
<p><?php echo h($gameinfo['GameInfo']['price']); ?></p>


<?php echo $this->Html->link(
    '返回列表',
    array( 'action' => 'index')
); ?>