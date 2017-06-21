<?php
/**
 * MET纪元后台音乐管理工具
 *
 * @Author: jax
 *
 * @category    App
 * @package     App_Admin
 */
namespace Admin\Model;
use Think\Model;

/**
 * 后台用户登录
 */
class DashboardModel extends Model
{
	//关闭字段信息的自动检测
	protected $autoCheckFields = false; 
	
	//表容器
	private $table = array(
			'orders' => 'orders',
		);

	/**
	 * [getToSchedule 获取当天的预约]
	 * @return [type] [description]
	 */
	public function getToSchedule(){
		$start = date("Y-m-d", time())." 00:00:00";
		$end = date("Y-m-d", time())." 23:59:59";
		$start = strtotime($start);
		$end = strtotime($end);

		$order = M($this->table['orders']);
		$data = $order->where('time > '.$start.' and time < '.$end)->select();

		return $data;
	}

	/**
	 * [getToSchedule 获取当天创建的预约]
	 * @return [type] [description]
	 */
	public function getNewSchedule(){
		$start = date("Y-m-d", time())." 00:00:00";
		$end = date("Y-m-d", time())." 23:59:59";
		$start = strtotime($start);
		$end = strtotime($end);

		$order = M($this->table['orders']);
		$data = $order->where('created > '.$start.' and created < '.$end)->select();

		return $data;
	}

}
?>