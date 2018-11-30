<!-- File: /app/View/Posts/edit.ctp -->

<h1>编辑</h1>
<?php

echo $this->Form->create('GameInfo');

echo $this->Form->input('id');
echo $this->Form->input('game_name');
echo $this->Form->input('type');
echo $this->Form->input('release_date');
echo $this->Form->input('publisher');
echo $this->Form->input('score');
echo $this->Form->input('introduction');
echo $this->Form->input('platform');
echo $this->Form->input('price');


echo $this->Form->end('保存数据');


?>