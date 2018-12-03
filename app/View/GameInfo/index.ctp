<!-- File: /app/View/Monsters/index.ctp -->

<h1>游戏列表</h1>





<table> 
<div class="container">




    <?php foreach ($gameinfo as $GameInfo): ?>
  




<div class="row">
    <div class="col-3">
    宣传图片<img src="">

 
    <br>

     <?php
                echo $this->Html->link(
                    '查看',
                    array('action' => 'view', $GameInfo['GameInfo']['id'])
                );
            ?>
        
        
            <?php
                echo $this->Html->link(
                    '编辑',
                    array('action' => 'edit', $GameInfo['GameInfo']['id'])
                );
            ?>
      
      
            <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $GameInfo['GameInfo']['id']),
                    array('confirm' => 'Are you sure?')
                );
            ?>
         
         <br>

    </div>
    <div class="col-5">
    游戏名字:<?php echo $GameInfo['GameInfo']['game_name']; ?><br>
    <br>
    游戏类型:<?php echo $GameInfo['GameInfo']['type']; ?><br>
    <br>
    发行时间:<?php echo $GameInfo['GameInfo']['release_date']; ?><br>
    <br>
    发行商:<?php echo $GameInfo['GameInfo']['publisher']; ?><br>
    <br>
    游戏平台:<?php echo $GameInfo['GameInfo']['platform']; ?><br>
    <br>
    评分:<?php echo $GameInfo['GameInfo']['score']; ?><br>
   
    </div>
  
 
    <div class="col-3">
    游戏价格: <?php echo $GameInfo['GameInfo']['price']; ?><br>

    <br>
    游戏介绍:<?php echo $GameInfo['GameInfo']['introduction']; ?><br>
    </div>

  	




<div class="col-1">
  ▲顶 <?php echo $this->Html->image('iine.png',array('width'=>'40','height'=>'40'));?> <br>
  
    <br>
  ▼踩<?php echo $this->Html->image('dae.jpg',array('width'=>'50','height'=>'50'));?><br>
  </div>







</div>


  
    <?php endforeach; ?>
              

    
</table>
