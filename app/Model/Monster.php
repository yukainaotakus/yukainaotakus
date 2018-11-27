<?php 
class Monster extends AppModel {

     public $useTable = 'monsters';

     public $primaryKey = 'mno';

     public $validate = array(
          'type' => array(
              'rule' => 'notBlank'
          ),
          'atk' => array(
              'rule' => 'notBlank'
          ),
          'm_name' => array(
               'rule' => 'notBlank'
           ),
           'm_level' => array(
               'rule' => 'notBlank'
           ),
           'adress' => array(
               'rule' => 'notBlank'
           )
         




      );



}    


?>


