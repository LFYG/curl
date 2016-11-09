<?php
//抓取远程数据
//http://www.mayicy.cn/Index/rechecking.shtml

/*

<ul class="result-list">
                            <li>中国农业银行股份有限公司武汉邮科院路支行</li><li>中国农业银行股份有限公司武汉光谷科技支行</li><li>中国农业银行股份有限公司武汉民航东路支行</li><li>中国农业银行股份有限公司武汉梅岭支行</li><li>中国农业银行股份有限公司武汉茶港支行</li><li>中国农业银行股份有限公司武汉沿江支行</li><li>中国农业银行股份有限公司武汉新华支行</li><li>中国农业银行股份有限公司武汉航空路支行</li><li>中国农业银行股份有限公司武汉关东支行</li><li>中国农业银行股份有限公司武汉文治街支行</li><li>中国农业银行股份有限公司武汉关山支行</li><li>中国农业银行股份有限公司武汉罗家港支行</li><li>中国农业银行股份有限公司武汉后湖大道支行</li><li>中国农业银行股份有限公司武汉傅家坡支行</li><li>中国农业银行股份有限公司武汉华工支行</li><li>中国农业银行股份有限公司武汉北湖支行</li><li>中国农业银行股份有限公司武汉青山支行</li><li>中国农业银行股份有限公司武汉崇仁路支行</li><li>中国农业银行股份有限公司武汉纸坊大街支行</li><li>中国农业银行股份有限公司武汉江夏支行</li><li>中国农业银行股份有限公司武汉新洲支行</li><li>中国农业银行股份有限公司武汉双柳分理处</li><li>中国农业银行股份有限公司武汉阳逻支行</li><li>中国农业银行股份有限公司武汉楚河分理处</li><li>中国农业银行股份有限公司武汉罗家港分理处</li> 
                        </ul>

*/

class curl_get{
	//获取 企业字号查重 数据	
	public static function get($url,$keyword){
		//第一次匹配正则
		$preg = '/<ul class="result-list">(.*)<\/ul>/isU';
		//第二次匹配正则
		$preg2 = '/<li>(.*)<\/li>/isU';
		
		// $preg = '/<ul class="result-list"><li>(.*)<\/li><\/ul>/isU';
		$re   = curl_init();
		$data = "entName=".$keyword."&hymlName=";
		$this_header=[
			"content-type: application/x-www-form-urlencoded;charset=UTF-8",
		];
		//设置curl远程抓取
		curl_setopt($ch,CURLOPT_HTTPHEADER,$this_header);
		curl_setopt($re,CURLOPT_URL,$url);
		curl_setopt($re,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($re,CURLOPT_POST,1);
		curl_setopt($re,CURLOPT_POSTFIELDS,$data);
		//执行curl远程抓取
		$res = curl_exec($re);
		curl_close($re);
		//第一次匹配 
		preg_match_all($preg,$res,$arr);
		if($arr[0]==null){
			//如果查找不到则不继续查找
			echo "未找到关于 “".$keyword."” 的企业";
			return ;
		}
		//第二次匹配  这次的结果才是干净的结果
		preg_match_all($preg2,$arr[1][0],$arr);
		print_r($arr);
		// echo ($res);

	}
}
curl_get::get("http://www.mayicy.cn/Index/rechecking.shtml",'武汉公交');