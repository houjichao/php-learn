<?php

$func = function ($index, $isCorotunine = true) {
    $isCorotunine && \Swoole\Coroutine::sleep(2);
    echo "index:" . $index . PHP_EOL;
    echo "is corotunine:" . intval($isCorotunine) . PHP_EOL;
};

$func(1, false);
go($func, 2, true);
go($func, 3, true);
Swoole\Coroutine::create($func, 4, true);
go($func, 5, true);
go($func, 6, true);
$func(7, false);

/**
 * 关注的是执行顺序,1和7是非协程的执行能立马返回结果符合预期
 */