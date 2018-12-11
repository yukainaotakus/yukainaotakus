
<?php
				echo $this->Form->create('uploadfile', array('url'=>'doUploadFile','type' => 'file',$game_info_id));  //input field of type file allows browse your file.
				echo $this->Form->input('pdf_path', array('type' => 'file','label' => '上传图片',));
				echo $this->Form->input('game_info_id',array(
					'type'=>'hidden',
					'value'=>$game_info_id));

			echo $this->Form->radio('dijizhang', array(
			'1' => '1',
			'2' => '2',
			'3' => '3'
		));
						
						 
					
				echo $this->Form->end('上传');
				$image_src = $this->webroot.'img/';
				debug($game_info_id);
				
				
?>	
		