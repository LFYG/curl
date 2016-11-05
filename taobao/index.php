<?php
// Request URL:http://pub.alimama.com/items/search.json?q=%E6%B1%BD%E8%BD%A6%E5%9D%90%E5%9E%AB
//淘客id  spm=a219t.7900221/10.1998910419.d30ccd691.hXK7Dk
class taobao{

	//获取产品信息
	public function info($name=null,$name_id=null){

		$url="http://pub.alimama.com/items/search.json?q={$name}&toPage=1&auctionTag=&perPageSize=10";
		//初始化
		$re=curl_init();
		//设置
		curl_setopt($re,CURLOPT_URL,$url);
		curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
		//执行
		$db=curl_exec($re);
		//释放资源
		curl_close($re);
		//转换为数组
		$db=json_decode($db,true);

		if(!is_null($name_id)){
			//替换淘客ID
			foreach ($db['data']['pageList'] as $key => $value) {
				$tmp=explode("?",$db['data']['pageList'][$key]['auctionUrl']) ;
				$tmp_url=$tmp[0]."?spm={$name_id}&".$tmp[1];
				//放入处理好的地址
				$db['data']['pageList'][$key]['auctionUrl']=$tmp_url;
			}

			return $db;
		}
		
		return $db;
	}

}

// http://item.taobao.com/item.htm?a219t.7900221/10.1998910419.d30ccd691.hXK7Dk

if(isset($_POST['name'])){

	$obj=new taobao;
	$data=$obj->info($_POST['name']);
	

}

// echo "<a target='new' href='".$data['data']['pageList'][$key]['auctionUrl']."'>".$data['data']['pageList'][$key]['title']."</a><br>";

?>

