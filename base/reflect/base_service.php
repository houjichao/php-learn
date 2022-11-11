<?php

class BaseService
{

    protected $interface = null;// 请求接口名称
    protected $para = [];// 请求参数
    protected $event_id = 0;// 事物ID
    protected $remote = [];// header

    public function __construct($interface, $para, $remote, $event_id = 0)
    {
        $this->interface = $interface;// 接口名称
        $this->para = $para;// 请求参数
        $this->event_id = $event_id;
        $this->remote = $remote;
    }

    public function getData()
    {
        echo "this is base service getData()\n";
    }

    public function todo() {
        $this->getData();
    }
}
