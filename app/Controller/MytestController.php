<?php
/**
 * Created by PhpStorm.
 * User: Dooun
 * Date: 2018/12/12
 * Time: 11:42
 */


class MytestController extends AppController {
	public $helpers = array('Html', 'Form','Flash');
	public $components = array('Auth','Session','Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow();


	}


	public function index(){

	}

}