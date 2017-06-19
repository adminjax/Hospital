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
			'docter' => 'dashboard'
		);

	/**
	 * [index 入口]
	 * @return [type] [description]
	 */
    public function index(){
    	$docter = D($this->model['docter']);
    	$data = $docter->getAllDocter();

    	if($data){
    		$this->assign('data', $data);
    	}
        $this->display();
    }
}
?>