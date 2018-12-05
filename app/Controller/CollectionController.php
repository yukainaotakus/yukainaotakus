<?php
App::import('Vendor', 'Objects/BasicResult');

class CollectionController extends AppController {
    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Auth','Session','Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();


    }

	/**
	 * 显示“我的收藏”
	 */
    public function addCollection(){
        //
		debug($this->Collection->find('all'));
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
			$result =  new BasicResult(false, "您已经收藏过了");
			return json_encode($result);
		}

		// ------------ 3 返回数据 ------------


		$result =  new BasicResult(true, "处理成功");
		return json_encode($result);

	}

}


?>
