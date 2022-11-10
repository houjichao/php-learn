<?php

/**
 * 语法
 * is_a(object, class)
 * 参数
 * 对象 -测试对象
 *
 * class-类 名称
 *
 * 返回
 * 如果对象属于此类或具有此类作为其父级之一，则is_a()函数返回TRUE，否则返回FALSE。
 */
interface ClassOne
{
    public function Demo();
}

class ClassTwo implements ClassOne
{
    public function Demo()
    {
        print "Demo";
    }
}

class ClassThree extends ClassTwo
{

}

$obj = new ClassTwo();
$obj1 = new ClassThree();

echo get_parent_class($obj1) . "\n";
if (is_a($obj, 'ClassOne')) {
    echo "Correct!";
} else {
    echo "Incorrect!";
}