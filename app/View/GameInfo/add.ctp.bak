<h1>增加数据yutaku</h1>

<?php
echo $this->Form->create('GameInfo');

echo $this->Form->input('game_name');
echo $this->Form->input('type');
echo $this->Form->input('release_date');
echo $this->Form->input('publisher');
echo $this->Form->input('score');
echo $this->Form->input('introduction');

$options = array(1 => 'ps2', 2=>'ps3', 4=>'ps4', 8=>'psp', 16=>'steam/PC', 32=>'psv', 64=>'3DS',128=>'switch',256=>'WiiU',512=>'Xbox/Xbox360');
//$selected = array(1, 3);
echo $this->Form->input('platform', array('multiple' => 'checkbox', 'options' => $options ));

?>



<?php
echo $this->Form->input('price');

echo $this->Form->end('保存数据');

?>