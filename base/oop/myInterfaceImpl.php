<?php

include "myInterface.php";

class myInterfaceImpl implements myInterface
{

    const url = "www.baidu.com";

    static $my_static_var = "my_static_var";

    public static function myStaticFunc(){
        echo "这是一个static func";
    }

    public function printName($name)
    {
        echo $name;
    }

}

$my = new myInterfaceImpl();
$my->printName("hou ji chao");
echo $my::url;

echo $my::$my_static_var;

$my::myStaticFunc();