<!-- File: /app/View/Monsters/view.ctp -->
<?php 

App::import('Vendor','util');
App::import('Vendor','platform');

?>




<p><?php echo "游戏名称： ". h($gameinfo['GameInfo']['game_name']); ?></p>
<p><?php echo "游戏类型： ". h($gameinfo['GameInfo']['type']); ?></p>
<p><?php echo "发售时间： ". h($gameinfo['GameInfo']['release_date']); ?></p>
<p><?php echo "发行商： ". h($gameinfo['GameInfo']['publisher']); ?></p>
<p><?php echo "游戏评分： ". h($gameinfo['GameInfo']['score']); ?></p>
<p><?php echo "游戏简介： ". h($gameinfo['GameInfo']['introduction']); ?></p>

<p><?php $decNum=h($gameinfo['GameInfo']['platform']); 
$platArray=(bin2dec($decNum)) ;

$myPlatform=showPlatform($platArray);
echo "运行平台：";
foreach ($myPlatform as $key => $value) {
    echo $key." ";
    };  
?></p>


<p><?php echo "定价： ". h($gameinfo['GameInfo']['price']); ?></p>


<?php echo $this->Html->link(
    '返回列表',
    array( 'action' => 'index')
); ?>