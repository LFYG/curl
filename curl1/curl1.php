<?php
//utf8头
header("content-type:text/html;charset=gb2312");
	//网址
$url='http://www.qq说.com/';
//初始化
//可以直接付给他连接地址
// $re=curl_init($url);
$re=curl_init();
//设置相关值

curl_setopt($re, CURLOPT_URL,$url);
//返回结果不直接输出  CURLOPT_RETURNTRANSFER
curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
//执行获得结果
$res=curl_exec($re);
//str_ireplace 加了i是忽略大小写
// echo str_replace("Javascript","何大大",$res);
//释放资源
//判断是否连接成功
if(false===$res){
	echo "cURL地址连接失败".curl_error($re);
}else{
	echo "连接成功！";
	echo str_replace("今日话题", '何大大',$res);
}


//关闭资源 
curl_close($re);