<?php

define('MAX_STR_LEN', 1000000);//最大字串长度
define('MAX_INT', 2147483647);//最大整数
define('MIN_INT', -2147483648);//最小整数
define('HexString', 1);    //0-9 a-f A-F
define('LowHexString', 2);
define('UpperHexString', 3);
define('DigistString', 4);
define('AlphaString', 5);// a-z A-Z
define('ALnumString', 6);//a-z A-Z 0-9
define('UinString', 7);// a-z A-Z 0-9 _ 用户ID
define('EmailString', 8);///^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/ email
define('MobileString', 9);///^0?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/ mobile
define('TelString', 10);// /^([0-9]{3,4}-)?[0-9]{7,8}$/ telephone
class StringUtil
{
    public static function isStrValid($str, $type)
    {
        $ret = false;
        switch ($type) {
            case HexString:
                $ret = preg_match('/^[0-9a-fA-F]*$/', $str);
                break;
            case LowHexString:
                $ret = preg_match('/^[0-9a-f]*$/', $str);
                break;
            case UpperHexString:
                $ret = preg_match('/^[0-9A-F]*$/', $str);
                break;
            case DigistString:
                $ret = preg_match('/^[0-9]*$/', $str);
                break;
            case AlphaString:
                $ret = preg_match('/^[a-zA-Z]*$/', $str);
                break;
            case ALnumString:
                $ret = preg_match('/^[a-zA-Z0-9]*$/', $str);
                break;
            case UinString:
                $ret = preg_match('/^[a-zA-Z0-9][a-zA-Z0-9_]*$/', $str);
                break;
            case EmailString:
                $ret = preg_match('/^(\w)+(\.\w+)*(\-\w+)*@(\w)+((\.\w+)+)$/', $str);
                break;
            case MobileString:
                $ret = preg_match('/^0?(10[0-9]|13[0-9]|15[0-9]|17[0-9]|18[0-9]|14[0-9])[0-9]{8}$/', $str);
                break;
            case TelString:
                $ret = preg_match('/^[0-9]{3,4}-[0-9]{7,8}$/', $str);
                break;
            default:
                BaseError::throw_exception(CommError::$SYSTEM_ERROR, array('msg' => "string type valid"));
        }
        return $ret;

    }

    public static function validStr($str, $type)
    {
        if (!StringUtil::isStrValid($str, $type)) {
            BaseError::throw_exception(OtherError::$STRING_FORMAT_ERR, array('str' => $str, 'type' => $type));
        }
    }

    /*
     * 是否为整数,
     * 32位机器 支持 -2147483648 至2147483647L 整数
     * 64位机器支持 -9223372036854775807 至 9223372036854775807
     */
    public static function isInt($str)
    {
        if (is_int($str)) {
            return true;
        }
        if (!is_string($str)) {//非字符串
            return false;
        }

        $index = 0;
        $len = strlen($str);
        $positive_flag = true;//
        if ($len > 0 && $str[0] == '-') {
            $positive_flag = false;
            $index++;
            if (!ctype_digit(substr($str, 1))) {
                return false;
            }
        } else if ($len > 0 && $str[0] == '+') {
            $index++;
            if (!ctype_digit(substr($str, 1))) {
                return false;
            }
        } else {
            if (!ctype_digit($str)) {
                return false;
            }
        }

        //去掉前导0
        while ($index < $len && $str[$index] == '0') {
            $index++;
        }
        if ($index == $len) {//全部是0
            return true;
        }

        if (PHP_INT_SIZE == 4) {
            //2147483647L
            if ($len - $index < 10) {
                return true;
            }
            if ($len - $index > 10) {
                return false;
            }

            if ($positive_flag) {
                if ($index > 0) {
                    return strcmp(substr($str, $index), '2147483647') <= 0;
                } else {
                    return strcmp($str, '2147483647') <= 0;
                }
            } else {
                if ($index > 0) {
                    return strcmp(substr($str, $index), '2147483648') <= 0;
                } else {
                    return strcmp($str, '2147483648') <= 0;
                }
            }
        }
        if (PHP_INT_SIZE == 8) {
            //9223372036854775807
            if ($len - $index < 19) {
                return true;
            }
            if ($len - $index > 19) {
                return false;
            }

            if ($positive_flag) {
                if ($index > 0) {
                    return strcmp(substr($str, $index), '9223372036854775807') <= 0;
                } else {
                    return strcmp($str, '9223372036854775807') <= 0;
                }
            } else {
                if ($index > 0) {
                    return strcmp(substr($str, $index), '9223372036854775807') <= 0;
                } else {
                    return strcmp($str, '9223372036854775807') <= 0;
                }
            }
        } else {
            //这里不可能
            return false;
        }
    }

