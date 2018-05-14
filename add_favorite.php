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
 * 1.分支修改后，切换后你的修改将被重写，所以在切换分支前必须把修改提交(commit)或者保存（stash）起来
 *
 * 2.commit -m first
 * 3.commit -m second-update
 */

//练习git rebase -i HEAD~2 来处理已经提交的commits中第二个是错误的 要修改的问题（写错的不是最新的提交，而是倒数第二个）
//具体步骤 1. 在工作目录干净的情况下，执行 git rebase -i HEAD^^
//2. 在编辑页面选择要修改的commit , 把pick 修改为 edit . 此时已经回到要修改的 commit 的状态下
//3. 修改内容
//4. git add . 操作
//5. git commit --amend 替换修改
//6. git rebase --continue 完成
function commit1(){
    echo 'commit1';
    echo '回到这个commit的地方 ，进行修改 ';
}

function commit2(){
    echo 'commit2';
}
//练习git reset --hard HEAD^ 撤销提交 撤销但不删除 commit虽然在git log 没有了 但是可以通过SHA-1编码来找到
function commit3(){
    echo 'commit3';
}
function commit7(){
    echo 'commit7';
}
//要撤销的不是最新的提交 用git rebase -i HEAD^^的方式 删除要提交的那行 的确git log 时看不到记录了 但是会有冲突（这个小册上没说怎么处理）
function commit8(){
    echo  'commit8';

}
function commit9(){
    echo 'commit9';
}
function commit10(){
    echo 'commit10';
}
//用git rebase --onto HEAD^^ HEAD^ branch1 来撤销
function commit13(){
    echo 'commit13';

}
function commit14(){
    echo 'commit14';
}
?>