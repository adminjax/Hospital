<?php
/**
 * 后台管理工具
 *
 * @Author: jax
 *
 * @category    App
 * @package     App_Home
 */
namespace Home\Controller;
use Think\Controller;

class AccountController extends Controller 
{
	//模型容器
	private $model = array(
			'account' => 'account'
		);

	/**
	 * [uploadImage 上传头像]
	 * @return [type] [description]
	 */
	public function uploadImage(){
		$upload = A('Common/Upload');
		$image = C('SITE_URL').$upload->image(5000000, C('AVATER'));
		
		echo json_encode($image);
	}

	/**
	 * [index 入口]
	 * @return [type] [description]
	 */
    public function index(){
    	$user = D($this->model['account']);
    	$data = $user->getUserById(session('user.m_id'));

    	if($data){
    		$this->assign('data', $data);
    	}

        $this->display();
    }

    /**
     * [getAvater 获取头像]
     * @return [type] [description]
     */
    public function getAvater(){
    	$account = D($this->model['account']);
    	$data = $account->getAvater(session('user.m_id'));

    	return $data;
    }
}
?>