    /*
     * 转化为整数
     */
    public static function toInt($str)
    {
        if (StringUtil::isInt($str)) {
            return intval($str);
        } else {
            BaseError::throw_exception(OtherError::$NOT_INT_ERR, array('str' => $str));
        }
    }

    /*
     * 转化为str
     *
     * */
    public static function toString($str)
    {
        return strval($str);
    }

    /*
     * 数组序列化
     */
    public static function array2string($x, $minLen = 0, $maxLen = PHP_INT_MAX, $strType = 0)
    {
        if (is_array($x)) {
            if (count($x) === 0) {
                return '';
            }
            $origin_serialize_precision = ini_get('serialize_precision');
            ini_set('serialize_precision', 16);
            $value = json_encode($x, JSON_UNESCAPED_UNICODE);
            ini_set('serialize_precision', $origin_serialize_precision);
            if (!$value) {
                BaseError::throw_exception(OtherError::$NOT_UTF8, array('value' => '可能存在字符编码不一致问题'));
            }
            if ($minLen === 0 && $maxLen === PHP_INT_MAX) {
                return $value;
            }

            $len = mb_strlen($value, "UTF8");
            if ($len < $minLen || $len > $maxLen) {
                //$error = sprintf("array2string'value:(%s):length should be bettwen (%d)(%d)",$value,$minLen,$maxLen);
                BaseError::throw_exception(OtherError::$ARRAY_TO_STRING_LEN_ERR, array('value' => $value, 'minLen' => $minLen, 'maxLen' => $maxLen));
            }
            if ($strType) {
                StringUtil::validStr($value, $strType);
            }
            return $value;
        } else {
            BaseError::throw_exception(OtherError::$NOT_ARRAY_ERR, array('type' => gettype($x)));
        }
    }

    /*
     * 数组序列化
     * objectArray2string与array2string不同之处：
     * array2string			转化普通数组		array('0'=>'0','1'=>'5','2'=>'8') => ["0","5","8"]
     * objectArray2string	转化普通数组		array('0'=>'0','1'=>'5','2'=>'8') => {"0":"0","1":"5","2":"8"}
     */
    public static function objectArray2string($x, $minLen = 0, $maxLen = PHP_INT_MAX, $strType = 0)
    {
        if (is_array($x)) {
            if (count($x) === 0) {
                return '';
            }
            $value = json_encode((object)$x, JSON_UNESCAPED_UNICODE);
            if ($minLen === 0 && $maxLen === PHP_INT_MAX) {
                return $value;
            }

            $len = mb_strlen($value, "UTF8");
            if ($len < $minLen || $len > $maxLen) {
                //$error = sprintf("array2string'value:(%s):length should be bettwen (%d)(%d)",$value,$minLen,$maxLen);
                BaseError::throw_exception(OtherError::$ARRAY_TO_STRING_LEN_ERR, array('value' => $value, 'minLen' => $minLen, 'maxLen' => $maxLen));
            }
            if ($strType) {
                StringUtil::validStr($value, $strType);
            }
            return $value;
        } else {
            BaseError::throw_exception(OtherError::$NOT_ARRAY_ERR, array('type' => gettype($x)));
        }

    }

    public static function string2array($x)
    {
        if ($x == NULL || $x == "") {//先做兼容处理
            return array();
        }

        return json_decode($x, True);
    }


