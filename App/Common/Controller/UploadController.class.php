<?php
/**
 * 通过后台管理
 *
 * @Author: jax
 *
 * @category    App
 * @package     App_Common
 */
namespace Common\Controller;
use Think\Controller;

/**
 * 验证码类
 */
class UploadController extends Controller
{
	//参数容器
	protected $config = array(
			'autoSub' => true,
			'exts' => array('jpg', 'gif', 'png', 'jpeg'), // 设置附件上传类型
			'subName' => array('date', 'Ymd'), //子目录创建方式
			'saveName' => array('uniqid',''),
		);

	/**
     * [upLoadImage 图片上传]
     * @param  [array] $config [配置信息]
     * @return [type]         [description]
     */
    public function image($size, $path, $width = null, $height = null){

        $config = array(
            'maxSize' => $size,
            'rootPath' => $path, // 设置附件上传根目录,
            'saveName' => $this->config['saveName'],
            'exts' => $this->config['exts'],
            'autoSub' => $this->config['autoSub'],
            'subName' => $this->config['subName'],
            );

        $upload = new \Think\Upload($config);// 实例化上传类
        $image = $upload->upload();

        if(!$image) {
            // 上传错误提示错误信息
            $msg = $this->error($upload->getError());
            return $msg;
        }else{
        	if($width > 0 && $height > 0){
        		$imgPath = $this->config['rootPath'].$image['Filedata']['savename'];
            	$re = $this->createThumb($imgPath, $image['Filedata']['savename']);
            	if($re){
	                return $re;
	            }
        	}
        }

        return substr(C('AVATER').$image['file']['savepath'].$image['file']['savename'], 1);
    }
}


?>