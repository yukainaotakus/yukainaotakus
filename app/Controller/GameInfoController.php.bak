<?php


class GameInfoController extends AppController {

    public $helpers = array('Html', 'Form','Flash');
    public $components = array('Auth','Session','Paginator');

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


	/**
	 * 执行 点赞
	 */
    public function doLike(){

    	$this->autoRender = false;

    	// 接收参数 game id
		$gameId = $this->request->query("gameInfo");

		// 从session中获取用户的信息
		$userInfo = $this->Auth->user();
		$userId = $userInfo['id'];

//		debug($gameId);
//		debug($userId);

		echo true;

		// 执行数据操作
	}

    public function index(){

        if ($this->request->is('GET')){
        $page=isset($_GET['page'])?$_GET['page']:1;
        $this->loadModel("GameInfo");
        $itemCount=$this->GameInfo->find('count'); //数据总数
        // function getPage($page=1){
        // echo "这里是getpage函数,我要在这里返回显示的最大页数";


        //     }
        function getPage($page,$itemCount){
                //if判断如果当前是首页了的话
                $itemPerPage=8;
                //计算总页数=总数/每页显示数
                //需要一个数据库长度的count
                $total= ceil($itemCount/$itemPerPage); // ceil() 函数向上舍入为最接近的整数。
                if($page>$total){
                	$page=$total-1;
                }

                $maxPageCount=10; //开始一共有10行
                $buffCount=5; //能看到5行
                $pageBegin=1; //开始页面1行
                $pageEnd="";
                if ($page< $buffCount){ //如果页数要比页小
                $pageBegin=1;
                }else if($page>=$buffCount and $page<=$total ){ //当页数大于5页 而且 页数小于等于 总页数-10
                $pageBegin=$page-$buffCount+1; //就让开始页面=第几页-5+1
                }else{
                $pageBegin=$total-$maxPageCount+1; //否则开始页面就等于=总页面-10+1
                }
                $pageEnd=$pageBegin+$maxPageCount-1;
                $pageEnd=$pageEnd>$total?$total:$pageEnd;

                $Pagenation=[
					'page'=>$page,
					'pageBegin'=>$pageBegin,
					'pageEnd'=>$pageEnd,
					'itemCount'=>$itemCount,
					'itemPerPage'=>$itemPerPage //每页数据的个数
                ];

                return $Pagenation;
                }

        }

		$this->set('pagenation', $pagenation = getPage($page,$itemCount));
		$this->set('gameinfo', $this->GameInfo->find('all', array('limit' => $pagenation['itemPerPage'],  'page' =>$page)));

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
        if ($this->request->is('post')) { 
            //create模型
            $this->GameInfo->create();
            //遍历平台的数组
            foreach($_POST['data']['GameInfo']['platform'] as $i){
            $platDecArray[]= $i;
            }
            //得到十进制的数字
            $decNum=array_sum($platDecArray);
            
            //debug($this->request->data);
            //$result = $this->request->data;
            //把post的数据set给模型 平台的数值用刚才求出来的数
            $result=$this->GameInfo->set(array(
               'game_name' =>$_POST['data']['GameInfo']['game_name'],
               'type' => $_POST['data']['GameInfo']['type'],
               'release_date' => $_POST['data']['GameInfo']['release_date'],
               'publisher' => $_POST['data']['GameInfo']['publisher'],
               'score' => $_POST['data']['GameInfo']['score'],
               'introduction' => $_POST['data']['GameInfo']['introduction'],
               'platform' => $decNum,
               'price' => $_POST['data']['GameInfo']['price'],
                ));

            if ($this->GameInfo->save($result)) { 
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
        $this->set('a', $GameInfo);
        if (!$GameInfo) {
            throw new NotFoundException(__('并不致命的错误'));
        }

        if ($this->request->is(array('Post', 'put'))) {
            
            $this->GameInfo->id = $id;
            foreach($_POST['data']['GameInfo']['platform'] as $i){
                $platDecArray[]= $i;
                }
                //得到十进制的数字
                $decNum=array_sum($platDecArray);
                
                //debug($this->request->data);
                //$result = $this->request->data;
                //把post的数据set给模型 平台的数值用刚才求出来的数
                $result=$this->GameInfo->set(array(
                   'game_name' =>$_POST['data']['GameInfo']['game_name'],
                   'type' => $_POST['data']['GameInfo']['type'],
                   'release_date' => $_POST['data']['GameInfo']['release_date'],
                   'publisher' => $_POST['data']['GameInfo']['publisher'],
                   'score' => $_POST['data']['GameInfo']['score'],
                   'introduction' => $_POST['data']['GameInfo']['introduction'],
                   'platform' => $decNum,
                   'price' => $_POST['data']['GameInfo']['price'],
                    ));
           //$this->request->data
            //$this->GameInfo->platform
            if ($this->GameInfo->save($result)) {
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
