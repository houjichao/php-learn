<?php

define("APPLICATION_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR);

$userInterface = "user_service1";
$baseInterface = "base_service";
$file_name = APPLICATION_PATH . $userInterface . '.php';
$file_name1 = APPLICATION_PATH . $baseInterface . '.php';

var_dump($file_name);
if (is_file($file_name)) {
    require_once $file_name;
    $class = new ReflectionClass("UserService");
} else {
    require_once $file_name1;
    $class = new ReflectionClass('BaseService');
}
var_dump($class);
$class = $class->newInstance(null, null, null, null);
var_dump($class);
$class->todo();