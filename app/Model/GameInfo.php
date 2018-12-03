<?php 
class GameInfo extends AppModel {

     public $useTable = 'game_info';

     public $primaryKey = 'id';

     public $validate = array(
          'id' => array(
              'rule' => 'notBlank'
          ),
          'game_name' => array(
              'rule' => 'notBlank'
          ),
          'type' => array(
               'rule' => 'notBlank'
           ),
           'release_date' => array(
               'rule' => 'notBlank'
           ),
           'publisher' => array(
               'rule' => 'notBlank'
           ),
           'score' => array(
               'rule' => 'notBlank'
           ),
           'introduction' => array(
               'rule' => 'notBlank'
           ),
           'platform' => array(
               'rule' => 'notBlank'
           ),
           'price' => array(
               'rule' => 'notBlank'
           )
          );




      
  
     public function isOwnedBy($id, $user) {
          return $this->field('id', array('id' => $id, 'user_id' => $user)) !== false;
      }



};


?>


