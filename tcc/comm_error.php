<?php
class CommError {
	//以下错误是兼容以前的错误
	public static $EC_OK = array(0, 'OK');
	public static $EC_ENV_ERROR_VALUE = array(1,'env error:${msg}');	//表示系统错误
	public static $EC_LOGIC_ERROR_VALUE = array(2,'logic error:${msg}'); //表示系统正常，逻辑错误
	public static $PARAM_ERROR = array(9003,'param error:${msg}');
    public static $AUTHORITY_ERROR = array(9004,'auth error:${msg}');//表示权限错误

	//100001 - 100100  http基础错误
	public static $EC_HTTP_URL_ERROR = array(100001,'sys_err:url error');
    public static $EC_HTTP_DATA_ERROR = array(100002,'sys_err:http data error');
	public static $EC_HTTP_CONN_ERROR = array(100003,'sys_err:http error');
    public static $EC_HTTP_REQUEST_ERROR = array(100004,'sys_err:http request error');
	public static $EC_DB_ERROR = array(1100, 'DB operation exception! | ${errMsg}');

    // cgw  | cauth 的参数错误返回码
	public static $EC_CGW_INVALID_INPUT = array(9003, 'invalid input | ${errMsg}');
    public static $EC_CAUTH_INVALID_INPUT = array(1000, 'invalid input | ${errMsg}');
    public static $EC_PARAMS_ERROR_NOT_INT = array(11030, 'invalid input | not int (${para})');
    public static $EC_PARAMS_ERROR_NOT_STRING = array(11030, 'invalid input | not string (${para})');

	//100101 - 100200 db错误
	public static $EC_DB_ESCAPE_ERROR   = array(100101,'escape type should be num or string;not be ${type}');
	public static $EC_DB_WHERE_NOEMPTY  = array(100102,'where empty');
	public static $EC_DB_FIELD_NOEMPTY  = array(100103,'field empty');
	public static $EC_DB_TABLE_NOEMPTY  = array(100104,'table empty');
	public static $EC_DB_SET_NOEMPTY    = array(100105,'set empty');
	public static $EC_DB_CONN_ERR       = array(100106,'sys_err:connect db error');
    public static $EC_DB_CONN_ERR_SWOOLE= array(100106,'sys_err: SW connect db error');
    public static $EC_DB_CONN_OUT_OF_RANGE = array(100106,'sys_err:db connect is full');
    public static $EC_DB_OTHER_ERR      = array(100107, 'sys_err:query error');
	
	//100201 - 100300 内部的一些通用错误
	public static $SERVICE_MISS = array(100201,'unknown service:${service}');
	public static $NOT_ARRAY_ERR = array(100202,'${type}不是数组');
	public static $INVALID_INPUT = array(100203, 'invalid input | ${errMsg}');

    //公共返回码定义
    public static $PARAM_INVALID = array(2001,'参数错误:${msg}');
    public static $PERMISSION_DENY = array(2022,'权限错误:${msg}');
    public static $E_CONFIG_ERROR = array(-1011,'配置错误:${msg}');
    public static $E_ROUTE = array(-1003,'路由或网络错误');
    public static $E_HTTP = array(-1004,'HTTP请求错误');
    public static $E_DATA_FORMAT_ERROR = array(-1017,'返回包错误');
    public static $DB_KEYWORDS_ERROR = array(-1012,'sql关键词错误:${msg}');
    public static $DB_CONNECT_ERROR = array(-1013,'数据库链接错误:${msg}');
    public static $DB_CONNECT_ERROR_SWOOLE = array(-1013,'swoole 链接错误');
    public static $INTERFACE_INVALID = array(2002,'请求接口错误');
    public static $PARAM_FORMAT_ERROR = array(2000,'请求格式不规范,如不是数组或者无效输入');
    public static $DB_EXEC_ERROR = array(-1014,'数据库执行错误:${msg}');
    public static $E_UNKNOWN = array(-1000,'未知错误:${msg}');

	
	const EC_OK 								= 0;
	const EC_ENV_ERROR_VALUE                    = 1; // 环境错误value返回值
	const EC_LOGIC_ERROR_VALUE                  = 2; // 逻辑错误value返回值

