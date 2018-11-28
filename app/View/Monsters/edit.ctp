<!-- File: /app/View/Posts/edit.ctp -->

<h1>Edit Post</h1>
<?php
echo $this->Form->create('Monster');
echo $this->Form->input('mno');
echo $this->Form->input('type');
echo $this->Form->input('m_name');
echo $this->Form->input('m_level');
echo $this->Form->input('address');
echo $this->Form->input('atk');


echo $this->Form->end('Save Post');
?>