<?php
/**
 * 接口定义
 */
namespace Api\Controller;
use Think\Controller\RestController;

class TestController extends RestController
{
	public function index(){
		$this->display();
	}
}


?>