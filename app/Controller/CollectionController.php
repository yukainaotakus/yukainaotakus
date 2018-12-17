<?php
App::import('Vendor', 'Objects/BasicResult');

class CollectionController extends AppController {
    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Auth','Session','Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
	}

	public function showCollection($userId){
		$this->loadModel("Collection");
		$a=$this->Collection->find('list',array(
			'fields'=>array('id','game_id'),
			'conditions'=>array('user_id'=>$userId)));

		$this->set('show', $a);
	}

	// 执行like
	public function like(){
    	$this->autoRender = false;

		$ip = "111.222";
		$user_id = null;
		$game_id = 222;
		$like = $this->request->query("like");

		if ($user_id){
			echo "用户登录了";

			// 用户已登录
			// 数据库写入用户的id
			$data = [
				'user_id'=>$user_id,
				'game_id'=>$game_id
			];

			if ("用户点没点过赞") {
				// 没点过，写入数据
				// 判断是点赞还是踩
				if ($like >0) {
					// 点赞
					$this->doAddLike($data);
				} else {
					// 踩
					$this->doDislike($data);
				}
			} else {
				// 点过了 报错

			}

		} else {
			echo "用户没登录";
			// 用户没登录
			if($this->isIpOk($ip)){
				// 没重复
				$data = [
					'user_ip'=>$ip,
					'game_id'=>$game_id
				];
				echo "ip可以用<br>";
				// 判断是点赞还是踩
				if ($like >0) {
					// 点赞
					$this->doAddLike($data);
				} else {
					// 踩
					$this->doDislike($data);
				}

			} else {
				// 重复 报错
				echo "ip重复，什么都不做，报错，无法插入数据<br>";

			}


		}



	}

	/**
	 * 判断ip是否重复
	 */
	public function isIpOk($data){
		$this->autoRender = false;
		$ip = "111.111";
		if ($ip == $data) {
			return false;
		} else {
			return true;
		}
	}

	public function doAddLike($data){
		$this->autoRender = false;

		$data['like'] = 1;
//		$this->Like->save($data);

		debug("我要点赞，如下");
		debug($data);
		// 执行数据增加
		echo "执行数据增加<br>";
		return;
	}

	public function doDislike($data){
		$this->autoRender = false;
		$data['like'] = -1;

		debug("我要踩，如下");
		debug($data);

		// 执行不喜欢
		echo "执行不喜欢<br>";
		return;
	}




	public function getData(){
		$data = $this->Collection->find('all',[
			'conditions'=>[
				'user_id'=>1
			]
		]);

		return $data;
	}

	public function xiao2(){
    	$this->loadModel("Like");

	}


	/**
	 * 显示“我的收藏”
	 */
    public function list(){
		$list = $this->Collection->find('all');
		$this->set("list", $list);
    }

	/**
	 * 增加收藏
	 */
	public function ajaxCollection(){
		// 禁止画面渲染
		$this->autoRender = false;
//		$this->response = "json";
		// ------------ 1 接收参数 ------------

		// 用户的id
		$userId = $this->Auth->user("id");

		// game的id
		$gameId = $this->request->query("game_info_id");


//		debug($userId);
//		debug($gameId);

		// ------------ 2 业务逻辑 ------------
		// 存储数据
		$data = [
			'user_id'=>$userId,
			'game_id'=>$gameId
		];

		try {
			$this->Collection->save($data);
		} catch(Exception $e){
			//取消收藏
			$cancel=$this->Collection->find(
				'first', array(
					'conditions'=>array('user_id'=>$userId,'game_id'=>$gameId)
					 	)
					);
			//拿到这个新数据的id
			$id=$cancel['Collection']['id'];
			$this->Collection->delete($id);
			$result =  new BasicResult(false, "您已取消收藏");

			return json_encode($result);
		}

		// ------------ 3 返回数据 ------------


		$result =  new BasicResult(true, "处理成功");
		return json_encode($result);

	}

}


?>
