<?php

/**
 * instanceof关键字。使用这个关键字可以确定一个对象是类的实例、类的子类，还是实现了某个特定接口，并进行相应的操作。
 * 在某些情况下，我们希望确定某个类是否特定的类型，或者是否实现了特定的接口。instanceof操作符非常适合完成这个任务。
 * instanceof操作符检查三件事情：实例是否某个特定的类型，实例是否从某个特定的类型继承，实例或者他的任何祖先类是否实现了特定的接口。
 *
 * 作用：（1）判断一个对象是否是某个类的实例，（2）判断一个对象是否实现了某个接口。
 */

//判断一个对象是否是某个类的实例
class AppleClass {

}
$obj = new AppleClass();
if ($obj instanceof AppleClass) {
    echo "是AppleClass的实例";
}

echo "-------------------------\n";

//（2）判断一个对象是否实现了某个接口
interface ExampleInterface
{
    public function interfaceMethod();
}

class ExampleClass implements ExampleInterface
{
    public function interfaceMethod()
    {
        return 'Hello World!';
    }
}

$exampleInstance = new ExampleClass();
if ($exampleInstance instanceof ExampleInterface) {
    echo 'Yes, it is';
} else {
    echo 'No, it is not';
}
