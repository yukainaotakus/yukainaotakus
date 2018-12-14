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

	$(function(){
		// $(".wu").each(function(i){
		// 	i=i+1;
		// 	$(this).attr("src" , "img/gameInfo/game_img_"+i+"_1.jpg");
	 	// });

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






    <div class="container">
	<h1>2019游戏最佳排行 <span style="color:red;"> *HOT</span></h1>

		<?php 
		App::import('Vendor','util');
		App::import('Vendor','platform');

		 foreach ($gameinfo as $GameInfo): ?>


            <div class="row">
                <div class="col-3">


					<?php
                    echo $this->Html->image("gameInfo/game_img_{$GameInfo['GameInfo']['id']}_1.jpg",[
                            'style'=>'max-height:240px;max-width:240px;'
                    ]);

					echo $this->Html->link('上传图片', array(
							'controller' => 'GameInfo',
							'action' => 'uploadfile',
							'?' => ['game_info_id' => $GameInfo['GameInfo']['id']]

						));

					?>


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
<hr>
		<?php endforeach; ?>
<?php

$pageBegin = $pagenation['pageBegin'];
$pageEnd = $pagenation['pageEnd'];
$page = isset($_GET['page']) ? $_GET['page'] : 1;

echo '<nav aria-label="...">';
echo   '<ul class="pagination">';
echo     '<li class="page-item disabled">';
       
echo     "</li>";
		$disabled=$page==1?'disabled':'';
echo     "<li class=\"page-item {$disabled}\">";
echo '<a class=\'page-link\' href="?page=' . ($page - 1) . '">上一页</a></li>';


for ($a = $pageBegin; $a <= $pageEnd; $a++) {
	$activeClass = $a == $page ? 'active' : '';
	echo "<li class=\"page-item {$activeClass}\">
	<a class='page-link' href=\"?page={$a}\">{$a}</a ></li>";


// debug($page);
//  debug($a);	
}

echo '<span class="sr-only">(current)</span>';
$disabledlast=$page==$pageEnd?'disabled':'';
echo     "<li class=\"page-item {$disabledlast}\">";
			
echo       '<a class=\'page-link\' href="?page=' . ($page + 1) . '">下一页</a>';
echo     "</li>";
echo   "</ul>";
echo 		"</nav>";


?>