    /*
     * 向上取整数
     */
    public static function divUpper($num, $div)
    {
        $div = StringUtil::toInt($div);
        if ($div == 0) {
            BaseError::throw_exception(OtherError::$DIV_ERR);
        }
        if (is_int($num) || ctype_digit($num)) {
            $num = StringUtil::toInt($num);
            if ($num % $div) {
                return ($num - $num % $div) / $div + 1;
            } else {
                return $num / $div;
            }
        } else {
            //$error = sprintf("(%s)not int type:(%s)",$num,gettype($num));
            BaseError::throw_exception(OtherError::$NOT_INT_ERR, array('type' => gettype($num)));
        }
    }

    /*
     * 整除
     */
    public static function div($num, $div)
    {
        $div = StringUtil::toInt($div);
        if ($div == 0) {
            BaseError::throw_exception(OtherError::$DIV_ERR);
        }
        if (is_int($num) || ctype_digit($num)) {
            $num = StringUtil::toInt($num);
            if ($num % $div) {
                return ($num - $num % $div) / $div;
            } else {
                return $num / $div;
            }
        } else {
            //$error = sprintf("(%s)not int type:(%s)",$num,gettype($num));
            BaseError::throw_exception(OtherError::$NOT_INT_ERR, array('str' => $num));
        }
    }

    /*
     * 默认值 为空
     */
    public static function getParam($set, $key)
    {
        if (null === $set) {
            BaseError::throw_exception(OtherError::$PARAM_SET_EMPTY);
        }
        if (!is_array($set)) {
            BaseError::throw_exception(OtherError::$PARAM_SET_NOT_ARRAY);
        }
        if (null === $key) {
            BaseError::throw_exception(OtherError::$PARAM_SET_EMPTY);
        }
        if (array_key_exists($key, $set)) {
            return $set[$key];
        } else {
            return '';
        }
    }

    /*
     * 获取字符串参数
     * 如果值不存在默认值 为空
     */
    public static function getStrParam($set, $key, $minLen = 0, $maxLen = PHP_INT_MAX, $strType = 0)
    {
        $value = StringUtil::getParam($set, $key);

        if (is_int($value) || is_float($value)) {
            $value = strval($value);
        } else if (!is_string($value)) {
            BaseError::throw_exception(OtherError::$UNSUPPORT_TYPE, array('key' => $key, 'type' => gettype($value)));
        }
        $len = mb_strlen($value, "UTF8");
        if ($len < $minLen || $len > $maxLen) {
            BaseError::throw_exception(OtherError::$STRING_LEN_ERR, array('key' => $key, 'value' => $value, 'minLen' => $minLen, 'maxLen' => $maxLen));
        }
        if ($strType) {
            StringUtil::validStr($value, $strType);
        }
        return $value;
    }

    /*
     * 字符串参数是否合法
     * 不存在认为不合法
     */
    public static function isStrParamValid($set, $key, $minLen = 0, $maxLen = PHP_INT_MAX, $strType = 0)
    {
        if (null === $set) {
            BaseError::throw_exception(OtherError::$PARAM_SET_EMPTY);
        }
        if (null === $key) {
            BaseError::throw_exception(OtherError::$PARAM_SET_EMPTY);
        }
        if (!array_key_exists($key, $set)) {
            return false;
        }
        $value = $set[$key];

        if (is_int($value)) {
            $value = strval($value);//数字兼容处理
        } else if (!is_string($value)) {
            return false;//
        }
        $len = mb_strlen($value, "UTF8");
        if ($len < $minLen || $len > $maxLen) {//长度不正确
            return false;
        }
        if ($strType) {
            return StringUtil::isStrValid($value, $strType);
        }
        return true;
    }

    /*
     * 获取数字参数
     * 如果值不存在默认值 为0
     */
    public static function getIntParam($set, $key, $min = 0, $max = PHP_INT_MAX)
    {
        $value = StringUtil::getParam($set, $key);
        if (is_string($value)) {//字符串处理
            if (StringUtil::isInt($value)) {
                $value = StringUtil::toInt($value);
            } else if (empty($value)) {
                $value = 0;
            } else {
                //$error = sprintf("(%s):value:(%s):should be int",$key,$value);
                BaseError::throw_exception(OtherError::$NOT_INT_ERR, array('str' => $key));
            }
        } else if (is_int($value)) {
            //do nothing
        } else {
            BaseError::throw_exception(OtherError::$UNSUPPORT_TYPE, array('key' => $key, 'type' => gettype($key)));
        }
        if ($value < $min || $value > $max) {
            //$error = sprintf("(%s):value:(%s):should be bettwen (%d)(%d)",$key,$value,$min,$max);
            BaseError::throw_exception(OtherError::$INT_NUN_ERR, array('key' => $key, 'value' => $value, 'min' => $min, 'max' => $max));
        }
        return $value;
    }

