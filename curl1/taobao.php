<?php
//初始化
$re=curl_init();
//采集地址
// https://tmatch.simba.taobao.com/?name=dpad&o=j&elemtid=7&count=3&p4p=tbcc_p4p_c2016_8_131172_14777560701661477756070488&keyword=%C4%D0%D7%B0&kgbextend=wangwangid%3Dhdd%255Cu5DE5%255Cu4F5C%255Cu5BA4%26userlocation%3D%25E6%25B5%25B7%25E5%25A4%2596%26srchost%3Dsearchapp010195217122.et2&mb=18%3A1&offset=0&otsdk=1&pid=420930_1006&q2cused=0&sbid=16%2C8458%2C278%2C288%2C4530%2C6020%2C7044%2C4&se=83db4b7232a355085e31235611be5039
$url="https://tmatch.simba.taobao.com/?name=dpad&o=j&elemtid=7&count=3&p4p=tbcc_p4p_c2016_8_131172_14777560701661477756070488&keyword=%C4%D0%D7%B0&kgbextend=wangwangid%3Dhdd%255Cu5DE5%255Cu4F5C%255Cu5BA4%26userlocation%3D%25E6%25B5%25B7%25E5%25A4%2596%26srchost%3Dsearchapp010195217122.et2&mb=18%3A1&offset=0&otsdk=1&pid=420930_1006&q2cused=0&sbid=16%2C8458%2C278%2C288%2C4530%2C6020%2C7044%2C4&se=83db4b7232a355085e31235611be5039";

//设置规则
curl_setopt($re,CURLOPT_URL,$url);
curl_setopt($re,CURLOPT_RETURNTRANSFER,1);

//执行curl
$res=curl_exec($re);
$res=explode('[',$res);
$res=str_replace(']','',$res[1]);
//关闭资源句柄
curl_close($re);
//输出结果
var_dump($res);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" charset="utf-8">






var a =<?php echo $res?>;
var b ={a:"aaa",REDKEY: "男装"};












