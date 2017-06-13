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
 * 标签模型
 */
class MedicalModel extends Model
{
	//表容器
	private $table = array(
			'medical' => 'medical',
			'medicallist' => 'medical_list'
		);

	/**
	 * [addData 添加患者档案]
	 * @param [array] $data [description]
	 */
	public function addData($data){
		$flag = $this->data($data)->add();

		return $flag;
	}

	/**
	 * [updateData 修改档案]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function updateData($data){
		$flag = $this->where('m_id = '.$data['m_id'])->save($data);

		return $flag;
	}

	/**
	 * [getMedicalList 获取所有档案]
	 * @return [type] [description]
	 */
	public function getMedicalList(){
		$data = $this->select();

		return $data;
	}

	/**
	 * [getMedicalById 根据id获取档案]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getMedicalById($id){
		$data = $this->where('m_id = '.$id)->find();

		return $data;
	}

	/**
	 * [deleteData 删除档案]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function deleteData($id){
		$flag = $this->where('m_id = '.$id)->delete();
		if($flag > 0){
			$list = M($this->table['medicallist']);
			$list->where('m_id = '.$id)->delete();
		}

		return $flag;
	}
}
?>