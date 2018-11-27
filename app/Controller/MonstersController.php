

<?php


class MonstersController extends AppController {



    public $helpers = array('Html', 'Form');
    public function index() {
        $this->set('monsters', $this->Monster->find('all'));
       // $this->set('monsters', $this->Monster->find('all'));
        
        //$this->Article->find('all');
    
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





}
   

?>