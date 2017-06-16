<?php
/**
 * 接口定义
 */
namespace Api\Controller;
use Think\Controller\RestController;

class ApiController extends RestController
{
	protected $allowMthod = array('get', 'post', 'put', 'delete', 'update');
	protected $allowType = array('xml', 'json');

	public function index(){
		$data = file_get_contents("php://input");
		var_dump($_GET);
		var_dump($data);
	}

	public function get(){

	}
}


?>