<?php

class GameInfoController extends AppController {

    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Auth','Session');

    public function isAuthorized($user) {
        // 所有注册的用户都能够添加文章
        if ($this->action === 'add') {
            return true;
        }
    
        // 文章的所有者能够编辑和删除它
        if (in_array($this->action, array('edit', 'delete'))) {
            $id = (int) $this->request->params['pass'][0];
            // if ($this->GameInfo->isOwnedBy($id, $user['id'])) {
            //     return true;
            // }
        }
    
        return parent::isAuthorized($user);
    }

   
    public function index() {
        $this->set('gameinfo', $this->GameInfo->find('all'));



		


    }


}
   

?>