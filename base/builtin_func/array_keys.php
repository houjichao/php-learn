<?php

/**
 * 内置函数 -- array_keys学习
 *
 * 返回包含数组中所有键名的一个新数组：
 */

$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");

$b = array_keys($a);
foreach ($b as $item => $value) {
    echo "item is:" . $item . "value is:" . $value;
}
print_r(array_keys($a));