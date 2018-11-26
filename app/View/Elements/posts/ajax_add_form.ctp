<?php
echo $this->Form->create('Post',[
    'url'=>"/posts/ajaxAdd",
    'id'=>'ajax_add_form',
    'default'=>false,
    'inputDefaults'=>array(
        'div'=>'form-group',
        'class'=>'form-control',
        'id'=>'ajax_add_form',
        'escape'=>false
    )


]);
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>

<script>
$('#out').click(function(){
    alert("您已退出登录");
});

$("#ajax_add_form").submit(function(){
    var url=$(this).attr("action");
    var data=$(this).serialize();

    $.ajax({
        url:url,
        type:"post",
        data:data,
        dataType:"html",
        success:function(response){
            $('#post_list').html(response);

        }
    });
    return false;


})

</script>