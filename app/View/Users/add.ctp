<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php  echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php
        if(!empty($this->Session->read('Auth.User.username'))){echo "您已经是本站会员了，请勿重复注册";
            }else{echo __('注册新用户');} 
            
            ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('u' => '正式用户')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('提交')); ?>
</div>

