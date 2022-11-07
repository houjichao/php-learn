<?php

require "referenced.php";
require "test.php";


echo "123";

/**
 * Warning: require(test.php): failed to open stream: No such file or directory in /Users/houjichao/Work/PHP/hjc/php-learn/base/oop/require/require.php on line 4
 *
 * Fatal error: require(): Failed opening required 'test.php' (include_path='.:/usr/local/Cellar/php@7.4/7.4.32/share/php@7.4/pear') in /Users/houjichao/Work/PHP/hjc/php-learn/base/oop/require/require.php on line 4
 */