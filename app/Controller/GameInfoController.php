<?php
class GameInfoController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Auth');

   
    public function index() {
        $this->set('gameinfo', $this->GameInfo->find('all'));



		


    }


}
   

?>