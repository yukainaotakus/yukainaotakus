<!-- File: /app/View/Monsters/add.ctp -->

<h1>Add Monster</h1>
<?php
echo $this->Form->create('Monster');

echo $this->Form->input('type');
echo $this->Form->input('m_name');
echo $this->Form->input('m_level');
echo $this->Form->input('address');
echo $this->Form->input('atk');


echo $this->Form->end('保存 Monster');
?>