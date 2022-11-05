<?php

include "child_site.php";

/**
 * 子类继承
 */

$baidu = new ChildSite();

$baidu->setUrl("www.baidu.com");
$baidu->setTitle("百度搜索");
$baidu->setCategory("引擎类");

echo $baidu->getUrl() . "\n";
echo $baidu->getTitle() . "\n";
echo $baidu->getCategory() . "\n";
