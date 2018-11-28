<?php

class MonstersController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Auth');

    // 要求载入其他模型
//    public $uses = array('Post');

    public function index() {
        $this->set('monsters', $this->Monster->find('all'));

        $this->loadModel("Post");

		$this->set('postList', $this->Post->find('all'));


    }

    public function view($mno = null) {
        if (!$mno) {
            throw new NotFoundException(__('Invalid Monster'));
        }

        $Monster = $this->Monster->findByMno($mno);
        if (!$Monster) {
            throw new NotFoundException(__('Invalid Monster'));
        }
        $this->set('monsterList', $Monster);
    }


    public function add() {
        if ($this->request->is('Post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
           
            $this->Monster->create();
            if ($this->Monster->save($this->request->data)) {
                $this->Flash->success(__('你增加了一个新怪物'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('增加error'));
        }
    }


    public function edit($mno = null) {
        if (!$mno) {
            throw new NotFoundException(__('Invalmno post'));
        }
    
        $Monster = $this->Monster->findByMno($mno);
        if (!$Monster) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Monster->mno = $mno;
            if ($this->Monster->save($this->request->data)) {
               $this->Flash->success(__('编辑成功.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('编辑失败了.'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $Monster;
        }
     }


     public function delete($mno) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Monster->delete($mno)) {
            $this->Flash->success(
                __('你删除了一个编号为: %s 号的怪物', h($mno))
            );
        } else {
            $this->Flash->error(
                __('你想删除编号为: %s 号的怪物却失败了.', h($mno))
            );
        }
    
        return $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        // 所有注册的用户都能够添加文章
        if ($this->action === 'add') {
            return true;
        }
    
        // 文章的所有者能够编辑和删除它
        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
    
        return parent::isAuthorized($user);
    }






}
   

?>