<!-- File: /app/View/Monsters/index.ctp -->

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


</script>

<h1>游戏列表</h1>


<table>
    <div class="container">


		<?php 
		App::import('Vendor','util');
		App::import('Vendor','platform');

		 foreach ($gameinfo as $GameInfo): ?>


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
                   
					游戏平台:<?php 
					$decNum = $GameInfo['GameInfo']['platform']; 
					$platArray=(bin2dec($decNum)) ;
					$myPlatform=showPlatform($platArray);
					foreach ($myPlatform as $key => $value) {
  					  		echo $key." ";
								}  
							 ?><br> 
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
                    ▲顶 <?php echo $this->Html->image('iine.png', array(
						'width' => '40',
						'height' => '40'
					)); ?> <br>

                    <br>
                    ▼踩<?php echo $this->Html->image('dae.jpg', array(
						'width' => '50',
						'height' => '50'
					)); ?><br>
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


?>