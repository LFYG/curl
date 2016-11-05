<?php
// 登录数据信息
// http://www.mayahaus.com/logging.php?action=login&  提交地址
//formhash=28347e41&referer=http%3A%2F%2Fwww.mayahaus.com%2Findex.php&loginfield=username&username=adminhc&password=adminhc&questionid=0&answer=&cookietime=2592000&loginmode=&styleid=&loginsubmit=%CC%E1+%26%23160%3B+%BD%BB  提交的数据

//初始化
$re=curl_init();
//设置curl
$url="http://www.mayahaus.com/logging.php?action=login&";
curl_setopt($re,CURLOPT_URL,$url);
//post
curl_setopt($re,CURLOPT_POST,true);
//提交数据
$data="formhash=28347e41&referer=http%3A%2F%2Fwww.mayahaus.com%2Findex.php&loginfield=username&username=adminhc&password=adminhc&questionid=0&answer=&cookietime=2592000&loginmode=&styleid=&loginsubmit=%CC%E1+%26%23160%3B+%BD%BB";
curl_setopt($re,CURLOPT_POSTFIELDS,$data)
//执行curl
curl_exec($re);
//关闭curl
curl_close($re);