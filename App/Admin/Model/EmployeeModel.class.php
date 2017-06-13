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
class EmployeeModel extends Model
{
	//关闭字段信息的自动检测
	protected $autoCheckFields = false; 

	/**
	 * [$table 表容器]
	 * @var array
	 */
	private $table = array(
			'docter' => 'docter',
		);

	/**
	 * [getEmployeeList 获取医生信息]
	 * @return [type] [description]
	 */
	public function getEmployeeList(){
		$docter = M($this->table['docter']);
		$docter = $docter->select();

		return $docter;
	}

	/**
	 * [getEmployeeById 根据id获取医生信息]
	 * @param  [int] $id [description]
	 * @return [type]     [description]
	 */
	public function getEmployeeById($id){
		$docter = M($this->table['docter']);
		$docter = $docter->where('d_id = '.$id)->find();

		return $docter;
	}

	/**
	 * [addData 添加医生]
	 * @param [array] $data [添加医生数据]
	 */
	public function addData($data){
		$docter = M($this->table['docter']);
		$flag = $docter->data($data)->add();

		return $flag;
	}

	/**
	 * [updateData 修改医生信息]
	 * @param  [array] $data [修改数据]
	 * @return [type]       [description]
	 */
	public function updateData($data){
		$docter = M($this->table['docter']);
		$flag = $docter->where('d_id = '.$data['id'])->save($data);

		return $flag;
	}

	/**
	 * [deleteData 删除医生]
	 * @param  [array] $data [删除条件]
	 * @return [type]       [description]
	 */
	public function deleteData($id){
		$docter = M($this->table['docter']);
		$flag = $docter->where('d_id = '.$id)->delete();

		return $flag;
	}
}
?>