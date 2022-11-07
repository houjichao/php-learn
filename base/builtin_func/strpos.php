<?php



$key="learn.test";
echo strpos($key,'.');
if (strpos($key,'.')) {
    list($table, $key) = explode('.', $key);
    $key = sprintf('`%s`.`%s`', $table, $key);
    var_dump($key);
}
