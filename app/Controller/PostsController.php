<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index() {
        $this->set('posts', $this->Post->find('all'));
        $this->set('title_for_layout','网站');
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('木有ID可不行哟'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('并不致命的错误'));
        }
        $this->set('post', $post);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('ok增加了'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('失败了'));
        }
    }


    public function ajaxAdd(){
        $this->layout="ajax";
        //$this->autoRender=false; //关闭自动渲染
        
        //$this->render("asdf")  指定要渲染的view
        $data=$this->request->data;
        $this->Post->save($data);
        
        $this->set('posts', $this->Post->find('all'));
       
        // $data=[
        //     'title' => 'taitou'.rand(1,999),
        //     'body' => 'baodi'.rand(1,999)
        // ];
       
        $this->render();


    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('I木有ID可不行哟'));
        }
    
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('并不致命的错误'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('ok改好了'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('失败了'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Post->delete($id)) {
            $this->Flash->success(
                __('ok删完了', h($id))
            );
        } else {
            $this->Flash->error(
                __('失败了', h($id))
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