<?php

/**
 * 数组学习
 */
/**
 * 数值数组
 */
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);

for ($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
}

echo "<br>";
echo "-----------------------------------";
echo "<br>";
foreach ($cars as $key => $value) {
    echo "key is:" . $key . " value is:" . $value;
    echo "<br>";
}

/**
 * PHP 关联数组
 * 关联数组是使用您分配给数组的指定的键的数组。
 *
 * 这里有两种创建关联数组的方法：
 *
 * $age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
 * or:
 *
 * $age['Peter']="35";
 * $age['Ben']="37";
 * $age['Joe']="43";
 */

$age = array("jack" => 29, "tom" => "30", "pony" => 50.5);
$age1 = ["jack" => 29, "tom" => "30", "pony" => 50.5];
foreach ($age as $item => $value) {
    echo "item is:" . $item . "value is:" . $value;
    echo "<br>";
}

$rule = [
    'cid' => ['type' => 'string']
];
var_dump($rule);
echo $rule['cid']['type'];
echo "<br>";

echo "----------\n";

//d 的值为最大的整数索引+1。
$a = array(
    'a',
    3 => 'b',
    1 => 'c',
    'd'
);
echo $a[4];

echo "----------\n";
//d 的值为最大的整数索引+1。
$a = array();
if ($a == null) {
    echo 'true';
} else {
    echo 'false';
}

echo "----------\n";

//键名将被这样转换：null 转为(空字符串)，true 转为 1，false 转为 0。
$a = array(
    null => 'a',
    true => 'b',
    false => 'c',
    0 => 'd',
    1 => 'e',
    '' => 'f'
);
echo count($a), "\n";

echo "----------\n";

$a = array();
if ($a[1]) {
    echo "12j1ioj2oj";
}
echo count($a), "\n";
