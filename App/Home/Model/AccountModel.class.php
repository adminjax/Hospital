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
class AccountModel extends Model
{
	//关闭字段信息的自动检测
	protected $autoCheckFields = false; 

	//表容器
	private $table = array(
			'user' => 'medical'
		);

	/**
	 * [getAvater description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getAvater($id){
		$user = M($this->table['user']);
		$data = $user->where('m_id = '.$id)->getField('avater');

		return $data;
	}

	/**
	 * [getUserById 获取用户信息]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getUserById($id){
		$user = M($this->table['user']);
		$data = $user->where('m_id = '.$id)->find();

		return $data;
	}
}
?>