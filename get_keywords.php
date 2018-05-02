<?php
/**
 * 获取关键字接口
 */
defined('IN_PHPCMS') or exit('No permission resources.'); 

define('API_URL_GET_KEYWORDS', 'http://tool.phpcms.cn/api/get_keywords.php');

$number = intval($_GET['number']);
$data = $_POST['data'];
echo get_keywords($data, $number);
fsdfassssss
?>