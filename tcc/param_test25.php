<?php

require_once "autoload_service.php";
define("APPLICATION_PATH", "/data/release/tcc/application");
define("SYS_PATH", APPLICATION_PATH."..".DIRECTORY_SEPARATOR."system".DIRECTORY_SEPARATOR);

$className ="AkskCommonPhpUtil";
$autoload = new AutoloadService();
var_dump(SYS_PATH);
$path = $autoload::getClass($className);
var_dump($path);

