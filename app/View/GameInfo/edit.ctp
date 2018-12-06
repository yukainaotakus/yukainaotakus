<!-- File: /app/View/Posts/edit.ctp -->
<h1>编辑</h1>

<?php
App::import('Vendor','util');
App::import('Vendor','platform');

echo $this->Form->create('GameInfo');

echo $this->Form->input('id');
echo $this->Form->input('game_name');
echo $this->Form->input('type');
echo $this->Form->input('release_date');
echo $this->Form->input('publisher');
echo $this->Form->input('score');
echo $this->Form->input('introduction');


//print_r($hello);
$decNum=$a['GameInfo']['platform'];
$platArray=(bin2dec($decNum));
// print_r($platArray) ;
// echo"<br>";

// print_r(array_values($platArray)) ;

$options = array(1 => 'ps2', 2=>'ps3', 4=>'ps4', 8=>'psp', 16=>'steam/PC', 32=>'psv', 64=>'3DS',128=>'switch',256=>'WiiU',512=>'Xbox/Xbox360');
$selected = $platArray;
echo $this->Form->input('platform', array('multiple' => 'checkbox', 'options' => $options , 'selected' => $selected ));


echo $this->Form->input('price');


echo $this->Form->end('保存数据');


?>