<?php
App::import('Vendor', 'Objects/BasicResult');

class LikesController extends AppController {
    public $helpers = array('Html','From','Flash');
    public $components = array('Auth','Session','Paginator');
   
   //user登陆解除
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();


    }


//显示数据
   public function addLikesController(){
//
    debug($this->Like->find('all'));

   }

 
   public function ajaxLike(){
    //开起或关闭自动渲染功能
    $this->autoRender = false;
    //用户的id
     $users_id = $this->Auth->user("id");
    //game的id
     $game_id=$this->request->query("game_info_id");
    
     // $user_iine=$this->request->data['user_iine'];
     $user_iine=1;
     
    // debug($users_id);
   // debug($game_id);  
        // debug($user_iine);



    //储存数据
    $data=[

        'user_id'=>$users_id,
        'game_id'=>$game_id,
        'user_iine'=>$user_iine
    ];

// debug($data);
    try {
        $this->Like->save($data);
    } catch(Exception $e){
        $result =  new BasicResult(false, "您已经点赞成功不能重复点赞");
      
        // debug($this->Like->validationErrors);
        // debug($e->getMessage());
      
        return json_encode($result);
    }

    // ------------ 3 返回数据 ------------


    $result =  new BasicResult(true, "处理成功");
    return json_encode($result);
  
}
  

public function ajaxDontLike(){
    //开起或关闭自动渲染功能
    $this->autoRender = false;
    //用户的id
     $users_id = $this->Auth->user("id");
    //game的id
     $game_id=$this->request->query("game_info_id");
    
     // $user_iine=$this->request->data['user_iine'];
     $user_noiine=1;
     
    // debug($users_id);
    //debug($game_id);  
        // debug($user_iine);



    //储存数据
    $data=[

        'user_id'=>$users_id,
        'game_id'=>$game_id,
        'user_noiine'=>$user_noiine
    ];

// debug($data);
    try {
        $this->Like->save($data);
    } catch(Exception $e){
        $result =  new BasicResult(false, "您已经点踩成功不能重复点踩");
      
        // debug($this->Like->validationErrors);
        // debug($e->getMessage());
      
        return json_encode($result);
    }

    // ------------ 3 返回数据 ------------


    $result =  new BasicResult(true, "处理成功");
    return json_encode($result);
  
}
  
}