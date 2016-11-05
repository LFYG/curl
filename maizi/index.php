<?php
/*登录post数据
http://www.maiziedu.com/user/login/  提交地址
account_l=183844707%40qq.com&password_l=wanger1214  提交的数据
*/


/*评论post数据
http://www.maiziedu.com/user/login/  提交地址
object_type=ARTICLE&object_id=28661&parent_id=0&comment=%3Cp%3Eceshiaaaaaaaaaa%3C%2Fp%3E  提交的数据
*/
header('content-type:text/html;charset=utf-8');
class curls{
	//登陆地址
	protected $login_url='http://www.maiziedu.com/user/login/';
	//评论地址
	protected $comment_url='http://www.maiziedu.com/common/ajax/add/discuss';

	//cookie保存地址
	protected $dirnames;
	//登陆方法
	public function login($user=null,$pass=null,$comment=null,$article_id=null){
		//提交的数据
		$data="account_l={$user}&password_l=$pass";
		//头信息
		$header=[
			'Host:www.maiziedu.com',
			'Origin:http://www.maiziedu.com',
			'Referer:http://www.maiziedu.com/',
			'User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36'
		];
		
		//初始化curl
		$re=curl_init();
		//设置curl
		curl_setopt($re,CURLOPT_URL,$this->login_url);
		curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
		//设置post方式发送
		curl_setopt($re,CURLOPT_POST,1);
		//发送post数据
		curl_setopt($re,CURLOPT_POSTFIELDS,$data);

		//设置header头信息
		curl_setopt($re,CURLOPT_HTTPHEADER,$header);
		//开启cookie  使用cookie
		curl_setopt($re,CURLOPT_COOKIESESSION,true);
		//cookie文件保存地方
		$cookieFile=dirname(__FILE__).'/maiziCookie.txt';
		$this->dirnames=$cookieFile;
		//保存cookie
		curl_setopt($re,CURLOPT_COOKIEFILE,$cookieFile);
		//当我们连接结束后保存的cookie信息
		curl_setopt($re,CURLOPT_COOKIEJAR,$cookieFile);
		//设置cookie
		curl_setopt($re,CURLOPT_COOKIE,session_name().'='.session_id());
		//登录成功后跳转 设置为true支持跳转
		curl_setopt($re,CURLOPT_FOLLOWLOCATION,1);
		$res=curl_exec($re);
		
		//传入资源句柄到评论
		$this->comment($re,$comment,$article_id);
		
	}

	//评论方法
	public function comment($obj,$comment=null,$article_id=null){
		$header=[
			'Host:www.maiziedu.com',
			'Origin:http://www.maiziedu.com',
			'Referer:http://www.maiziedu.com/article/28661/',
			'User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36'
		];
		$data="object_type=ARTICLE&object_id={$article_id}&parent_id=0&comment=%3Cp%3E{$comment}%3C%2Fp%3E";
		//设置curl
		curl_setopt($obj,CURLOPT_URL,$this->comment_url);
		//接收返回值
		curl_setopt($obj,CURLOPT_HTTPHEADER,$header);
		//发送post
		curl_setopt($obj,CURLOPT_POSTFIELDS,$data);
		
		//支持curl
		$ress=curl_exec($obj);
		curl_close($obj);
		echo $ress;
		

	}
}
//实例化麦子评论类
$obj=new curls;

if(isset($_GET['id'])){
	$obj->login("183844707@qq.com",'wanger1214',$_GET['con'],$_GET['id']);
}



	// $re=curl_init();
	// 	//设置curl
	// 	curl_setopt($re,CURLOPT_URL,$this->login_url);
	// 	curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
	// 	//设置post方式发送
	// 	curl_setopt($re,CURLOPT_POST,1);
	// 	//发送post数据
	// 	curl_setopt($re,CURLOPT_POSTFIELDS,$data);

	// 	//设置header头信息
	// 	curl_setopt($re,CURLOPT_HTTPHEADER,$header);
	// 	//开启cookie  使用cookie
	// 	curl_setopt($re,CURLOPT_COOKIESESSION,true);
	// 	//保存cookie
	// 	curl_setopt($re,CURLOPT_COOKIEFILE,$cookieFile);
	// 	//当我们连接结束后保存的cookie信息
	// 	curl_setopt($re,CURLOPT_COOKIEJAR,$cookieFile);
	// 	//设置cookie
	// 	curl_setopt($re,CURLOPT_COOKIE,session_name().'='.session_id());
	// 	//登录成功后跳转 设置为true支持跳转
	// 	curl_setopt($re,CURLOPT_FOLLOWLOCATION,1);
	// 	$res=curl_exec($re);
	// 	curl_close($re);