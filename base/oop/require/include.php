<?php

include "referenced.php";
include "test.php";


echo "123";

/**
 * Warning: include(test.php): failed to open stream: No such file or directory in /Users/houjichao/Work/PHP/hjc/php-learn/base/oop/require/include.php on line 4
 *
 * Warning: include(): Failed opening 'test.php' for inclusion (include_path='.:/usr/local/Cellar/php@7.4/7.4.32/share/php@7.4/pear') in /Users/houjichao/Work/PHP/hjc/php-learn/base/oop/require/include.php on line 4
 * 123
 */