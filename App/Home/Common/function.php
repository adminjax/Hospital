<?php
/**
 * [getAvater 获取用户头像]
 * @return [type] [description]
 */
function getAvater(){
	$account = A('Home/Account');
	$avater = $account->getAvater();

	return $avater;
}


?>