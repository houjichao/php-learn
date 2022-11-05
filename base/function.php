<?php

/**
 * php 函数学习
 */

function test()
{
    echo "Hou Ji Chao";
}

echo "My Name is ";
test();
echo "\n";

function addParam($param)
{
    echo $param . " Refsnes.<br>";
}

echo "My name is ";
addParam("Kai Jim");
echo "<bar>";
echo "\n";


function writeName($fname, $punctuation)
{
    echo $fname . " Refsnes" . $punctuation . "<br>";
}

echo "My name is ";
writeName("Kai Jim", ".");
echo "My sister's name is ";
writeName("Hege", "!");
echo "My brother's name is ";
writeName("Ståle", "?");

echo "\n";
echo "<br>";

/**
 * 函数的返回值这里需要说明下和java不同，不需要声明，直接return即可
 * @param $x
 * @param $y
 * @return mixed
 */
function add($x, $y)
{
    $total = $x + $y;
    return $total;
}

echo "1 + 16 = " . add(1, 16);

echo "-------------------\n";

function varParam(...$param)
{
    echo $param[0];
    echo count($param);
    foreach ($param as $p) {
        echo $p;
    }
    echo "\n";
}

varParam("a");
varParam("a", "b");
varParam("a", "b", "c");


echo "\n";
echo "--------------------";

function varParam1($param = [])
{
    echo $param[0];
    echo count($param);
    foreach ($param as $p) {
        echo $p;
    }
    echo "\n";
}
$arr = array("aaa","bbbb");
varParam1($arr);

