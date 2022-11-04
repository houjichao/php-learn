<?php

/**
 * 常量学习
 *
 * 常量是一个简单值的标识符。该值在脚本中不能改变。
 * 一个常量由英文字母、下划线、和数字组成,但数字不能作为首字母出现。 (常量名不需要加 $ 修饰符)。
 * 注意： 常量在整个脚本中都可以使用。
 *
 * php中定义常量的方法
 * define()函数
 * const关键字
 *
 * 设置常量，使用 define() 函数，函数语法如下：
 * bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )
 *
 * 该函数有三个参数:
 * name：必选参数，常量名称，即标志符。
 * value：必选参数，常量的值。
 * case_insensitive ：可选参数，如果设置为 TRUE，该常量则大小写不敏感。默认是大小写敏感的。
 *
 * const 常量名 = 常量值;
 *
 * define() 和 const 的区别：
 * const是在编译时定义常量，而define()方法是在运行时定义常量。
 * const不能用在if语句中， defne()能用在if语句中。
 */

define("WELCOME", "欢迎来到PHP世界");

echo WELCOME;
echo '<br>';
//echo welcome; //Warning: Use of undefined constant welcome - assumed 'welcome'

define("GREETING", "欢迎访问 Runoob.com", true);
echo greeting;

function myTest()
{
    echo WELCOME;
}

myTest();

const CONST_VAR = "欢迎来到PHP世界，使用const";
echo CONST_VAR;

if(5>10) {

    //const FOO = 'BAR';//错误
}

if(5>10) {

    //define('FOO', 'BAR');//正确

}

if(!defined('FOO')) {

    define('FOO', 'BAR');
    echo FOO;

}