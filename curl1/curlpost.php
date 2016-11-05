<?php
//初始化curl
$re=curl_init();
//需要提交的数据
$data=['username'=>'admin','password'=>'admin888'];
//设置信息
$arr=[

	CURLOPT_URL=>'http://localhost/ssc/curl/post.php',//设置提交地址
	CURLOPT_RETURNTRANSFER=>1,//设置获取结果
	CURLOPT_POST=>1,//提交方式以post方式
	CURLOPT_POSTFIELDS=>$data//提交过去的数据
];
curl_setopt_array($re,$arr);
//执行获得结果
$res=curl_exec($re);
//关闭资源
curl_close($re);
echo $res;

