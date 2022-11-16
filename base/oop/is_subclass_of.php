<?php

/**
 * is_subclass_of()函数检查对象是否将此类作为其父对象之一
 */
class Foo
{

    public $foobar = 'Foo';

    public function test()
    {

        echo $this->foobar . "\n";

    }

}

class Bar extends Foo
{

    public $foobar = 'Bar';

}

$a = new Foo();

$b = new Bar();

echo "use of test() method\n";

$a->test();

$b->test();

echo "instanceof Foo\n";

var_dump($a instanceof Foo); // TRUE

var_dump($b instanceof Foo); // TRUE

echo "instanceof Bar\n";

var_dump($a instanceof Bar); // FALSE

var_dump($b instanceof Bar); // TRUE

echo "subclass of Foo\n";

var_dump(is_subclass_of($a, 'Foo')); // FALSE

var_dump(is_subclass_of($b, 'Foo')); // TRUE

echo "subclass of Bar\n";

var_dump(is_subclass_of($a, 'Bar')); // FALSE

var_dump(is_subclass_of($b, 'Bar')); // FALSE