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

class ScheduleController extends Controller 
{
	//数据容器
	private $data = array();
	//模型容器
	private $model = array(
		'schedule' => 'schedule'
		);

	/**
	 * [index 入口]
	 * @return [type] [description]
	 */
    public function index(){
        $schedule = D($this->model['schedule']);
        $data = $schedule->getAllDocter();
        
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * [getDocterList 获取医生列表]
     * @return [type] [description]
     */
    public function getDocterList(){
        $this->data['id'] = I('get.docter', '', 'int');
        
        if($this->data['id']){
            $schedule = D($this->model['schedule']);
            $data = $schedule->getDocterList($this->data);

            return $this->ajaxreturn($data);
        }
    }

    /**
     * [add 新增预约]
     */
    public function add(){
    	$this->data['time'] = strtotime(I('get.time', '', 'addslashes'));
    	$this->data['docter'] = I('get.docter', '', 'addslashes');
    	$this->data['name'] = session('user.name');
        $this->data['created'] = time();

    	if($this->data['time'] && $this->data['docter']){
    		$schedule = D($this->model['schedule']);
    		$flag = $schedule->addData($this->data);
    		
    		if($flag > 0){
                $schedule = D($this->model['schedule']);
                $data = $schedule->getDocterList($data['id'] = $this->data['docter']);

    			$this->ajaxreturn($data);
    		}else{
    			$this->ajaxreturn(false);
    		}
    	}
    }

    /**
     * [update 修改预约]
     * @return [type] [description]
     */
    public function update(){
    	$this->data['time'] = strtotime(I('get.time', '', 'addslashes'));
    	$this->data['docter'] = I('get.docter', '', 'addslashes');
    	$this->data['name'] = session('user.name');
    	$this->data['created'] = time();

    	if($this->data['time'] || $this->data['docter']){
    		$schedule = D($this->model['schedule']);
    		$flag = $schedule->updateData($this->data);

    		if($flag > 0){
    			$this->ajaxreturn(true);
    		}else{
    			$this->ajaxreturn(false);
    		}
    	}
    }
}
?>