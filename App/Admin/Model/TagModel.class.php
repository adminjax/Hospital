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
class TagModel extends Model
{
	/**
	 * [addData 添加标签]
	 * @param [type] $data [description]
	 */
	public function addData($data){
		$flag = $this->data($data)->add();

		return $flag;
	}

	/**
	 * [updateData 修改标签]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function updateData($data){
		$flag = $this->where('tag_id = '.$data['tag_id'])->save($data);

		return $flag;
	}

	/**
	 * [deleteData 删除标签]
	 * @param  [int] $id [标签id]
	 * @return [type]     [description]
	 */
	public function deleteData($id){
		$flag = $this->where('tag_id = '.$id)->delete();

		return $flag;
	}

	/**
	 * [getTagList 获取标签列表]
	 * @return [type] [description]
	 */
	public function getTagList(){
		$data = $this->select();

		return $data;
	}

	/**
	 * [getTagById 根据id获取标签]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getTagById($id){
		$data = $this->where('tag_id = '.$id)->find();

		return $data;
	}
}
?>