    /*
     * 数字参数是否合法
     * 不存在或为空认为不合法
     */
    public static function isIntParamValid($set, $key, $min = 0, $max = PHP_INT_MAX)
    {
        if (null === $set) {
            BaseError::throw_exception(OtherError::$PARAM_SET_EMPTY);
        }
        if (null === $key) {
            BaseError::throw_exception(OtherError::$PARAM_SET_EMPTY);
        }
        if (!array_key_exists($key, $set)) {
            return false;
        }
        $value = $set[$key];

        if (is_string($value)) {//字符串处理
            if (StringUtil::isInt($value)) {
                $value = StringUtil::toInt($value);
            } else {
                return false;//非数字
            }
        } else if (is_int($value)) {
            //do nothing
        } else {
            return false;//非数字
        }
        if ($value < $min || $value > $max) {
            return false;//数字范围不合法
        }
        return true;
    }

    public static function getArrayParam($set, $key, $type = '')
    {
        $value = StringUtil::getParam($set, $key);
        if (is_array($value)) {
            //do nothing
        } else if (empty($value)) {
            $value = array();
        } else {
            //$error = sprintf("(%s):value:(%s):should be array not ".gettype($value),$key,$value);
            BaseError::throw_exception(OtherError::$NOT_ARRAY_ERR, array('type' => $key));
        }

        $func = '';
        switch ($type) {
            case 'int' :
                $func = "is_numeric";
                break;
            case 'string' :
                $func = "is_string";
                break;
            case 'array' :
                $func = "is_array";
                break;
            default :
                $func = '';
        }

        if (empty($func)) {
            return $value;
        }

        foreach ($value as $v) {
            if (false === $func($v)) {
                BaseError::throw_exception(OtherError::$NOT_ARRAY_ERR, array('type' => $key));
            }
        }

        return $value;
    }


    public static function isValidCreditId($credit_type, $credit_id)
    {
        if ($credit_type == 1) {
            if (strlen($credit_id) != 18) {
                return false;
            }
            $sum = 0;
            $w = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            for ($i = 0; $i < 17; $i++) {
                if ($credit_id[$i] < '0' || $credit_id[$i] > '9') {
                    return false;
                }
                $sum += (ord($credit_id[$i]) - ord('0')) * $w[$i];
            }
            $sum %= 11;
            $v = array(1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2);
            $check = $v[$sum];
            if ($check == 10) {
                if ($credit_id[17] != 'x' && $credit_id[17] != 'X') {
                    return false;
                }
            } else {
                if (ord($credit_id[17]) - ord('0') != $check) {
                    return false;
                }
            }
            //判断生日
            $year = (int)substr($credit_id, 6, 4);
            $mon = (int)substr($credit_id, 10, 2);
            $day = (int)substr($credit_id, 12, 2);
            if (!DateUtil::isValidDate($year, $mon, $day)) {
                return false;
            }
            return true;
        } else {
            if (empty($credit_id)) {
                return false;
            } else {
                return true;
            }
        }
    }

    /**
     * 在字符串的特定位置之前插入字符串
     * @param $str 被插的串
     * @param $insert 要插的串
     * @param $index 插入的位置
     * @return 生成的新串
     */
    public static function insert($str, $insert, $index)
    {
        if ($index < 0) {
            BaseError::throw_exception(OtherError::$POS_INT_ERR);
        }
        $sub_str1 = substr($str, 0, $index);
        $sub_str2 = substr($str, $index);
        return $sub_str1 . $insert . $sub_str2;
    }

