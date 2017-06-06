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
use Think\Controller;

class CommonController extends Controller {

    /**
     * [getMenu 获取目录]
     * @return [type] [description]
     */
    public function getMenu(){
    	$menu = C('ADMIN_MENU');
    	array_multisort(array_column($menu, 'sort'), SORT_ASC, $menu);
    	
    	return $menu;
    }
}