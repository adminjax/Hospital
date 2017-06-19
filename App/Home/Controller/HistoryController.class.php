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

class HistoryController extends Controller 
{
	//数据容器
	private $data = array();
	//模型容器
	private $model = array(
			'history' => 'history',
			'orders' => 'orders'
		);


	/**
	 * [index 入口]
	 * @return [type] [description]
	 */
    public function index(){
    	$history = D($this->model['history']);
    	$data = $history->getHistoryList(session('user.name'));

    	if($data){
    		$this->assign('data', $data);
    	}
        $this->display();
    }

    public function delete(){
    	$id = I('get.id', '', 'int');

    	if($id > 0){
    		$history = D($this->model['history']);
    		$flag = $history->deleteData($id);

    		if($flag){
    			return $this->redirect('history/index');
    		}else{
    			return $this->redirect('history/index');
    		}
    	}
    }
}
?>