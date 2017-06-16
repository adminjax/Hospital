<?php
/**
 * 后台管理工具
 *
 * @Author: jax
 *
 * @category    App
 * @package     App_Home
 */
namespace Home\Model;
use Think\Model;

/**
 * 标签模型
 */
class LoginModel extends Model
{
	//关闭字段信息的自动检测
	protected $autoCheckFields = false; 

	//表容器
	private $table = array(
			'user' => 'medical'
		);

	/**
	 * [loginto 登录]
	 * @param  [type] $name [description]
	 * @param  [type] $pwd  [description]
	 * @return [type]       [description]
	 */
	public function loginto($name, $pwd){
		$user = M($this->table['user']);
		$data = $user->where('username = "'.$name.'" and password = "'.$pwd.'"')->find();

		return $data;	
	}
}
?>