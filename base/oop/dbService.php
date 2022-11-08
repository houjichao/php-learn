<?php

class DbService
{
    public function getSalesGroupListByCondition(
        $fields = array(),
        $where = [],
        $like = [],
        $limit = null,
        $offset = null,
        $sort = null,
        $sort_type = 'DESC',
        $needCount = true
    )
    {
        print("接口被调用\n");
        print_r($fields);
        print_r($where);

    }

    public function todo() {
        $rule = array("groupIds" => "1,2,3,4");
        //在类中调用自身方法
        self::getSalesGroupListByCondition([], ['groupId' => explode(',', $rule['groupIds'])]);
    }


}

$my = new DbService();
$my->todo();


//这里为了测试一下，在函数定义的时候如果都给了默认值，在调用的时候，可以不传参
//$my->getSalesGroupListByCondition([], ['groupId' => explode(',', $rule['groupIds'])]);

