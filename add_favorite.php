<?php
/**
 * 收藏url，必须登录
 * @param url 地址，需urlencode，防止乱码产生
 * @param title 标题，需urlencode，防止乱码产生
 * @return {1:成功;-1:未登录;-2:缺少参数}
 */
defined('IN_PHPCMS') or exit('No permission resources.');

if(empty($_GET['title']) || empty($_GET['url'])) {
	exit('-2');	
} else {
	$title = $_GET['title'];
	$title = addslashes(urldecode($title));
	if(CHARSET != 'utf-8') {
		$title = iconv('utf-8', CHARSET, $title);
		$title = addslashes($title);
	}
	//ssssssssss
	$title = new_html_special_chars($title);
	$url = safe_replace(addslashes(urldecode($_GET['url'])));
	$url = trim_script($url);
}
$_GET['callback'] = safe_replace($_GET['callback']);
//判断是否登录	
$phpcms_auth = param::get_cookie('auth');
if($phpcms_auth) {
	list($userid, $password) = explode("\t", sys_auth($phpcms_auth, 'DECODE', get_auth_key('login')));
	$userid = intval($userid);
	if($userid >0) {

	} else {
		exit(trim_script($_GET['callback']).'('.json_encode(array('status'=>-1)).')');
	} 
} else {
	exit(trim_script($_GET['callback']).'('.json_encode(array('status'=>-1)).')');
}

$favorite_db = pc_base::load_model('favorite_model');
$data = array('title'=>$title, 'url'=>$url, 'adddate'=>SYS_TIME, 'userid'=>$userid);
//fsdfasfsafsa

/**
 * 分支 xgw1修改

 * 1.分支修改后，在切换分支前必须把修改提交或者保存（stash）起来
 */
function commit1(){
    echo 'commit1';
}


//用git rebase --onto HEAD^^ HEAD^ branch1 来撤销
function commit13(){
    echo 'commit13';

}
function commit14(){
    echo 'commit14';
}

function commit15(){
    echo 'commit13';

}
//已经push到远程仓库 发现代码写错了 解决方案
//1. push到自己的分支上 。通过删除 或修改 然后强制提交覆盖 git push origin branch1 -f
//2. push到master上。 修改代码，做新的提交即可
//111
//3.git reset --hard 所有的改变都不存在了 工作目录也是空的（回到上次commit的地方）
//4.git reset --soft 所有的改变都存在 只是之前提交的commit回退到缓存区里
//5.git reset 【--mixed】所有的改变都存在 全部回退到工作目录中
//git checkout -- 文件名 （修改为add时可以撤销改变的内容）
//git stash
//git stash -u 未被跟踪的文件也打包

?>