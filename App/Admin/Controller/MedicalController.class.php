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

class MedicalController extends CommonController
{
    //数据存储容器
    private $data = array();
    
    private $model = array(
            'medical' => 'medical'
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
     * [listData description]
     * @return [type] [description]
     */
    public function listData(){
        $medical = D($this->model['medical']);
        $data = $medical->getMedicalList();

        if($data){
            $this->assign('data', $data);
        }

    	$this->display();
    }

    /**
     * [add description]
     */
    public function add(){
        $id = I('get.m_id', '', 'int');
        
        if($id > 0){
            $medical = D($this->model['medical']);
            $data = $medical->getMedicalById($id);
            if($data){
                $this->assign('data', $data);
            }
        }

    	$this->display();
    }

    /**
     * [save 档案信息]
     * @return [type] [description]
     */
    public function save(){
        $this->data['avater'] = I('post.avater', '', 'addslashes');
        $this->data['name'] = I('post.name', '', 'addslashes');
        $this->data['gender'] = I('post.gender', '', 'int');
        $this->data['age'] = I('post.age', '', 'int');
        $this->data['phone'] = I('post.phone', '', 'addslashes');
        $this->data['docter'] = I('post.docter', '', 'addslashes');
        $this->data['tag_name'] = I('post.tag', '', 'addslashes');
        $this->data['content'] = htmlentities(I('post.file'));
        $this->data['start'] = I('post.start', '', 'addslashes');
        $this->data['end'] = I('post.end', '', 'addslashes');
        $this->data['over'] = I('post.over', '', 'int');

        $id = I('post.m_id', '', 'int');
        if($id > 0){
            $this->data['m_id'] = $id;

            $medical = D($this->model['medical']);
            $flag = $medical->updateData($this->data);
            if($flag > 0){
                $this->redirect('Medical/add', array('m_id'=>$id));
                return true;
            }
        }else{
            $this->data['medical_num'] = 'NO'.time();

            $medical = D($this->model['medical']);
            $id = $medical->addData($this->data);
            var_dump($flag);
            if($id > 0){
                $this->redirect('Medical/add', array('m_id'=>$id));
                return true;
            }
        }

        return false;
    }

    /**
     * [delete 删除档案]
     * @return [type] [description]
     */
    public function delete(){
        $id = I('get.m_id', '', 'int');

        if($id > 0){
            $medical = D($this->model['medical']);
            $flag = $medical->deleteData($id);
            if($flag > 0){
                $this->redirect('Medical/listData');
                return true;
            }
        }

        return false;
    }
}