<?php
var_dump(extension_loaded('curl'));
exit;

//采集地址
$url='http://www.zjlottery.com/zsfx2/getdata.asp?flag=V';
//获取网页数据
$data=file_get_contents($url);
//正则规则
$zz='/<tr>\s+<td align="center">[0-9]{4}-[0-9]{2}-[0-9]{2}<\/td>\s+<td align="center">\d{9}<\/td>(.*)<tr>/';
//开始匹配
$db=preg_match_all($zz,$data, $arr);
//打印
print_r($db);

// 百位（1、单号，2、双号，3、大5-8，4、小1-4）
// 十位（5、单号，6、双号，7、大5-8，8、小1-4）
// 个位（9、单号，10、双号，11、大5-8，12、小1-4）
// 合（三个数字相加总合）13、单号，14、双号，15、小6～13，16、大14-21


// <td align="center">[0-9]{4}-[0-9]{2}-[0-9]{2}</td>\s+<td align="center">\d{9}</td>\s+<td class="(.*)" width="22">\d{2}</td>\s+


