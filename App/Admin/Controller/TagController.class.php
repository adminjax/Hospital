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

class TagController extends CommonController
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
     * [index 后台入口]
     * @return [type] [description]
     */
    public function listData(){
        $this->display();
    }

    /**
     * [getVerify 获取验证码]
     * @return [type] [description]
     */
    public function getVerify(){
    	$verify = A("Common/Verify");
    	$verify->getVerify();
    }
}