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

class MedicalController extends CommonController
{
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
     * [listData description]
     * @return [type] [description]
     */
    public function listData(){
    	$this->display();
    }

    /**
     * [add description]
     */
    public function add(){
    	$this->display();
    }
}