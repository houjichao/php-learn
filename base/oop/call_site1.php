<?php

include "site1.php";

/**
 * 测试构造函数
 */

//new运算符实例化该类的对象
$runoob = new Site1('www.runoob.com', '菜鸟教程');
$taobao = new Site1('www.taobao.com', '淘宝');
$google = new Site1('www.google.com', 'Google 搜索');


// 调用成员函数，获取标题和URL
echo $runoob->getTitle() . "\n";
echo $taobao->getTitle() . "\n";
echo $google->getTitle() . "\n";

echo $runoob->getUrl() . "\n";
echo $taobao->getUrl() . "\n";
echo $google->getUrl() . "\n";