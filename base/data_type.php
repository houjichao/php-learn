<?php

/**
 * PHP是弱类型语言
 *
 * PHP 变量存储不同的类型的数据，不同的数据类型可以做不一样的事情。
 *
 * PHP 支持以下几种数据类型:
 *
 * String（字符串）
 * Integer（整型）
 * Float（浮点型）
 * Boolean（布尔型）
 * Array（数组）
 * Object（对象）
 * NULL（空值）
 * Resource（资源类型）
 */

echo "<br>";
echo "------------以下是string------------------";
echo "<br>";
//单引号或者双引号都可以
$x = "Hello world!";
echo $x;
echo "<br>";
$x = '你好呀';
echo $x;

echo "<br>";
echo "------------以下是整型------------------";
echo "<br>";
// var_dump() 函数返回变量的数据类型和值：
$x = 5985;
var_dump($x);
echo "<br>";
$x = -345; // 负数
var_dump($x);
echo "<br>";
$x = 0x8C; // 十六进制数
var_dump($x);
echo "<br>";
$x = 047; // 八进制数
var_dump($x);

echo "<br>";
echo "------------以下是浮点型------------------";
echo "<br>";
$x = 10.365;
var_dump($x);
echo "<br>";
$x = 2.4e3;
var_dump($x);
echo "<br>";
$x = 8E-5;
var_dump($x);


echo "<br>";
echo "------------以下是布尔型------------------";
echo "<br>";
$x = true;
var_dump($x);
echo "<br>";
$x = false;
var_dump($x);
echo "<br>";

echo "<br>";
echo "------------以下是数组------------------";
echo "<br>";
$phones = array("Mi", "IPhone", "Vivo");
var_dump($phones);


echo "<br>";
echo "------------以下是对象------------------";
echo "<br>";

/**
 * 对象数据类型也可以用于存储数据。
 *
 * 在 PHP 中，对象必须声明。
 * 首先，你必须使用class关键字声明类对象。类是可以包含属性和方法的结构。
 * 然后我们在类中定义数据类型，然后在实例化的类中使用数据类型：
 */
class Car
{
    var $color;

    function __construct($color = "green")
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }
}

$car1 = new Car("white");
echo $car1->getColor();

echo "<br>";
echo "------------以下是null值------------------";
echo "<br>";
$x=null;
var_dump($x);


echo "<br>";
echo "------------以下是资源类型------------------";
echo "<br>";

$fp = fopen("foo","w");
echo get_resource_type($fp)."\n";


$doc = new_xmldoc("1.0");
echo get_resource_type($doc->doc)."\n";