    //数据库错误code
    const DB_ERROR_CODE = [
        'EXEC_CODE' => [
            1048, //字段不能为空。
            1054, //字段不存在或程序文件与数据库有冲突。
            1062, //字段值重复，入库失败。
            1064, //MySQL 不支持错误提示中的编码。
            1065, //无效的SQL 语句，SQL 语句为空。
            1116, //打开的数据表太多。
            1149, //SQL 语句语法错误。
            1169, //字段值重复，更新记录失败。
            1060, //字段重复，导致无法插入这个字段。
            1292, //字段值不正确
        ],
        'KEYWORDS_ERROR' => [
            1022, //关键字重复，更改记录失败。
            110, //执行超时
        ],
        'CONNECT_ERROR' => [
            130, //文件格式不正确，可以尝试使用repair.php 来修复，如果不行就只能恢复相关的数据了。
            145, //文件无法打开，使用repair.php 修复。
            1005, //创建表失败。
            1006, //创建数据库失败。
            1007, //数据库已存在，创建数据库失败。
            1008, //数据库不存在，删除数据库失败。
            1009, //不能删除数据库文件而导致删除数据库失败。
            1010, //不能删除数据目录而导致删除数据库失败。
            1011, //删除数据库文件失败。
            1012, //不能读取系统表中的记录。
            1016, //文件无法打开，使用后台修复或者使用phpMyAdmin 进行修复。
            1017, //服务器非法关机，导致该文件损坏。
            1020, //记录已被其他用户修改。
            1021, //硬盘剩余空间不足，需加大硬盘可用空间。
            1023, //关闭时发生错误。
            1024, //读文件错误。
            1025, //更改名字时发生错误。
            1026, //写文件错误。
            1030, //可能是服务器不稳定。
            1036, //数据表是只读的，不能对它进行修改。
            1037, //系统内存不足，需重启数据库或重启服务器。
            1038, //用于排序的内存不足，需增大排序缓冲区。
            1040, //已到达数据库的最大连接数，需加大数据库可用连接数。
            1041, //系统内存不足。
            1042, //无效的主机名。
            1043, //无效连接。
            1044, //数据库用户权限不足，需联系空间商解决。
            1045, //数据库服务器/数据库用户名/数据库名/数据库密码错误，需联系空间商检查账户。
            1046, //没有选择数据库。
            1049, //数据库不存在。
            1050, //数据表已存在。
            1051, //数据表不存在。
            1081, //不能建立Socket 连接。
            1114, //数据表已满，不能容纳任何记录。
            1115, //设置的字符集在MySQL 并没有支持。
            1129, //数据库出现异常，需重启数据库。
            1130, //连接数据库失败，没有连接数据库的权限。
            1133, //数据库用户不存在。
            1135, //可能是内存不足够，需联系空间商解决。
            1141, //当前用户无权访问数据库。
            1142, //当前用户无权访问数据表。
            1143, //当前用户无权访问数据表中的字段。
            1146, //数据表缺失，需恢复备份数据。
            1147, //未定义用户对数据表的访问权限。
            1177, //打开数据表失败。
            1180, //提交事务失败。
            1181, //回滚事务失败。
            1193, //不支持字符集限定(SET NAMES)。
            1203, //当前用户和数据库建立的连接已到达数据库的最大连接数，需增大可用的数据库连接数或重启数据库。
            1205, //加锁超时。
            1211, //当前用户没有创建用户的权限。
            1267, //不合法的混合字符集。
            2002, //服务器端口不正确，需咨询空间商以获取正确的端口。
            2003, //MySQL 服务未启动，需启动该服务。
            2013, //远程连接数据库有时会出现这个问题，是MySQL 服务器在执行一条SQL 语句时失去了连接造成的。
        ],
    ];
}