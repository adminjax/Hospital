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
 * 医生类
 */
class ScheduleController extends CommonController
{
	//数据容器
	private $data;

	/**
	 * [getSchedule 获取日程安排]
	 * @return [type] [description]
	 */
	public function getSchedule(){
		$this->data['id'] = I('get.id', '', 'int');
		$this->data['CalendarTitle'] = 'AAAAAAAAAAAAA';
		$this->data['CalendarStartTime'] = 1496806200000;
		$this->data['CalendarEndTime'] = 1496809800000;
		$this->data['IsAllDayEvent'] = 0;
		
		$this->ajaxreturn($this->data);
	}

	public function addSchedule(){
		//获取数据
		/*
		$this->data['id'] = I('get.id', '', 'int');
		$this->data['content'] = I('post.CalendarTitle', '', 'addslashes');
		$this->data['start'] = strtotime(I('post.CalendarStartTime', '', 'addslashes'));
		$this->data['end'] = strtotime(I('post.CalendarEndTime', '', 'addslashes'));
		$this->data['isallday'] = I('post.IsAllDayEvent', '', 'addslashes');
		*/

		$this->data['id'] = I('get.id', '', 'int');
		$this->data['CalendarTitle'] = 'AAAAAAAAAAAAA';
		$this->data['CalendarStartTime'] = date('Y-m-d H:i:s', time());
		$this->data['CalendarEndTime'] = date('Y-m-d H:i:s', time());
		$this->data['IsAllDayEvent'] = 0;

		$this->ajaxreturn($this->data);
	}

	public function updateSchedule(){
		
	}

	public function deleteSchedule(){
		
	}
}
?>