<?php
/*
 * common项目自动加载类
 */
class AutoloadService
{
    public static $_request_set=array();

    static function loadClass($class_name)
    {
        //cache机制
        if(isset(self::$_request_set[$class_name])){
            return;
        }
        self::$_request_set[$class_name] = 1;


        $file = AutoloadService::getClass($class_name);
        if($file){
            require_once $file;
            return;
        }
    }


    public static function getClass($class_name) {
        $paths = AutoloadService::parseClassName($class_name);
        if(!$paths || !is_array($paths)){
            return NULL;
        }
        $num = count($paths);
        if($num<2){
            return NULL;
        }
        $type = $paths[$num - 1];
        echo $type."\n";

        switch($type) {
            case "config" :
                $file = AutoloadService::getClassWithEnv($paths);
                break;
            case "controller" :
            case "model" :
            case "service" :
            case "scripts":
                $file = AutoloadService::getClassWithDir($paths);
                break;
            default :
                $file = AutoloadService::getClassWhitDefault($paths);
                break;
        }

        return $file;
    }


    /*
	 * 加载分环境的类(比如config)
     * @param $path
     * @return null|string
	 */
    public static function getClassWithEnv($paths){

        $file_path=$paths[count($paths) - 1].DIRECTORY_SEPARATOR;

        $file = implode("_", $paths);

        $filename_env = APPLICATION_PATH.$file_path.ENV.DIRECTORY_SEPARATOR.$file.".php";
        $filename = APPLICATION_PATH.$file_path.$file.".php";
        $sys_filename = SYS_PATH.$file_path.$file.".php";
        if(is_file($filename_env)) return $filename_env;
        else if (is_file($filename)) return  $filename;
        else if(is_file($sys_filename)) return $sys_filename;
        else return NULL;
    }

    /*
     * 加载不分环境和目录默认的类 (比如util)
     * @param $path
     * @return null|string
     */
    public static function getClassWhitDefault($paths) {
        $file_path=$paths[count($paths) - 1].DIRECTORY_SEPARATOR;
        $file = implode("_", $paths);

        $filename = APPLICATION_PATH.$file_path.$file.".php";
        $sys_filename = SYS_PATH.$file_path.$file.".php";
        if (is_file($filename)) return  $filename;
        else if(is_file($sys_filename)) return $sys_filename;
        else return NULL;
    }

    /**
     * 加载分目录类(controller/model/service)
     * @param $path
     * @return null|string
     */
    public static function getClassWithDir($paths){

        $file_path = $paths[count($paths) - 1].DIRECTORY_SEPARATOR;

        //优先查找业务下面的server，如果不存在，查找system
        $dir = '';
        for($i=0,$l=(count($paths)-1); $i<=$l; $i++){
            if($dir){
                $dir.='_';
            }
            $dir.=$paths[$i];

            $file= implode("_", $paths);

            $filename = APPLICATION_PATH.$file_path.$dir.DIRECTORY_SEPARATOR.$file.".php";
            if (is_file($filename)) return $filename;
        }

        $dir = '';
        for($i=0;$i<=1;$i++){
            if($dir){
                $dir.='_';
            }
            $dir.=$paths[$i];

            $file= implode("_", $paths);

            $filename = SYS_PATH.$file_path.$dir.DIRECTORY_SEPARATOR.$file.".php";
            if (is_file($filename)) return $filename;
        }

        $file= implode("_", $paths);
        $filename = SYS_PATH.$file_path.$file.".php";
        if (is_file($filename)) return $filename;

        return NULL;
    }


    /**
     * 解析类名
     * @param $class_name
     * @return array|null
     */
    public static function parseClassName($class_name){
        // AbcDef => abc_def
        $ret = array();
        $len = strlen($class_name);
        $index = 0;
        while($index<$len){
            //第一个大写
            if($class_name[$index]<'A' || $class_name[$index]>'Z'){
                return Null;
            }
            $str = '';
            $str.=chr(ord($class_name[$index])+32);
            $index++;
            while($index<$len && ($class_name[$index]>='a' && $class_name[$index]<='z' ||
                    $class_name[$index]>='0' && $class_name[$index]<='9')){
                $str.=$class_name[$index++];
            }
            $ret[]=$str;
        }
        return $ret;
    }
}
