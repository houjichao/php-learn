<?php
// 此处是 PHP 代码

/**
 * 多行注释
 */
// 单行注释
echo "Hello World!\n";

/**
 *
 * PHP 变量规则：
 * 变量以 $ 符号开始，后面跟着变量的名称
 * 变量名必须以字母或者下划线字符开始
 * 变量名只能包含字母、数字以及下划线（A-z、0-9 和 _ ）
 * 变量名不能包含空格
 * 变量名是区分大小写的（$y 和 $Y 是两个不同的变量）
 */

$txt = "111";
$x = 6;
$y = 10.6;

echo $txt , "\n";
echo $x , "\n";
echo $y , "\n";

/**
 * PHP 变量作用域
 * 变量的作用域是脚本中变量可被引用/使用的部分。
 *
 * PHP 有四种不同的变量作用域：
 *
 * local -- 局部
 * global -- 全局
 * static
 * parameter
 * 1、定义在函数外部的就是全局变量，它的作用域从定义处一直到文件结尾。
 * 2、函数内定义的变量就是局部变量，它的作用域为函数定义范围内。
 * 3、函数之间存在作用域互不影响。
 * 4、函数内访问全局变量需要 global 关键字或者使用 $GLOBALS[index] 数组
 */
echo "<br>";
echo "以下是local/global作用域------------------------------";
echo "<br>";
$x = 5; // 全局变量
//在所有函数外部定义的变量，拥有全局作用域。除了函数外，全局变量可以被脚本中的任何部分访问，要在一个函数中访问一个全局变量，需要使用 global 关键字。
function myTest()
{
    $y = 10; // 局部变量
    global $x;
    echo "<p>测试函数内变量:<p>";
    echo "变量 x 为: $x";
    echo "<br>";
    echo "变量 y 为: $y";
    echo "<br>";
    //PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。
    echo "数组：变量 x 为: {$GLOBALS['x']}";
}

myTest();

echo "<p>测试函数外变量:<p>";
echo "变量 x 为: $x";
echo "<br>";
echo "变量 y 为: $y";

echo "<br>";
echo "以下是static作用域------------------------------";
echo "<br>";

//static作用域，会在当前函数一直保存，++时递增
function myTest1()
{
    static $x = 0;
    echo $x;
    $x++;
    echo PHP_EOL;    // 换行符
}

myTest1();
myTest1();
myTest1();

echo "<br>";
echo "以下是参数作用域------------------------------";
echo "<br>";
function myTest2($x)
{
    echo $x;
}

myTest2(5);
