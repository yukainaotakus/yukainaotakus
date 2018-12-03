<?php
class GameInfoController extends AppController {
    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Auth','Session','Paginator' => array(
        'limit' => 1,
        'maxLimit' => 1,
        'order' => array('id' => 'asc')
      ));
    
    
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow();
    
 
    }
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
        

     
        $this->loadModel("GameInfo");
        $this->set('gameinfo',$this->Paginator->paginate('GameInfo'));
        //$this->set('gameinfo', $this->GameInfo->find('all'));
 


    }


   public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid gameinfo'));
        }

        $gameinfo = $this->GameInfo->findByid($id);
        if (!$gameinfo) {
            throw new NotFoundException(__('Invalid gameinfo'));
        }
        $this->set('gameinfo', $gameinfo);
    }

    public function add() {
        if ($this->request->is('POST')) {
            $this->GameInfo->create();
          //debug($this->request->data);
          
            if ($this->GameInfo->save($this->request->data)) {
                $this->Flash->success(__('成功.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('错误了.'));
            //debug($this->GameInfo->validationErrors);
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('I木有ID可不行哟'));
        }
    
        $GameInfo = $this->GameInfo->findById($id);
        if (!$GameInfo) {
            throw new NotFoundException(__('并不致命的错误'));
        }
    
        if ($this->request->is(array('Post', 'put'))) {
            $this->GameInfo->id = $id;
            if ($this->GameInfo->save($this->request->data)) {
                $this->Flash->success(__('ok改好了'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('失败了'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $GameInfo;
        }
    }



    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->GameInfo->delete($id)) {
            $this->Flash->success(
                __('你删除了一个编号为: %s 号的数据', h($id))
            );
        } else {
            $this->Flash->error(
                __('你想删除编号为: %s 号的数据却失败了.', h($id))
            );
        }
    
        return $this->redirect(array('action' => 'index'));
    }
}
   

?>
