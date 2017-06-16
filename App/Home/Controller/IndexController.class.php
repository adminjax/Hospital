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

class IndexController extends Controller 
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

    /**
     * [login description]
     * @return [type] [description]
     */
    public function login(){
    	$name = I('post.username', '', 'addslashes');
    	$password = md5(I('post.password'));

    	if($name && $password){
    		$login = D($this->model['login']);
    		$data = $login->loginto($name, $password);
    		if($data > 0){
    			session('user.m_id', $data['m_id']);
    			session('user.name', $data['username']);

    			$this->redirect('Dashboard/index');
    		}
    	}else{
    		$this->redirect('Index/index');
    	}
    }

    /**
     * [logout 退出]
     * @return [type] [description]
     */
    public function logout(){
        session('user.m_id', null);
        session('user.name', null);

        $this->redirect('Index/index');
    }
}