<?php

include "site.php";

class ChildSite extends Site
{
    var $category;

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