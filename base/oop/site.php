<?php

/**
 * 面向对象学习
 *
 * 类
 */

class Site
{

    var $url;
    var $title;

    /**
     * 构造函数
     */
    public function __construct()
    {
    }


    /**
     * 析构函数
     * 析构函数(destructor) 与构造函数相反，当对象结束其生命周期时（例如对象所在的函数已调用完毕），系统自动执行析构函数。
     */
    function __destruct()
    {
        print "销毁 " . $this->url . "\n";
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }


    public static function test() {
        $hasNoFollowerLeadCidMap['111'][] = 'jack';
        $hasNoFollowerLeadCidMap['111'][] = 'jack1';
        $hasNoFollowerLeadCidMap['222'][] = 'pony';
        $hasNoFollowerLeadCidMap['222'][] = 'pony1';
        self::test1($hasNoFollowerLeadCidMap);
        print_r($hasNoFollowerLeadCidMap);
    }

    public static function test1($hasNoFollowerLeadCidMap) {
        $hasNoFollowerLeadCidMap['333'][] = "eason";
    }

}
$site = new Site();
$site::test();