<?php
/**
 * Created by PhpStorm.
 * User: Dooun
 * Date: 2018/12/05
 * Time: 14:34
 */

class BasicResult {
	var $result = true;
	var $msg = "";


	public function __construct($result, $msg) {
		$this->result = $result;
		$this->msg = $msg;
	}
}