    /**
     * 人民币数字转大写
     *
     * @param string $number 数值
     * @param string $int_unit 币种单位，默认"元"，有的需求可能为"圆"
     * @param bool $is_round 是否对小数进行四舍五入
     * @param bool $is_extra_zero 是否对整数部分以0结尾，小数存在的数字附加0,比如1960.30，
     *             有的系统要求输出"壹仟玖佰陆拾元零叁角"，实际上"壹仟玖佰陆拾元叁角"也是对的
     * @return string
     */
    public static function num2rmb($number = 0, $int_unit = '元', $is_round = TRUE, $is_extra_zero = FALSE)
    {
        //将数字切分成两段
        $parts = explode('.', floatval($number), 2);
        $int = isset($parts[0]) ? strval($parts[0]) : '0';
        $dec = isset($parts[1]) ? strval($parts[1]) : '';

        //如果小数点后多于2位，不四舍五入就直接截，否则就处理
        $dec_len = strlen($dec);
        if (isset($parts[1]) && $dec_len > 2) {
            $dec = $is_round ? substr(strrchr(strval(round(floatval("0." . $dec), 2)), '.'), 1) : substr($parts[1], 0, 2);
        }

        //当number为0.001时，小数点后的金额为0元
        if (empty($int) && empty($dec)) {
            return '零';
        }

        //定义
        $chs = array('0', '壹', '贰', '叁', '肆', '伍', '陆', '柒', '捌', '玖');
        $uni = array('', '拾', '佰', '仟');
        $dec_uni = array('角', '分');
        $exp = array('', '万');
        $res = '';

        // 整数部分从右向左找
        for ($i = strlen($int) - 1, $k = 0; $i >= 0; $k++) {
            $str = '';
            // 按照中文读写习惯，每4个字为一段进行转化，i一直在减
            for ($j = 0; $j < 4 && $i >= 0; $j++, $i--) {
                $u = $int{$i} > 0 ? $uni[$j] : ''; // 非0的数字后面添加单位
                $str = $chs[$int{$i}] . $u . $str;
            }
            //echo $str."|".($k - 2)."<br>";
            $str = rtrim($str, '0');// 去掉末尾的0
            $str = preg_replace("/0+/", "零", $str); // 替换多个连续的0
            if (!isset($exp[$k])) {
                $exp[$k] = $exp[$k - 2] . '亿'; // 构建单位
            }
            $u2 = $str != '' ? $exp[$k] : '';
            $res = $str . $u2 . $res;
        }

        // 如果小数部分处理完之后是00，需要处理下
        $dec = rtrim($dec, '0');

        // 小数部分从左向右找
        if (!empty($dec)) {
            $res .= $int_unit;
            // 是否要在整数部分以0结尾的数字后附加0，有的系统有这要求
            if ($is_extra_zero) {
                if (substr($int, -1) === '0') {
                    $res .= '零';
                }
            }

            for ($i = 0, $cnt = strlen($dec); $i < $cnt; $i++) {
                $u = $dec{$i} > 0 ? $dec_uni[$i] : ''; // 非0的数字后面添加单位
                $res .= $chs[$dec{$i}] . $u;
            }
            $res = rtrim($res, '0');// 去掉末尾的0
            $res = preg_replace("/0+/", "零", $res); // 替换多个连续的0
        } else {
            $res .= $int_unit . '整';
        }
        return $res;
    }

    /**
     * 判断名字是否符合规则
     */
    public static function isNameStr($name)
    {
        // FIXME 耦合性太大 后续要优化
        if (defined("NAME_MOCK")) {//测试桩
            return true;
        }
        if (!self::isUtf8($name)) {
            return false;
        }
        if (!preg_match("/^[\x{4e00}-\x{9fa5}\x{3400}-\x{4dff}\x{20000}-\x{2a6df}·]+$/u", $name)) {
            return false;
        }
        return true;
    }

