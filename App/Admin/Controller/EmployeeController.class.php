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
use Admin\Model;

/**
 * 登录，登出，后台帐号管理类
 */
class EmployeeController extends CommonController {
	/**
	 * 初始化操作
	 */
	public function _initialize()
    {	
    	/**
    	 * [$menu 获取目录]
    	 * @var [type]
    	 */
        $menu = $this->getMenu();
        $this->assign('menu', $menu);
    }

    /**
     * [listInfo 获取雇员列表信息]
     * @return [type] [description]
     */
	public function listInfo(){
		$employee = D('Employee');
		$info = $employee->getEmployeeList();
		var_dump($info);
		$this->display();
	}

	/**
	 * [addEmployee 添加雇员信息]
	 */
	public function addEmployee(){
		$this->display();
	}
}
?>