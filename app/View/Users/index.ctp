<h1>个人主页</h1>

<p>
<?php 
 

echo "您好".$this->Session->read('Auth.User.username')."!!!您是本站的第".$this->Session->read('Auth.User.id')."位用户，希望您在这里尽情享受【没卵用系列】给您带来的极致用户体验！have a nice day !";

?>
</p>

<p>以下是您收藏过的游戏</p>
<?php
//debug($list);
foreach ($list as $MyList):?>



游戏名字:<?php echo $MyList['GameInfo']['game_name']; ?><br>


<?php endforeach; ?>
<div>收藏栏 以上です</div>