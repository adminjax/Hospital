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
class ScheduleModel extends Model
{
	//关闭字段信息的自动检测
	protected $autoCheckFields = false; 

	//表容器
	private $table = array(
			'schedule' => 'order'
		);

	/**
	 * [addData 添加预约]
	 * @param [type] $data [description]
	 */
	public function addData($data){
		$schedule = M($this->table['schedule']);
		$data = $schedule->data($data)->add();

		return $data;
	}
}
?>