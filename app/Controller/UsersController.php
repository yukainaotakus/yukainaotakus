<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Flash');
    

 
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Flash->success('登陆成功');
                //debug($_SESSION);
              
                return $this->redirect(array('action' => 'index'));
                //return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('用户名或者密码有误，请重新输入'));
        }
    }   

    public function logout() {
    return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('无效数据'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('注册ok'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('失败，请重试')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('无效数据'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('用户已存在'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('失败，请重试')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {


        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('账号删除'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('账号删除失败'));
        return $this->redirect(array('action' => 'index'));
    }

}

?>