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

    public static function string2array($x){
        if($x==NULL || $x == ""){//先做兼容处理
            return array();
        }

        return json_decode($x,True);
    }

}


$my = new myInterfaceImpl();
$my->printName("hou ji chao");
echo $my::url;

echo $my::$my_static_var;

$my::myStaticFunc();


$request = "{\"version\":1,\"componentName\":\"tcc-web\",\"eventId\":\"1667788447025.0.9141871053308941\",\"interface\":{\"interfaceName\":\"GetLeadList\",\"para\":{\"page\":1,\"pageSize\":10,\"needTotal\":0,\"status\":[0],\"leadBeginTime\":\"2022-10-07 00:00:00\",\"leadEndTime\":\"2022-11-07 23:59:59\"}}}";
$request = $my::string2array($request);
//var_dump($request);
echo "----------------\n";
print_r($request);
echo "----------------\n";
$interface_name = $request['interface']['interfaceName'];
$para = isset($request['interface']['para']) ? $request['interface']['para'] : array();
echo "----------------\n";
echo $interface_name;
echo "\n----------------\n";
print_r($para);
//var_dump($para);