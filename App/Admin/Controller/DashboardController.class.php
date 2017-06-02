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

class DashboardController extends CommonController {
	
    /**
     * [index 后台入口]
     * @return [type] [description]
     */
    public function index(){
    	$menu = $this->getMenu();
    	$this->assign('menu', $menu);
        $this->display();
    }
}