<?php
/**
 * 内置函数 -- extract学习
 * extract() 函数从数组中将变量导入到当前的符号表。
 * 该函数使用数组键名作为变量名，使用数组键值作为变量值。针对数组中的每个元素，将在当前符号表中创建对应的一个变量。
 * 该函数返回成功设置的变量数目。
 *
 * 将键值 "Cat"、"Dog" 和 "Horse" 赋值给变量 $a、$b 和 $c：
 */

$a = "Original";
$my_array = array("a" => "Cat","b" => "Dog", "c" => "Horse");
extract($my_array);
echo "\$a = $a; \$b = $b; \$c = $c";