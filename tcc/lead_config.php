<?php
class LeadConfig
{
    const TOUCH_STATUS = [
        0 => '待跟进',
        1 => '待销售组转化',
//        2 => '待大客户转化',
        3 => '待ISV转化',
        4 => '待广点通渠道转化',
        5 => '待腾讯云转化',
        6 => '待渠道转化',
        self::TOUCH_DONE => '赢单',
        self::TOUCH_GIVEUP => '弃单',
        self::TOUCH_AFTER_SALE => '待售后处理',
        self::TOUCH_NEED_COMMUNICATE => '待沟通',
        self::TOUCH_COMPLETE => '已完成',
        self::TOUCH_QSS_REPEAT => 'QSS重复单据',
    ];

    const STATUS = [
        self::NOT_HANDLE_STATUS => '未处理',
        self::HAS_ASSIGNED_STATUS => '已分配',
        self::HANDLED_STATUS => '已处理',
        self::USELESS_STATUS => '废弃',
    ];

    const NOT_HANDLE_STATUS = 0;
    const HAS_ASSIGNED_STATUS = 1;
    const USELESS_STATUS = 2;
    const HANDLED_STATUS = 3;
    const DELETE_STATUS = -1;

    //触达状态常量
    const TOUCH_DONE = 7;
    const TOUCH_GIVEUP = 8;
    const TOUCH_AFTER_SALE = 9;
    const TOUCH_NEED_COMMUNICATE = 10;
    const TOUCH_COMPLETE = 11;
    const TOUCH_QSS_REPEAT = 12;

    const LEAD_ORDER_BY_TRANS_MAP = [
        'leadAssignTime' => 'l.leadAssignTime',
        'leadCreateTime' => 'l.createTime',
    ];

    const LEAD_ORDER_BY_ES_MAP = [
        'leadAssignTime' => 'lead_leadAssignTime',
        'leadCreateTime' => 'lead_createTime'
    ];

    //线索执行动作
    const EXECUTE_ACTION = [
        'ASSIGN' => 0,//分配
        'RECOVER' => 1,//回收
    ];

    const LEAD_PAY_TYPE_DEFAULT = 0;
    const LEAD_PAY_TYPE_NOT_PAYED_NO_USED = 1;
    const LEAD_PAY_TYPE_NO_PAYED_USED = 2;
    const LEAD_PAY_TYPE_PAYED = 3;

    // 付费类型
    const PAY_TYPE_MAP = [
        self::LEAD_PAY_TYPE_DEFAULT => '',
        self::LEAD_PAY_TYPE_NOT_PAYED_NO_USED => '未付费未使用',
        self::LEAD_PAY_TYPE_NO_PAYED_USED => '未付费已使用',
        self::LEAD_PAY_TYPE_PAYED => '已付费',
    ];
    const CUSTOMER_CONTACT_TYPE_AUTO = 1;

    //客户报备池类型,映射同步维表619,（1:KA清单,2:区域清单,5:svip,6:战略客户报备池中)
    const CUSTOMER_REPORT_TYPE = [1, 2, 5, 6];

    //1行业直销(KA)、2区域直销
    const MAJOR_SALES_TYPE = [
        1 => '行业直销(KA)',
        2 => '区域直销',
    ];

    //渠道无主销售
    const CHANNEL_NO_SALES_TYPE = 0;
    //主销售类型为渠道
    const SALES_TYPE_CHANNEL = 3;
    //渠道销售类型
    const CHANNEL_MAJOR_SALES_TYPE = [
        1 => '行业直销(KA)',
        2 => '区域直销',
        3 => '渠道销售',
        4 => '创投BD',
    ];

    //云api添加线索批次在2,3,15则推送cmq延迟下发
    const YUNAPI_ADD_LEAD_BatchId = [
        2, //10086-官网企业认证
        3, //10085-官网个人认证
        15, //11406-个人认证转企业例行化任务
    ];

    const ADD_LEAD_SUBMIT_TYPE = [
        'UNCLAIMED' => 0,//提交公海池
        'CLAIMED' => 1,//提及并分配
    ];

    const UIN_IS_CHANNEL = 1;

    const INTENTION_LEVEL = [
        'H' => '高',
        'M' => '中',
        'L' => '低',
    ];

    const FORCE_ASSIGN_AUTH_POINT = [
        'NOT_FORCE_ASSIGN' => 0,//没有强制下发权限
        'FORCE_ASSIGN' => 1,//有强制下发权限
    ];

    const NOTIFY_STATUS = [
        'NOT_NOTIFY' => 0,//没有通知
        'IS_NOTIFY' => 1,//已通知
    ];

    const QUERY_TYPE_DEFAULT = 'default';
    const QUERY_TYPE_AFTER_UPDATE = 'after-update';

    const AFTER_UPDATE_IN_EFFECT_KEY_PREFIX = 'lead-list-after-update-in-effect:';
}