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

class TagController extends CommonController
{
    //表单容器
    private $data = array();
    //模型容器
    private $model = array(
        'tag' => 'tag',
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
     * [index 标签列表]
     * @return [type] [description]
     */
    public function listData(){
        $tag = D($this->model['tag']);
        $data = $tag->getTagList();
        if($data){
            $this->assign('data', $data);
        }

        $this->display();
    }

    /**
     * [addTag 添加标签]
     */
    public function addTag(){
        $id = I('get.tag_id', '', 'int');

        if($id > 0){
            $tag = D($this->model['tag']);
            $data = $tag->getTagById($id);
            
            if($data){
                $this->assign('data', $data);
            }
        }

        $this->display();
    }

    /**
     * [save 保存修改标签]
     * @return [type] [description]
     */
    public function save(){
        $this->data['tag_name'] = I('post.name', '', 'addslashes');
        $this->data['sort'] = I('post.sort', '', 'addslashes');
        $this->data['is_active'] = I('post.is_active', '', 'int');
        $this->data['desc'] = htmlspecialchars(I('post.desc'));

        $id = I('post.tag_id', '', 'int');
        $tag = D($this->model['tag']);
        
        if($id > 0){
            $this->data['tag_id'] = $id;
            $this->data['modified'] = time();
            $flag = $tag->updateData($this->data);
            if($flag > 0){
                $this->redirect('Tag/addTag', array('tag_id'=>$id));
                return true;
            }
        }else{
            $this->data['created'] = time();
            $id = $tag->addData($this->data);
            if($id > 0){
                $this->redirect('Tag/addTag', array('tag_id'=>$id));
                return true;
            }
        }

        return false;
    }

    /**
     * [delete 删除标签]
     * @return [type] [description]
     */
    public function delete(){
        $id = I('get.tag_id', '', 'int');
        $tag = D($this->model['tag']);

        if($id > 0){
            $flag = $tag->deleteData($id);
            if($flag > 0){
                $this->redirect('Tag/listData');
            }
        }
    }
}
?>