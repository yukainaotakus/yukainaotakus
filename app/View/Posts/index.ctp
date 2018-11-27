<!-- File: /app/View/Posts/index.ctp -->

<h1>这里是首页</h1>
<p><?php echo $this->Html->link("点我增加新文章", array('action' => 'add')); ?></p>
<button><?php echo $this->Html->link("点我注册", array( 'controller' => 'Users',
                        'action' =>'add')); ?></button>
<!-- <a href="users/add" ><button type="button" class="btn btn-primary" >点我注册 </button></a> -->
<button><?php echo $this->Html->link("点我登录", array( 'controller' => 'Users',
                        'action' =>'login')); ?></button>
<button id='out'><?php echo $this->Html->link("退出登录", array( 'controller' => 'Users',
                        'action' =>'logout')); ?></button>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  点我增加
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">增加</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <?php echo $this->element("posts/ajax_add_form");?> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭页面</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
  </div>
</div>



<div id="post_list">
<?php
echo $this->element("posts/post_list", ['posts'=>$posts]);
?>
</div>