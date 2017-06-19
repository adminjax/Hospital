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
class DashboardModel extends Model
{
	//关闭字段信息的自动检测
	protected $autoCheckFields = false; 

	//表容器
	private $table = array(
			'docter' => 'docter'
		);

	/**
	 * [getAllDocter 获取医生列表]
	 * @return [type] [description]
	 */
	public function getAllDocter(){
		$docter = M($this->table['docter']);
		$data = $docter->select();

		return $data;
	}
}
?>