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
class PageController extends Controller
{
	/**
	 * [pageTools 分页工具]
	 * @param  [int] $size    [总共多少条]
	 * @param  [int] $numPage [第几页]
	 * @param  [int] $pageNum    [每页多少条]
	 * @return [string]          [需要显示的html]
	 */
	public function pageTools($total, $numPage, $pageNum){
		//分页工具栏
		$page = new \Think\Page($total, $pageNum);
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('first','首页');
		$page->setConfig('last','尾页');
		$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%  第 '.$numPage.' 页/共 %TOTAL_PAGE% 页 ( '.$pageNum.' 条/页 共 '.$total.' 条)');
		$show = $page->show();

		return $show;
	}	
}


?>