    /**
     * 判断是否是utf8格式
     */
    public static function isUtf8($str)
    {
        $pos = 0;
        $total_len = strlen($str);
        while ($pos < $total_len) {
            $ch = ord($str[$pos]) & 0xFF;
            if ($ch < 128) {//一个字符
                $tmp_len = 1;
            } else if ($ch < 0xE0) {//两个字
                $tmp_len = 2;
            } else if ($ch < 0xF0) {//三个字
                $tmp_len = 3;
            } else if ($ch < 0xF8) {//4个字符
                $tmp_len = 4;
            } else if ($ch < 0xFC) {//5个字符
                $tmp_len = 5;
            } else if ($ch < 0xFE) {//6个字符
                $tmp_len = 6;
            } else {
                return false;
            }
            $pos += $tmp_len;
        }
        return true;
    }

    /**
     * 替换字符串
     */
    public static function msubstr($str, $start, $length = '', $prefix = '*')
    {
        $strlen = mb_strlen($str);
        $pre = '';

        if ($length != '') {
            for ($i = 0; $i < $length; $i++) {
                $pre .= $prefix;
            }
            $str = mb_substr($str, 0, $start) . $pre . mb_substr($str, $start + $length);
        } else {
            for ($i = 0; $i < $strlen - $start; $i++) {
                $pre .= $prefix;
            }
            $str = mb_substr($str, 0, $start) . $pre;
        }

        return $str;
    }

    /**
     * 生成密码（包含大写字母，小写字母，数字，特殊字符）
     * @param 生成密码长度 length，不少于6位
     */
    public static function gen_passwd($length)
    {
        if ($length < 6) {
            return false;
        }

        $temp_passwd = '';
        $gen_passwd_base = array('ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz', '0123456789', '~!@#$%^&*()_');

        $temp_passwd .= $gen_passwd_base[0][mt_rand(0, 25)];
        $temp_passwd .= $gen_passwd_base[1][mt_rand(0, 25)];
        $temp_passwd .= $gen_passwd_base[2][mt_rand(0, 9)];
        $temp_passwd .= $gen_passwd_base[3][mt_rand(0, 11)];

        for ($i = 0; $i < ($length - 4); $i++) {
            $base_index = mt_rand(1, 24) % 4;
            switch ($base_index) {
                case 0:
                    $temp_passwd .= $gen_passwd_base[$base_index][mt_rand(0, 25)];
                    break;
                case 1:
                    $temp_passwd .= $gen_passwd_base[$base_index][mt_rand(0, 25)];
                    break;
                case 2:
                    $temp_passwd .= $gen_passwd_base[$base_index][mt_rand(0, 9)];
                    break;
                case 3:
                    $temp_passwd .= $gen_passwd_base[$base_index][mt_rand(0, 11)];
                    break;
            }
        }
        return str_shuffle($temp_passwd);
    }

    //将下划线命名转换为驼峰式命名
    public static function convertUnderline($str, $ucfirst = true)
    {
        $str = ucwords(str_replace('_', ' ', $str));
        $str = str_replace(' ', '', lcfirst($str));
        if ($ucfirst) {
            $str = ucfirst($str);
        }
        return $str;
    }

    /**
     * 替换csv中特殊字符
     *
     * @param $str
     * @return mixed|string
     */
    public static function replaceCsvSpecialChars($str)
    {
        $str = strip_tags($str, "");
        $str = str_replace(",", "，", $str);
        $str = str_replace("\r", " ", $str);
        $str = str_replace("\n", " ", $str);

        return $str;
    }


    /**
     * 转换数组，将所有键由下划线式转为驼峰式
     *
     * @param array $data
     * @param bool $ucfirst 是否大驼峰式
     * @return array
     */
    public static function convertUnderlineArray($data = [], $ucfirst = false)
    {
        if (empty($data)) {
            return $data;
        }

        $ret = [];
        foreach ($data as $k => $v) {
            if (is_numeric($k)) {
                $ret[$k] = is_array($v) ? self::convertUnderlineArray($v, $ucfirst) : $v;
            } else {
                if ($ucfirst) {
                    $ret[self::convertUnderline($k)] = is_array($v) ? self::convertUnderlineArray($v, $ucfirst) : $v;
                } else {
                    $ret[lcfirst(self::convertUnderline($k))] = is_array($v) ? self::convertUnderlineArray($v, $ucfirst) : $v;
                }
            }
        }

        return $ret;
    }
}