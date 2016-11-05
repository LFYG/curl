<?php
header('content-type:image/png');
//初始化


class muke{
	//注册
	public function reg($user,$pwd,$code){
		//注册提交地址
		// Request URL:http://www.imooc.com/passport/user/register
		//提交数据
		//username=1006123126%40qq.com&password=adminhc&verify=qdvd&referer=http%3A%2F%2Fwww.imooc.com
		
		$url = 'http://www.imooc.com/passport/user/register';
		$data = 'username='.$user.'&password='.$pwd.'&verify='.$code.'&referer=http%3A%2F%2Fwww.imooc.com';
		$header = [
			'Host:www.imooc.com',
			'Origin:http://www.imooc.com',
			'Referer:http://www.imooc.com/',
			'User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36'
		];
		$re = curl_init();
		//各种配置
		curl_setopt($re,CURLOPT_URL,$url);

		curl_setopt($re,CURLOPT_RETURNTRANSFER,1);

		//设置post方式发送
		curl_setopt($re,CURLOPT_POST,1);
		//发送post数据
		curl_setopt($re,CURLOPT_POSTFIELDS,$data);
		//设置header头信息
		curl_setopt($re,CURLOPT_HTTPHEADER,$header);
		$res = curl_exec($re);
		
		curl_close($re);
		
		echo $res;
	}

	public function code(){
		$code = curl_init();
		curl_setopt($code,CURLOPT_URL,'http://www.imooc.com/passport/user/verifycode?t=1478370165558 ');
		curl_exec($code);
		curl_close($code);
	}
}

//http://www.imooc.com/passport/user/verifycode?t=1478370165558   验证码地址
//?user=55555555@qq.com&pwd=adminhc&code=1234
$obj = new muke;
if($_GET){
	
	$obj->reg($_GET['user'],$_GET['pwd'],$_GET['code']);
}else{

	$obj->code();
}

