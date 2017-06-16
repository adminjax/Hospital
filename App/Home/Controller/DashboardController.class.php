<?php
/**
 * 后台管理工具
 *
 * @Author: jax
 *
 * @category    App
 * @package     App_Home
 */
namespace Home\Controller;
use Think\Controller;

class DashboardController extends Controller 
{
	//模型容器
	private $model = array(
			'login' => 'login'
		);

	/**
	 * [index 入口]
	 * @return [type] [description]
	 */
    public function index(){
        $this->display();
    }
}
?>