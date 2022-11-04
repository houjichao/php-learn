<?php
/**
 * 运算符学习
 */

echo "<br>";
echo "------------以下是算术运算符------------------";
echo "<br>";

$x=10;
$y=6;
echo ($x + $y); // 输出16
echo '<br>';  // 换行

echo ($x - $y); // 输出4
echo '<br>';  // 换行

echo ($x * $y); // 输出60
echo '<br>';  // 换行

echo ($x / $y); // 输出1.6666666666667
echo '<br>';  // 换行

echo ($x % $y); // 输出4
echo '<br>';  // 换行

echo -$x;

echo "<br>";
echo "------------以下为赋值运算符------------------";
echo "<br>";
$x=10;
echo $x; // 输出10

$y=20;
$y += 100;
echo $y; // 输出120

$z=50;
$z -= 25;
echo $z; // 输出25

$i=5;
$i *= 6;
echo $i; // 输出30

$j=10;
$j /= 5;
echo $j; // 输出2

$k=15;
$k %= 4;
echo $k; // 输出3

echo "<br>";
echo "------------以下为递增/递减运算符------------------";
echo "<br>";
$x=10;
echo ++$x; // 输出11
echo "<br>";


$y=10;
echo $y++; // 输出10
echo "<br>";
echo $y; //输出11
echo "<br>";

$z=5;
echo --$z; // 输出4
echo "<br>";

$i=5;
echo $i--; // 输出5
echo "<br>";

echo "<br>";
echo "------------以下为比较运算符------------------";
echo "<br>";

$x=100;
$y="100";

var_dump($x == $y);
echo "<br>";
var_dump($x === $y);
echo "<br>";
var_dump($x != $y);
echo "<br>";
var_dump($x !== $y);
echo "<br>";

$a=50;
$b=90;

var_dump($a > $b);
echo "<br>";
var_dump($a < $b);