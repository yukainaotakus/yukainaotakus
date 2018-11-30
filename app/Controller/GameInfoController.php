<?php
class GameInfoController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }


    public $helpers = array('Html', 'Form');
    public $components = array('Auth');

   
    public function index() {
        $this->set('gameinfo', $this->GameInfo->find('all'));

     
        $this->loadModel("GameInfo");

 


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