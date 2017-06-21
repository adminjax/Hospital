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

/**
 * 登录，登出，后台帐号管理类
 */
class LoginController extends CommonController
{
	//数据容器
	private $data = array();
	//模型容器
	private $model = array(
			'login' => 'login'
		);

	/**
	 * [logInto 登录]
	 * @return [type] [description]
	 */
	public function logInto(){		
		$this->data['name'] = I('post.username', '', 'addslashes');
		$this->data['password'] = I('post.password', '', 'addslashes');
		$this->data['code'] = I('post.verify', '', 'addslashes');

		//验证码检查
		if(!A('Common/Verify')->checkVerify($this->data['code'])){
			session('error', '验证码错误!');
			$this->redirect("Index/index");
		}else{
			session('error', null);
		}

		if(!$this->data['name'] || !$this->data['password']){
			session('error', '请输入用户名或密码!');
			$this->redirect("Index/index");
		}

		$user = D($this->model['login']);
		$flag = $user->login($this->data);

		if($flag){
			$this->redirect("Dashboard/index");
		}else{
			$this->redirect('Index/index');
		}
	}

	/**
	 * [logout 退出]
	 * @return [type] [description]
	 */
	public function logout(){
		session('user.user_id', null);
		session('user.username', null);
		session('user.acl', null);

		$this->redirect("Index/index");
	}
}


?>