var a ={"REDKEY":"\u7537\u88c5","LOCATION":"","WANGWANGID":"\u7ff0\u4ee3\u7ef4\u62d3\u5c7f\u4e13\u5356\u5e97","GRADE":"64418","ISMALL":"1","EURL":"https:\/\/click.simba.taobao.com\/cc_im?p=%C4%D0%D7%B0&s=871392956&k=385&e=rFYBsi1RLyYv5%2BH3rLA98SX%2FPyM4kG2A1wubNxFTXuHsXe9coDqxXrdEyM9Sebzyitv26VKTpnT7M6mglkwiXb7et1nKgMkgQQdrboQx72JOWRAOO%2F81N4VY0f77IIIKHMgc74rlmEVxGcuLYeAGhi1rGZt2nX%2FFcp4fbFB5vjPzPUtK7e7uFSlQAL7hY3MmC8%2FlkdVM%2FPBVr2ynBQA%2BjOPX6cRgWxOIazrsP%2BPTgYst%2BEnLOfMeIwF7iz4kN8dLLOEL5MxkHEt3nkIq8DwcUQDZJHmnQRdzOWIHbAdu86nk9psnYhCcOVLrh1fu7%2BupzCY%2FDznEp0I3YNzn4sdAEnb2OI%2FtmpfAmSHYIHCAmDLkcSNt0VcTXDp2O6jg9eeF","SELLERID":"2274138067","CREATIVEELEMENTS":{"DESCRIPTION":"","DISPLAYURL":"https:\/\/handaiweity.tmall.com\/index.htm?p4p=y","IMGURL":"https:\/\/img.alicdn.com\/imgextra\/i3\/163510309689565767\/TB2jxeqaY1J.eBjy1zeXXX9kVXa_!!0-saturn_solar.jpg_sum.jpg","LINKURL":"https:\/\/handaiweity.tmall.com\/index.htm?p4p=y","SUBTITLE":"","TITLE":"\u79cb\u51ac\u5b63\u7537\u58eb\u6bdb\u8863\u97e9\u7248\u5957\u5934\u9752\u5c11\u5e74\u9488\u7ec7\u886b\u5916\u5957\u6f6e"}},{"REDKEY":"\u7537\u88c5","LOCATION":"","WANGWANGID":"\u732a\u5934\u541b\u54c8","GRADE":"1658535","ISMALL":"0","EURL":"https:\/\/click.simba.taobao.com\/cc_im?p=%C4%D0%D7%B0&s=871392956&k=385&e=pd1eDMw3aIIv5%2BH3rLA98SX%2FPyM4kG2A1wubNxFTXuHsXe9coDqxXrdEyM9Sebzyitv26VKTpnRsMh%2FpPoCUImE%2Fntks5drhRDgP%2FbyEfn5OWRAOO%2F81N4VY0f77IIIKHMgc74rlmEVxGcuLYeAGhi1rGZt2nX%2FFcp4fbFB5vjPzPUtK7e7uFSlQAL7hY3MmC8%2FlkdVM%2FPBVr2ynBQA%2BjC4aATPey19fm4z%2BQPrbolZkYlUC9eNXNDymtE%2FHICMZBr%2FiCzSUhR5b4hLEm3OBkIv1I4qeOVB2biTnM80zRtW1FItTFKFVtqWNA6Q%2B95eQ6ATxITEw3sg0afLkVt4Rkj%2F8FqZ4tlcJ3dTEfHRAOzOm%2B3O4PZVoE9SXqk%2FCOPBF","SELLERID":"180432984","CREATIVEELEMENTS":{"DESCRIPTION":"","DISPLAYURL":"https:\/\/man-mix.taobao.com\/index.htm?p4p=y","IMGURL":"https:\/\/img.alicdn.com\/imgextra\/i3\/168070129154597377\/TB2GC8NgXXXXXXMXpXXXXXXXXXX_!!12796807-0-saturn_solar.jpg_sum.jpg","LINKURL":"https:\/\/man-mix.taobao.com\/index.htm?p4p=y","SUBTITLE":"","TITLE":"\u79cb\u51ac\u65b0\u6b3e\u82f1\u4f26\u590d\u53e4\u7537\u58eb\u4fee\u8eab\u9a6c\u7532\u7537\u88c5\u5462\u5b50\u9a6c\u5939"}},{"REDKEY":"\u7537\u88c5","LOCATION":"","WANGWANGID":"yagobrown\u96c5\u9601\u5e03\u6717\u65d7\u8230\u5e97","GRADE":"9566","ISMALL":"1","EURL":"https:\/\/click.simba.taobao.com\/cc_im?p=%C4%D0%D7%B0&s=871392956&k=385&e=Xz7hArCemIEv5%2BH3rLA98SX%2FPyM4kG2A1wubNxFTXuHsXe9coDqxXrdEyM9Sebzyitv26VKTpnR9qaxAneCOTA59dJhM2%2BDLu2BAPJtIBdxOWRAOO%2F81N4VY0f77IIIKHMgc74rlmEVxGcuLYeAGhi1rGZt2nX%2FFcp4fbFB5vjPzPUtK7e7uFSlQAL7hY3MmC8%2FlkdVM%2FPBVr2ynBQA%2BjCqhw6tL178bB%2BhWVuzoMSxfXiSbre157M0w9x0mi8S%2B9Vde1DUcmeYfrhkO8t6oT8itH92abSFoOWIHbAdu86miYWl17mEVJ6%2BsL77MCl4AVNV0ln%2BDH4C3%2BfuKLMu3LOVvygwLcSEUk9WZO6LrpuCIYHTtWL2eJWKfRGqqBlo3","SELLERID":"2168426181","CREATIVEELEMENTS":{"DESCRIPTION":"","DISPLAYURL":"https:\/\/yagobrown.tmall.com\/index.htm?p4p=y","IMGURL":"https:\/\/img.alicdn.com\/imgextra\/i2\/107970310015838572\/TB2LETkaZaK.eBjSspjXXXL.XXa_!!0-saturn_solar.jpg_sum.jpg","LINKURL":"https:\/\/yagobrown.tmall.com\/index.htm?p4p=y","SUBTITLE":"","TITLE":"\u7537\u58eb\u68c9\u88842016\u65b0\u6b3e \u9752\u5e74\u6f6e\u6d41\u51ac\u5b63\u7537\u5916\u5957\u5927\u7801"}};



	alert(a[0].REDKEY);







// var b ={a:"aaa",REDKEY: "男装"};
</script>
<img src=<script type="text/javascript" charset="utf-8" async defer></script>>
</body>
</html>