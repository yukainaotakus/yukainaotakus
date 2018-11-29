<?php 
class GameInfo extends AppModel {

     public $useTable = 'game_info';

     public $primaryKey = 'id';

    




      
     public function isOwnedBy($id, $user) {
          return $this->field('id', array('id' => $id, 'user_id' => $user)) !== false;
      }


}    


?>


