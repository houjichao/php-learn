<?php

include "site.php";

//new运算符实例化该类的对象
$runoob = new Site();
$taobao = new Site();
$google = new Site();

// 调用成员函数，设置标题和URL
$runoob->setTitle("菜鸟教程");
$taobao->setTitle("淘宝");
$google->setTitle("Google 搜索");

$runoob->setUrl('www.runoob.com');
$taobao->setUrl('www.taobao.com');
$google->setUrl('www.google.com');

// 调用成员函数，获取标题和URL
echo $runoob->getTitle() . "\n";
echo $taobao->getTitle() . "\n";
echo $google->getTitle() . "\n";

echo $runoob->getUrl() . "\n";
echo $taobao->getUrl() . "\n";
echo $google->getUrl() . "\n";
