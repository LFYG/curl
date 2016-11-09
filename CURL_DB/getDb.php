<?php
header("content-type:text/html;charset=gb2312");
class getDb{
	//链接数据库
	protected function get_pdo(){
		new PDO("mysql:host=localhost;dbname=curl","root");
	}

	//采集文章并写入数据库
	public function get(){
		//http://www.jb51.net/list/list_15_1.htm   
		$db = new PDO("mysql:host=localhost;dbname=curl","root",'');

		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->exec("SET NAMES'gb2312'");

		$num = $_GET['num'];
		for ($i=$num; $i < 10; $i++) { 
			$arr = $this->curl("http://www.jb51.net/list/list_15_".$num.".htm");
			foreach ($arr[0] as $key => $value) {
				//抓取文章内容
				$wen = $this->con("http://www.jb51.net".$arr[2][$key]);
				$tmp = explode(':',$arr[1][$key]);

				$sql = "INSERT INTO `content` (`id`, `title`, `url`, `times`, `content`) VALUES (NULL, '".$arr[4][$key]."', '".$arr[2][$key]."', '".strtotime($tmp[1])."', '".mysql_real_escape_string($wen[1][0])."');";
				$res = $db->exec($sql);
				if($res){

					echo "<script language='JavaScript'>self.location='http://localhost/hdd/getDb.php?num='".$i."</script>";
					echo "采集成功过！".$i;
				}else{
					echo "采集失败".$key;
					return ;
				}
			}
		}

	}

	//获取文章列表
	public function curl($url=null){
		//第一次匹配正则
		$preg = '/<DT><span>(.*)<\/span><a href="(.*)" title="(.*)" target="_blank">(.*)<\/a><\/DT>/';
		$re   = curl_init();
		$this_header=[
			"content-type: application/x-www-form-urlencoded;charset=UTF-8",
		];
		//设置curl远程抓取
		curl_setopt($re,CURLOPT_HTTPHEADER,$this_header);
		//设置curl远程抓取
		curl_setopt($re,CURLOPT_URL,$url);
		curl_setopt($re, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36');
        // 保存到字符串而不是输出
		curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
		//执行curl远程抓取
		$res = curl_exec($re);
		curl_close($re);
		//第一次匹配 
		preg_match_all($preg,$res,$arr);
		return $arr;
	}

	//获取文章内容
	public function con($url){
		//第一次匹配正则
		$preg = '/<div id="contents">(.*)<div class="art_xg">/isU';
		$re   = curl_init();
		$this_header=[
			"content-type: application/x-www-form-urlencoded;charset=UTF-8",
		];
		//设置curl远程抓取
		curl_setopt($re,CURLOPT_HTTPHEADER,$this_header);
		//设置curl远程抓取
		curl_setopt($re,CURLOPT_URL,$url);
		curl_setopt($re, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36');
        // 保存到字符串而不是输出
		curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
		//执行curl远程抓取
		$res = curl_exec($re);
		curl_close($re);
		//第一次匹配 
		preg_match_all($preg,$res,$arr);
		return $arr;
	}

	//获取分页
	public function prg($url){
		//
		//第一次匹配正则
		$preg = '/3<\/a><a href=\/list\/list_15_2.htm title="下页">下页<\/a><a href=\/list\/list_15_(.*).htm title="末页">末页<\/a><\/div>
/';
		$re   = curl_init();
		$this_header=[
			"content-type: application/x-www-form-urlencoded;charset=UTF-8",
		];
		//设置curl远程抓取
		curl_setopt($re,CURLOPT_HTTPHEADER,$this_header);
		//设置curl远程抓取
		curl_setopt($re,CURLOPT_URL,$url);
		curl_setopt($re, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36');
        // 保存到字符串而不是输出
		curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
		//执行curl远程抓取
		$res = curl_exec($re);
		curl_close($re);
		//第一次匹配 
		preg_match_all($preg,$res,$arr);
		return $arr;
	}
}

$obj = new getDb;
$obj->get();
// print_r($obj->prg("http://www.jb51.net/list/list_15_1.htm"));
// echo $obj->prg("http://www.jb51.net/list/list_15_1.htm");




// $dbh = new PDO('mysql:host=localhost;dbname=access_control', 'root', '');    
// $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
// $dbh->exec('set names utf8');   
// /*添加*/  
// //$sql = "INSERT INTO `user` SET `login`=:login AND `password`=:password";   
// $sql = "INSERT INTO `user` (`login` ,`password`)VALUES (:login, :password)";
// $stmt = $dbh->prepare($sql);
// $stmt->execute(array(':login'=>'kevin2',':password'=>''));    
// echo $dbh->lastinsertid();    
// /*修改*/  
// $sql = "UPDATE `user` SET `password`=:password WHERE `user_id`=:userId";    
// $stmt = $dbh->prepare($sql);    
// $stmt->execute(array(':userId'=>'7', ':password'=>'4607e782c4d86fd5364d7e4508bb10d9'));    
// echo $stmt->rowCount();   
// /*删除*/  
// $sql = "DELETE FROM `user` WHERE `login` LIKE 'kevin_'"; //kevin%    
// $stmt = $dbh->prepare($sql);    
// $stmt->execute();    
// echo $stmt->rowCount();    
// /*查询*/  
// $login = 'kevin%';    
// $sql = "SELECT * FROM `user` WHERE `login` LIKE :login";    
// $stmt = $dbh->prepare($sql);    
// $stmt->execute(array(':login'=>$login));    
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){       
//  print_r($row);    
// }    
// print_r( $stmt->fetchAll(PDO::FETCH_ASSOC));   
?>

