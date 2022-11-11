<?php

use function Swoole\Coroutine\run;

run(function () {
    $swoole_mysql = new Swoole\Coroutine\MySQL();
    $swoole_mysql->connect([
        'host' => '127.0.0.1',
        'port' => 3306,
        'user' => 'root',
        'password' => '123456',
        'database' => 'learn',
        'strict_type' => true ////开启严格模式，query方法返回的数据也将转为强类型,如果不开，student表的age返回就为string
    ]);
    $res = $swoole_mysql->query('select * from student');
    var_dump($res);
});