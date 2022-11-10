<?php

/**
 * PHP中__get()，获得一个类的成员变量时调用
 *
 * 在 php 面向对象编程中，类的成员属性被设定为 private 后，如果我们试图在外面调用它则会出现“不能访问某个私有属性”的错误。
 * 那么为了解决这个问题，我们可以使用魔术方法 __get()。
 *
 * 魔术方法__get()的作用
 * 在程序运行过程中，通过它可以在对象的外部获取私有成员属性的值。
 */

class Student
{

    private $name;

    private $age;

    public function __construct($name = '', $age = 1)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * 在类中添加__get()方法，在直接获取属性值时自动调用一次，以属性名作为参数传入并处理
     *
     * @param $propertyName
     * @return void
     */
    public function __get($propertyName)
    {
        if ($propertyName === "age") {
            if ($this->age > 30) {
                return $this->age - 10;
            } else {
                return $this->$propertyName;
            }
        } else {
            echo $this->$propertyName . "\n";
            return $this->$propertyName;
        }
    }

}

$stu = new Student("小明", 60);
echo "姓名：" . $stu->name . "\n";
echo "年龄：" . $stu->age . "\n";
echo "年龄：" . $stu->cls . "\n";

