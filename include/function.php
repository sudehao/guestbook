<?php
/*
函数文件：
*/

//表单验证函数块：
function test_input($date){
	$date = trim($date);
	$date = stripcslashes($date);
	$date = htmlspecialchars($date);
	return $date;
}//表单验证函数块结束

//表单黏性：

// 读取文本文件中的数据函数块：
// function read_txt($file){
// 	$results = fopen($file, 'r') or die('文件读取异常！');
// 	while(($line_data = fgets($results) !== 'false'){
// 	}
// 	return $data_arr;

// }


?>
