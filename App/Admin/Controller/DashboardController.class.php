<?php
/**
 * 通过后台管理
 *
 * @Author: jax
 *
 * @category    App
 * @package     App_Admin
 */
namespace Admin\Controller;

class DashboardController extends CommonController
{
    //模型容器
    private $model = array(
            'dashboard' => 'dashboard'
        );
    	
    /**
     * [index 后台入口]
     * @return [type] [description]
     */
    public function index(){
    	$menu = $this->getMenu();
    	$this->assign('menu', $menu);

        $data = $this->getToSchedule();
        if($data){
            $this->assign('schedule', $data);
        }

        $data = $this->getNewSchedule();
        if($data){
            $this->assign('newSchedule', $data);
        }

        $this->display();
    }

    /**
     * [getToSchedule 获取预约到今天的病人]
     * @return [type] [description]
     */
    protected function getToSchedule(){
        $dashboard = D($this->model['dashboard']);
        $data = $dashboard->getToSchedule();

        return $data;
    }

    /**
     * [getNewSchedule 获取今天新预约的信息]
     * @return [type] [description]
     */
    protected function getNewSchedule(){
        $dashboard = D($this->model['dashboard']);
        $data = $dashboard->getNewSchedule();

        return $data;
    }
}