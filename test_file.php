<?php

$username = 'sudehao';
$userurl = 'http://www.suhome.cn';
$email = 'sudehao@gmail.com';
$grender = 'man';
$content = '5这只是一条测试1文字2222';

$msg_data = $username;
$msg_data .= '|'. $userurl;
$msg_data .= '|'. $email;
$msg_data .= '|'. $grender;
$msg_data .= '|'. $content ."\n";

$results = fopen('./data/msg.txt','a') or dir('存储数据异常！');
fwrite($results,$msg_data);
fclose($results);

// function read_txt($file){
// 	$results = fopen($file, 'r') or die('文件读取异常！');
// 	while(($line_data = fgets($results)) !== 'false'){
// 		$data_arr = explode('|', $line_data);
// 	}
// 	return $data_arr;

// }

// $data_arr = read_txt('./data/msg.txt');
// print_r($data_arr);


// $results = fopen('./data/msg.txt', 'r') or die('读取失败');
// $data_arr = array();
// while($line_data = fgets($results)){
// 	echo $line_data;
// }

// fclose($results);


?>