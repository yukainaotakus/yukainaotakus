
<!DOCTYPE html>
<html>
<head>
	<?php 
	echo $this->Html->script('jquery.min'); //jquery　必须最先引进
	
	echo $this->Html->charset(); ?>
	<title>
		<?php echo "51010 is me"  ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<?php echo $this->element('common/header'); ?>

	

<?php echo $this->Flash->render(); ?>

<?php echo $this->fetch('content'); ?>

</body>
</html>
