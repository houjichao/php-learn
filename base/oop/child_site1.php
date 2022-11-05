<?php

include "site.php";

class ChildSite extends Site
{
    var $category;

    public function __construct()
    {
        //PHP 不会在子类的构造方法中自动的调用父类的构造方法。要执行父类的构造方法，需要在子类的构造方法中调用 parent::__construct() 。
        parent::__construct();
    }


    public function getUrl()
    {
        return "这是对子类方法进行了重写" . $this->url;
    }


    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }


}