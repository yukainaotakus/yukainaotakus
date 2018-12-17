<h1>编辑用户详情</h1>


<?php 
App::import('Model','UserInfo');

echo $this->Form->create('UserInfo');
echo "昵称".$this->Form->input('nickname');
echo "邮箱".$this->Form->input('email');
//echo "性别".$this->Form->input('sex_div');
$options = array(0 => '男', 1=>'女', 2=>'保密');
//$selected = $platArray;
echo "性别".$this->Form->input('sex_div', array('multiple' => 'radio', 'options' => $options ));


echo "生日".$this->Form->input('birthday');



echo $this->Form->end('保存数据');
?>

