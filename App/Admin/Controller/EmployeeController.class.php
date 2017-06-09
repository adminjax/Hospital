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
class EmployeeController extends CommonController
{
	//数据存储容器
	private $data = array();

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
		$this->display();
	}

	/**
	 * [addEmployee 添加雇员信息]
	 */
	public function add(){
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
		$this->data['gander'] = I('post.gander', '', 'addslashes');
		$this->data['phone'] = I('post.phone', '', 'addslashes');
		$this->data['profile'] = I('post.profile', '', 'addslashes');

		//判断是修改，还是添加
		$id = I('post.id', 0, 'int');
		$docter = D();
		if($id > 0){
			$this->data['id'] = $id;
			$flag = $docter->update($this->data);
		}else{
			$flag = $docter->add($this->data);
		}

		return $flag;
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
}
?>