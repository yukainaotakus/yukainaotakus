
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>monster |-|
		
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php 

		
		echo $this->Html->meta('icon');
		//cake.generic
		echo $this->Html->script('jquery-3.3.1.js');
		echo $this->Html->script('bootstrap.js');
		echo $this->Html->css('bootstrap');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">导航器</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <li class="nav-item">
     

        		<?php echo $this->Html->link(
					'新增monster',
					[
						'Controller'=>'Monsters',
						'action' => 'add'  //修改新增monster的地址
					],
					[
						'class'=>'nav-link',
						
					]
					);
			?>
      </li>

	  <li class="nav-item">
     

      <?php echo $this->Html->link(
					'返回主页',
					[
						'controller'=>'Monsters',
						'action' => 'index'
					],
					[
						'class'=>'nav-link',
						
					]
					);
			?>
      </li>
			
			<li class="nav-item">
			<?php 
			if(!empty($_SESSION['Auth']['User']['username'])){
				echo $this->Html->link("退出登录", ['controller' => 'Users',
                        'action' =>'logout'],[
													'class'=>'nav-link',
													
												] );


			}else{
			echo $this->Html->link("点我登录", [ 'controller' => 'Users',
												'action' =>'login'],[
													'class'=>'nav-link',
													
												]);}
												
												?>


			 </li>






			<li class="nav-item">
			<?php if(!empty($_SESSION['Auth']['User']['username'])){echo "您好".$_SESSION['Auth']['User']['username']."!";
			}else{
			echo $this->Html->link(
				'点我注册', 
				[
				'controller' => 'Users',
							'action' =>'add'
					],
					[
						'class'=>'nav-link',
						
					]
					);} ?>

			</li>

    </ul>
  </div>
</nav>


			<?php echo $this->element('common/header');?>

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		


	
</body>
</html>
