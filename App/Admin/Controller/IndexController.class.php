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
use Think\Controller;
use Common\Controller\VerifyController;

class IndexController extends Controller {
	
    /**
     * [index 后台入口]
     * @return [type] [description]
     */
    public function index(){
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