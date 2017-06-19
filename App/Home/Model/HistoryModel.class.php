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
class HistoryModel extends Model
{
	//关闭字段信息的自动检测
	protected $autoCheckFields = false; 

	//表容器
	private $table = array(
			'orders' => 'orders',
		);

	/**
	 * [getHistoryList 获取预约历史]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getHistoryList($name){
		$order = M($this->table['orders']);
		$data = $order->where('name = "'.$name.'"')->order('time desc')->select();

		return $data;
	}

	/**
	 * [deleteData 取消预约]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function deleteData($id){
		$order = M($this->table['orders']);
		$data = $order->where('o_id = '.$id)->delete();

		return $data;
	}

}
?>