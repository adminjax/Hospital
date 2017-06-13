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
use Admin\Model;

/**
 * 医生类
 */
class EmployeeController extends CommonController
{
	//数据存储容器
	private $data = array();

	//模型容器
	private $table = array(
			'model' => 'Employee',
		);

	/**
	 * 初始化操作
	 */
	public function _initialize()
    {	
    	/**
    	 * [$menu 获取目录]
    	 * @var [type]
    	 */
        $menu = $this->getMenu();
        $this->assign('menu', $menu);
    }

    /**
     * [listInfo 获取雇员列表信息]
     * @return [type] [description]
     */
	public function listData(){	
		$docter = D($this->table['model']);
		$data = $docter->getEmployeeList();
		if($data){
			$this->assign('data', $data);
		}
		$this->display();
	}

	/**
	 * [addEmployee 添加雇员信息]
	 */
	public function add(){
		$id = I('get.d_id', '', 'int');
		if($id > 0){
			$docter = D($this->table['model']);
			$data = $docter->getEmployeeById($id);
			if($data){
				$this->assign('data', $data);
			}
		}
		$this->display();
	}

	/**
	 * [save 保存医生信息]
	 * @return [bool] [是否操作成功]
	 */
	public function save(){
		//医生信息
		$this->data['avater'] = I('post.avater', '', 'addslashes');
		$this->data['name'] = I('post.name', '', 'addslashes');
		$this->data['gender'] = I('post.gender', '', 'addslashes');
		$this->data['phone'] = I('post.phone', '', 'addslashes');
		$this->data['brief'] = htmlspecialchars (I('post.content')); 

		//判断是修改，还是添加
		$id = I('post.id', 0, 'int');
		$docter = D($this->table['model']);
		if($id > 0){
			$this->data['id'] = $id;
			$flag = $docter->updateData(array_filter($this->data));
			if($flag > 0){
				$this->redirect('Employee/add', array('d_id'=>$flag));
				return true;
			}
		}else{
			$flag = $docter->addData($this->data);
			if($flag > 0){
				return true;
			}
		}

		return false;
	}

	/**
	 * [delete 删除医生]
	 * @return [type] [description]
	 */
	public function delete(){
		$id = I('get.d_id', '' , 'int');
		if($id > 0){
			$docter = D($this->table['model']);
			$data = $docter->deleteData($id);
			if($data > 0){
				$this->redirect('Employee/listData');
				return true;
			}
		}
	}

	/**
	 * [addActive 添加活动]
	 * @return [bool] [是否操作成功]
	 */
	public function addActive(){
		$mode = I('get');

		//日程安排
		$active = D();
		switch ($mode) {
			case 'add':
				$active->add($this->data);
				break;
			case 'update':
				$active->update($this->data);
				break;
			case 'delete':
				$active->delete($this->data);
				break;
			default:
				# code...
				break;
		}
		return $flag;
	}

	/**
	 * [uploadImage 上传头像]
	 * @return [type] [description]
	 */
	public function uploadImage(){
		$upload = A('Common/Upload');
		$image = C('SITE_URL').$upload->image(5000000, C('AVATER'));
		
		echo json_encode($image);
	}
}
?>