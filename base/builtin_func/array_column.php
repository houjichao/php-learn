<?php

/**
 * 定义和用法
 * array_column() 返回输入数组中某个单一列的值。
 *
 * 语法
 * array_column(array,column_key,index_key);
 *
 * 参数    描述
 * array    必需。指定要使用的多维数组（记录集）。
 * column_key    必需。需要返回值的列。可以是索引数组的列的整数索引，或者是关联数组的列的字符串键值。该参数也可以是 NULL，此时将返回整个数组（配合index_key 参数来重置数组键的时候，非常管用）。
 * index_key    可选。作为返回数组的索引/键的列。
 */

$a = array(
    array(
        'id' => 5698,
        'first_name' => 'Peter',
        'last_name' => 'Griffin',
    ),
    array(
        'id' => 4767,
        'first_name' => 'Ben',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 3809,
        'first_name' => 'Joe',
        'last_name' => 'Doe',
    )
);

//index_key可以不传，也可以传数组中没有的，那就会变成[0][1][2]
$arr = array_column($a, "last_name", "id");
print_r($arr);

