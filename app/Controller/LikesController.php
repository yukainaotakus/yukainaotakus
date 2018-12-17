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

    //所有素材整合
    public function allMaterial(){
        //关闭自动渲染功能
        $this->autoRender = false;
        //抓取ip地址
        $ip=$this->request->clientIp();
       
        //抓取id地址
        $user_id=$this->Auth->user("id");
        //抓取gameid地址
        $game_id=$this->request->query("game_info_id"); 
        //抓取所有素材的函数
        $all=$this->request->query("like");

        //判定用户IP是否登陆 
        if($user_id){
           // echo "denglu";
           // $result =  new BasicResult(false, "用户已登录");
            //把数据写入数据库
            $data = [
                'user_id'=>$user_id,
                'game_id'=>$game_id
             ];
            
        if($user_id==null){
            $data = [
                'user_id'=>$user_id,
                'game_id'=>$game_id
             ];
             if ($all >0) {
                // 点赞
                $this->ajaxLike();
             } else {
                // 踩
                $this->ajaxDontLike();
                 }
             }else{
                 //
                 $result =  new BasicResult(false, "ERRO");
             }


        }else{

            //echo "meidenglu";
            $result =  new BasicResult(false, "用户没登录");
            if($this->Ipcheck($ip)){
                //没重复的时候
                $data=['user_ip'=>$ip,
                'game_id'=>$game_id
            ];

          // echo "ip可以用";

            if($all>0){
                //点赞
                $this->ajaxLike();
            }else{
                //踩
                $this->ajaxDontLike();
            }
            }else{
                //重複したら
                $result =  new BasicResult(false, "ERRO");
            }
        }
        $result =  new BasicResult(true, "循环成功");
        return json_encode($result);
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
    //debug($data);
    $user_iine=1;
    //game的id


    //储存数据
    $data=[

        'user_iine'=>$user_iine
    ];
    
 //debug($data);
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
    // $users_id = $this->Auth->user("id");
    //game的id
   //  $game_id=$this->request->query("game_info_id");
    
     // $user_iine=$this->request->data['user_iine'];
     $user_noiine=-1;
     
    // debug($users_id);
    //debug($game_id);  
        // debug($user_iine);



    //储存数据
    $data=[

    
        'user_noiine'=>$user_noiine
    ];

// debug($data);
    try {
        $this->Like->save($data);
    } catch(Exception $e){
        $result =  new BasicResult(false, "您已经点过了，不能重复点踩");
      
        // debug($this->Like->validationErrors);
        // debug($e->getMessage());
      
        return json_encode($result);
    }

    // ------------ 3 返回数据 ------------


    $result =  new BasicResult(true, "处理成功");
    return json_encode($result);
  
}


  


    public function IPcheck($data){

        
        $this->autoRender = false;
        $Ip = $this->request->clientIp();
    
        if ($Ip == $data) {
            return false;
         } else {
            return true;
         }
                  
            
      }
             
    


}