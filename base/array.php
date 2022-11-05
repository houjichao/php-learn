<?php

/**
 * 数组学习
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


