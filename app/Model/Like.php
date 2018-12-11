<?php 
class Like extends AppModel {

     public $useTable = 'like';

     public $primaryKey = 'id';

     public function isOwnedBy($id, $user) {
        return $this->field('id', array('id' => $id, 'user_id' => $user)) !== false;
    }


}    


?>


