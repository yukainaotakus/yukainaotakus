<!-- File: /app/View/Monsters/index.ctp -->
   <?php
 
	
	?>
<script>
	// 当点击带有“data-ajax=link”的标签时，触发ajax事件
	$(function () {
		$("[data-ajax=link]").click(function () {
			var url = $(this).attr("href");
			// 执行 ajax
			$.ajax({
				"url": url,
				"dataType": "json",
				"type": "get",
				"success": function (response) {
					if (response.result === true){
						alert("收藏成功");
					} else {
						alert(response.msg);
                    }
				},
                "error": function(){
					alert("通信失败");
                }
			});
			return false;

		});
	})

	$(function(){
		$("[data-ajaxLike=link]").click(function(){
			var url = $(this).attr("href");
		$.ajax({
			"url":url,
			"dataType":"json",
			"type":"get",
			"success":function(response){
				if(response.result===true){
					alert("点赞成功");

				}else{
					alert(response.msg)
				}
			},
			"error": function(){
					alert("通信失败");
                }

		});
		return false;
	});
	})
	
	

		$(function(){
		$("[data-ajaxdontlike=link]").click(function(){
			var url = $(this).attr("href");
		$.ajax({
			"url":url,
			"dataType":"json",
			"type":"get",
			"success":function(response){
				if(response.result===true){
					alert("点踩成功");

				}else{
					alert(response.msg)
				}
			},
			"error": function(){
					alert("通信失败");
                }

		});
		return false;
	});
	})
</script>






<table>
    <div class="container">
	<h1>游戏列表</h1>

		<?php foreach ($gameinfo as $GameInfo): ?>


            <div class="row">
                <div class="col-3">
                    宣传图片<img src="">


                    <br>

					<?php
					echo $this->Html->link('查看', array(
							'action' => 'view',
							$GameInfo['GameInfo']['id']
						));
					?>


					<?php
					echo $this->Html->link('编辑', array(
							'action' => 'edit',
							$GameInfo['GameInfo']['id']
						));
					?>


					<?php
					echo $this->Form->postLink('Delete', array(
							'action' => 'delete',
							$GameInfo['GameInfo']['id']
						), array('confirm' => 'Are you sure?'));
					?>

                    <br>

                </div>
                <div class="col-5">
                    游戏名字:<?php echo $GameInfo['GameInfo']['game_name']; ?><br>
                    <br>
                    游戏类型:<?php echo $GameInfo['GameInfo']['type']; ?><br>
                    <br>
                    发行时间:<?php echo $GameInfo['GameInfo']['release_date']; ?><br>
                    <br>
                    发行商:<?php echo $GameInfo['GameInfo']['publisher']; ?><br>
                    <br>
                    游戏平台:<?php echo $GameInfo['GameInfo']['platform']; ?><br>
                    <br>
                    评分:<?php echo $GameInfo['GameInfo']['score']; ?><br>

                </div>


                <div class="col-3">
                    游戏价格: <?php echo $GameInfo['GameInfo']['price']; ?><br>

                    <br>
                    游戏介绍:<?php echo $GameInfo['GameInfo']['introduction']; ?><br>
					<?php
					echo $this->Html->link('💖', array(
							'controller' => 'Collection',
							'action' => 'ajaxCollection',
							'?' => ['game_info_id' => $GameInfo['GameInfo']['id']],
						), [
							'data-ajax' => 'link'
						]

					);


					?>
                </div>


                <div class="col-1">
				<?php
						// echo $this->Html->link('赞', array(
						// 	'controller' => 'Likes',
						// 	'action' => 'ajaxLike',
						// 	'?' => ['game_info_id' => $GameInfo['GameInfo']['id']],
						// ), [
						// 	'data-ajaxLike' => 'link'
						// ]

					//);
					echo $this->Html->link(
						$this->Html->image("good.png",['width' => '60',
							'height' => '60']),
							// "<img src='/img/iine.png' >",
						array(		
						'controller'=>'Likes',
						'action'=>'ajaxLike',
						'?' => ['game_info_id' => $GameInfo['GameInfo']['id']],
					), [
						'data-ajaxLike' => 'link',
						'escape' => false
					]
					);
					
				
			
					?>
				
				
               
<br>
<br>
<?php
					
					echo $this->Html->link(
						$this->Html->image("bad.png",['width' => '60',
							'height' => '60']),
							// "<img src='/img/iine.png' >",
						array(		
						'controller'=>'Likes',
						'action'=>'ajaxdontlike',
						'?' => ['game_info_id' => $GameInfo['GameInfo']['id']],
					), [
						'data-ajaxLike' => 'link',
						'escape' => false
					]
					);
				
				?>
                
                </div>


            </div>

		<?php endforeach; ?>
</table>
<?php

$pageBegin = $pagenation['pageBegin'];
$pageEnd = $pagenation['pageEnd'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;

echo '<nav aria-label="...">';
echo '<ul class="pagination pagination-lg">';
echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">上一页</a ></li>';


for ($a = $pageBegin; $a <= $pageEnd; $a++) {

	echo '<li class="page-item"><a class="page-link" href="?page=' . $a . '">' . $a . '</a ></li>';
}


echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">下一页</a ></li>';
echo '</ul>';
echo '</nav>';


// $page="";
// $a="";
// $startPage=$page;

// echo '<nav aria-label="...">';
// echo  '<ul class="pagination pagination-lg">';
// echo     '<li class="page-item disabled">';

// echo     '</li>';
// echo     '<li class="page-item"><a class="page-link" href="?p='.($page-1).'">上一页</a></li>';
// for($a=$startPage;$a<=$endPage;$a++){

//     echo '<li class="page-item"><a class="page-link" href="?p='.$a.'">'.$a.'</a></li>';
// }
// echo    '<li class="page-item"><a class="page-link" href="?p='.($page+1).'">下一页</a></li>';
// echo   '</ul>';
// echo '</nav>';


// function getpage($page=1){
//     echo 1111;
//     return ;
// }


// //用框架方式的写法备份
// echo $this->Paginator->prev(
//     '上一页',
//     null,
//     null,
//     array('class' => 'disabled')
// );
// echo "&nbsp";
// echo $this->Paginator->numbers(
// ); 
// echo "&nbsp"; 
// echo $this->Paginator->next(
//     '下一页',
//     null,
//     null,
//     array('class' => 'disabled')
//   );

// 写法备份
//   echo $this->Paginator->counter(
//    // '{:page}'. //当前页
//    // '{:pages}'. //总页数
//   //  '{:count}' //总共多少条数据

// );


?>