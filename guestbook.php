<?php

include('./include/function.php'); //引入函数文件

$b_title = '留言本'; // 浏览器标题
$title = '留言本'; //页面标题
$introduce = '你可以在这里留下足迹';  //页面简介
include('./include/header.html');  //引入头部文件

//定义变量并赋值为空：
$username = $userurl = $email = $content = $grender = "";
$usernameErr = $userurlErr = $emailErr = $contentErr = $grenderErr = "";
//判断提交方法：
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//判断昵称是否输入：
	if(empty($_POST['username'])){
		$usernameErr = '昵称必须填写';
	}else{
		$username = test_input($_POST['username']);
	}
	//判断邮箱是否输入：
	if(empty($_POST['email'])){
		$emailErr = '邮箱必须填写';
	}else{
		$email = test_input($_POST['email']);
	}
	//判断评论是否输入：
	if(empty($_POST['textarea'])){
		$contentErr = '评论必须填写';
	}else{
		$content = test_input($_POST['textarea']);
	}
	$userurl = test_input($_POST['userurl']);
	$grender = test_input($_POST['grender']);
}

//判断提交内容并写入文件：
if(!empty($username) && !empty($email) && !empty($content)){
	//将过滤后的用户提交数据装入数组中：
	$msg_data = $username;
	$msg_data .= '|'. $userurl;
	$msg_data .= '|'. $email;
	$msg_data .= '|'. $grender;
	$msg_data .= '|'. time();
	$msg_data .= '|'. $content ."\n";
	//写入到文本文件中：
	$results = fopen('./data/msg.txt','a') or dir('存储数据异常！');
	fwrite($results,$msg_data);
	fclose($results);
}

//读出文本文件中的数据：
if(file_exists('./data/msg.txt')){
	$results = fopen('./data/msg.txt', 'r') or die('读取失败');
	//循环文件中的内容，每次读取一行：
	$data_arrays = array();
	while($line_data = fgets($results)){
		array_push($data_arrays,explode('|',$line_data));  //把读取出来的字符串按‘|’分割，存入数组中。
	}
	fclose($results);
}else{
	echo '暂时没有评论';
}

include('./include/body.html');  //引入主体文件

include('./include/footer.html');  //引入尾部文件
?>