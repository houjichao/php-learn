<?php

include "common_util.php";
include "comm_error.php";


class ParamsUtil
{
    public static function checkParams($params, $rules)
    {

        foreach ($rules as $key => $rule) {
            //是否为空
            if ((!isset($rule['is_null']) || !$rule['is_null']) && !isset($params[$key])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "{$key} is null"]);
            }

            //可为空是，取默认值
            if (isset($rule['is_null']) && $rule['is_null'] == true && !isset($params[$key])) {
                if (isset($rule['value'])) {
                    $params[$key] = $rule['value'];
                }
                continue;
            }

            //是否为空的内容
            if ((!isset($rule['is_empty']) || !$rule['is_empty']) && empty($params[$key]) && $params[$key] !== 0 && $params[$key] !== '0') {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "{$key} is empty"]);
            }

            $ret = self::checkParam($params[$key], $rule, $key);
            if ($ret['code'] != 0) {
                return $ret;
            }

            //过滤掉4字节utf8字符串，防止乱码
            if (isset($rule['type']) && $rule['type'] == 'string' && !empty($params[$key]) && isset($rule['filterUTF8mb4']) && $rule['filterUTF8mb4'] == true) {
                $params[$key] = preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $params[$key]);
            }
            // 是否需要urlencode
            if (isset($rule['need_urlencode'])  && $rule['need_urlencode'] === true) {
                $params[$key] = urlencode($params[$key]);
            }
            // 是否需要去除空白字符
            if (isset($rule['need_trim']) && $rule['need_trim'] === true) {
                $params[$key] = trim($params[$key]);
            }
            // 是否允许emoji
            if (isset($rule['allow_emoji']) && $rule['allow_emoji'] == false && self::haveEmojiChar($params[$key])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "{$key} has special character"]);
            }
        }
        print("\nutil----------extract before params\n");
        print_r($params);
        extract($params);
        print("\nutil----------extract after params\n");
        print_r($params);
        print("\nutil----------\n");
        print_r($rules);
        print("\nutil----------array_keys\n");
        print_r(array_keys($rules));

        print("\nutil----------var_dump array_keys\n");
        var_dump(array_keys($rules));
        $params = compact(array_keys($rules));
        return CommonUtil::make_suc($params);
    }


    private static function checkParam($value, $rule = [], $key = "")
    {
        $columnTypes = explode('|', $rule['type']);
        $checkResult = false;
        $failMsg = '';
        foreach ($columnTypes as  $columnType) {
            switch ($columnType) {
                case 'int' :
                    $ret = self::_checkInt($value, $rule, $key);
                    break;
                case 'bool':
                case 'boolean':
                    $ret = self::_checkBool($value, $key);
                    break;
                case 'number' :
                    $ret = self::_checkNumber($value, $rule, $key);
                    break;
                case 'string' :
                    $ret = self::_checkString($value, $rule, $key);
                    break;
                case 'array' :
                    $ret = self::_checkArray($value, $rule, $key);
                    break;
                case 'ipv4' :
                    $ret = self::_checkIP($value, $key);
                    break;
                case 'timeStamp' :
                    $ret = self::_checkTimeStamp($value, $key);
                    break;
                case 'mysqlTimeStamp' :
                    $ret = self::_checkMysqlTimeStamp($value, $key);
                    break;
                case 'float' :
                    $ret = self::_checkFloat($value, $rule, $key);
                    break;
                default :
                    $ret = CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "rule[type] {$rule['type']} is invalid."]);
            }
            if ($ret['code'] == 0) {
                $checkResult = true;
                break;
            } else {
                if (!empty($failMsg)) {
                    $failMsg .= ' or '.$ret['msg'];
                } else {
                    $failMsg .= ' '.$ret['msg'];
                }
            }
        }
        if ($checkResult) {
            return CommonUtil::make_suc();
        } else {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => $failMsg]);
        }
    }

    public static function _checkBool($value, $key)
    {
        if (!is_bool($value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not bool/boolean"]);
        }
        return CommonUtil::make_suc();
    }

    public static function _checkTimeStamp($value, $key)
    {
        if (!strtotime($value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not timeStamp"]);
        }
        return CommonUtil::make_suc();
    }

    public static function _checkMysqlTimeStamp($value, $key)
    {
        if (!DateTime::createFromFormat('Y-m-d H:i:s', $value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not mysqlTimeStamp"]);
        }
        return CommonUtil::make_suc();
    }

    public static function _checkIP($value, $key)
    {
        if (!filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" =>"value({$key}) not ip"]);
        }
        return CommonUtil::make_suc();
    }

    public static function _checkArray($value, $rule, $key)
    {
        if (!is_array($value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not array"]);
        }
        if (isset($rule['maxCount']) && count($value) > $rule['maxCount']) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) array count more than [maxCount] ({$rule['maxCount']})"]);
        }
        if (isset($rule['elementType'])) {
            foreach ($value as $element) {
                switch ($rule['elementType']) {
                    case 'int' :
                        if (!is_int($element)) {
                            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) element not int"]);
                        }
                        break;
                    case 'number' :
                        if (!is_numeric($element)) {
                            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) element not number"]);
                        }
                        break;
                    case 'string' :
                        if (!is_string($element)) {
                            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) element not string"]);
                        }
                        break;
                    case 'array' :
                        if (!is_array($element)) {
                            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) element not array"]);
                        }
                        break;
                    case 'ipv4' :
                        if (!filter_var($element, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) element not ip"]);
                        }
                        break;
                    default :
                        return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "rule[elementType] ({$rule['elementType']}) is invalid."]);
                }
            }
        }
        return CommonUtil::make_suc();
    }

    public static function _checkInt($value, $rule, $key)
    {
        if (!is_int($value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not int"]);
        }
        if (isset($rule['range'])) {
            $pattern = '/([\[\(\]\)]{1})|(\d+|~)/';
            $match = [];
            if (!preg_match_all($pattern, $rule['range'], $match) || count($match[0]) != 4) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s)", $rule['range'] . json_encode($match[0]))]);
            }

            if (!in_array($match[0][0], ['[', '('])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s)", $rule['range'] . json_encode($match[0]))]);
            }

            if (!in_array($match[0][3], [']', ')'])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s)", $rule['range'] . json_encode($match[0]))]);
            }

            $minValue = $match[0][1];
            $maxValue = $match[0][2];
            if ($match[0][0] == '[' && $value < $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }
            if ($match[0][0] == '(' && $value <= $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }
            if ($match[0][3] == ']' && $maxValue != '~' && $value > $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }
            if ($match[0][3] == ')' && $maxValue != '~' && $value >= $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

        }

        if (isset($rule['enum']) && !in_array($value, $rule['enum'])) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("value(%s) not in enum(%s)", $key, json_encode($rule['enum']))]);
        }

        return CommonUtil::make_suc();
    }

    public static function _checkFloat($value, $rule, $key)
    {
        if (!is_float($value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not float"]);
        }

        if (isset($rule['range'])) {
            $pattern = '/([\[\(\]\)]{1})|(\d+|~)/';
            $match = [];
            if (!preg_match_all($pattern, $rule['range'], $match) || count($match[0]) != 4) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s)", $rule['range'] . json_encode($match[0]))]);
            }

            if (!in_array($match[0][0], ['[', '('])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s)", $rule['range'] . json_encode($match[0]))]);
            }

            if (!in_array($match[0][3], [']', ')'])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s)", $rule['range'] . json_encode($match[0]))]);
            }

            $minValue = $match[0][1];
            $maxValue = $match[0][2];
            if ($match[0][0] == '[' && $value < $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][0] == '(' && $value <= $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][3] == ']' && $maxValue != '~' && $value > $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][3] == ')' && $maxValue != '~' && $value >= $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

        }
        if (isset($rule['decimals'])) {
            $parts = explode('.', (string)($value), 2);
            $dec = isset($parts[1]) ? strval($parts[1]) : '';
            $dec_len = strlen($dec);
            if ($dec_len != $rule['decimals'])
            {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not {$rule['decimals']} decimals"]);
            }
        }

        return CommonUtil::make_suc();
    }

    public static function _checkNumber($value, $rule, $key)
    {
        if (!is_numeric($value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not number"]);
        }

        if (isset($rule['range'])) {
            $pattern = '/([\[\(\]\)]{1})|(\d+)/';
            $match = [];
            if (!preg_match_all($pattern, $rule['range'], $match) || count($match[0]) != 4) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s).", $rule['range'] . json_encode($match[0]))]);
            }

            if (!in_array($match[0][0], ['[', '('])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s).", $rule['range'] . json_encode($match[0]))]);
            }

            if (!in_array($match[0][3], [']', ')'])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("invalid rule[range] (%s).", $rule['range'] . json_encode($match[0]))]);
            }

            $minValue = $match[0][1];
            $maxValue = $match[0][2];
            if ($match[0][0] == '[' && $value < $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][0] == '(' && $value <= $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][3] == ']' && $value > $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][3] == ')' && $value >= $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not in range({$rule['range']})"]);
            }

        }

        if (isset($rule['enum']) && !in_array($value, $rule['enum'])) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("value(%s) not in enum(%s)", $key, json_encode($rule['enum']))]);
        }

        return CommonUtil::make_suc();
    }


    public static function _checkString($value, $rule, $key)
    {
        if (!is_string($value)) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value({$key}) not string"]);
        }

        if (isset($rule['range'])) {
            $pattern = '/([\[\(\]\)]{1})|(\d+)/';
            $match = [];
            if (!preg_match_all($pattern, $rule['range'], $match) || count($match[0]) != 4) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "invalid rule[range] ({$rule['range']})"]);
            }

            if (!in_array($match[0][0], ['[', '('])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "invalid rule[range] ({$rule['range']})"]);
            }

            if (!in_array($match[0][3], [']', ')'])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "invalid rule[range] ({$rule['range']})"]);
            }

            $minValue = $match[0][1];
            $maxValue = $match[0][2];
            if ($match[0][0] == '[' && mb_strlen($value) < $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value.len({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][0] == '(' && mb_strlen($value) <= $minValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value.len({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][3] == ']' && mb_strlen($value) > $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value.len({$key}) not in range({$rule['range']})"]);
            }

            if ($match[0][3] == ')' && mb_strlen($value) >= $maxValue) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => "value.len({$key}) not in range({$rule['range']})"]);
            }

        }

        if (isset($rule['enum']) && !in_array($value, $rule['enum'])) {
            return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => sprintf("value(%s) not in enum(%s)", $key, json_encode($rule['enum']))]);
        }

        return CommonUtil::make_suc();
    }

    public static function checkExtendFormat($extend)
    {
        if (empty($extend)) {
            return CommonUtil::make_suc($extend);
        }
        foreach ($extend as $row) {
            $rule = [
                'key' => ['type' => 'string'],
                'keyName' => ['type' => 'string'],
                'keyValue' => ['type' => 'string', 'is_empty' => true],
            ];
            $ret = self::checkParams($row, $rule);
            if ($ret['code'] != 0) {
                return $ret;
            }
        }
        return CommonUtil::make_suc($extend);
    }

    public static function checkEmail($email)
    {
        if (filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    //默认对手机号和座机校验
    public static function checkPhone($phone, $type = "all")
    {
        switch (strtolower($type))
        {
            case 'all': {
                $phoneMatch = '/^((0\d{2,3}\-\d{7,8})|(1[3456789]\d{9}))$/';
                break;
            }
            case 'only_phone': {
                $phoneMatch = '/^(1[3456789]\d{9})$/';
                break;
            }
            default: {
                return false;
            }
        }
        if (preg_match($phoneMatch, $phone)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $extend  [{"key": "", "keyName": "", "keyValue": ""}]
     * @param $belongModule
     * @return array
     */
    public static function checkExtend($extend, $belongModule) {
        //检查格式
        if (empty($extend)) {
            $extend = null;
            return CommonUtil::make_suc($extend);
        }
        foreach ($extend as &$row) {
            if (!isset($row['key']) || !is_string($row['key'])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ['msg' => 'extend field \'key\' not found']);
            }
            if (!isset($row['keyName']) || !is_string($row['keyName'])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ['msg' => 'extend field \'keyName\' not found']);
            }
            if (!isset($row['keyValue'])) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ['msg' => 'extend field \'keyValue\' not found']);
            }
            $newRow =  [
                'key' => $row['key'],
                'keyName' => $row['keyName'],
                'keyValue' => $row['keyValue'],
            ];
            $row = $newRow;
        }

        //检查内容
        $extendMap = array_column($extend, null, 'key');
        $intention = $extendMap[FollowRecordFormConfig::FORM_SPECIAL_ITEM[FollowRecordFormConfig::INTENTION]] ?? null;
        $touchStatus = $extendMap[FollowRecordFormConfig::FORM_SPECIAL_ITEM[FollowRecordFormConfig::TOUCHSTATUS]] ?? null;
        if (!empty($intention)) {
            $intention = $intention['keyValue'];
        }
        if (!empty($touchStatus)) {
            $touchStatus = $touchStatus['keyValue'];
        }

        //检查意向和触达状态
        $ret = self::checkIntentionAndTouchStatus($intention, $touchStatus, $belongModule);
        if ($ret['code'] != 0) {
            return $ret;
        }

        $specialFormItem = array_keys(FollowRecordFormConfig::FORM_SPECIAL_ITEM);
        $ret = FollowFormModel::getFollowFormItemList($belongModule);
        if ($ret['code'] != 0) {
            return $ret;
        }

        $formMap = array_column($ret['data']['list'], null, 'key');

        foreach ($extend as $extendItem) {
            $key = $extendItem['key'];
            $value = $extendItem['keyValue'];

            $formItem = $formMap[$key] ?? [];
            if (empty($formItem)) {
                continue;
            }

            // 有枚举值且必填的常规表单项
            if (!in_array($formItem['type'], $specialFormItem) && $formItem['options'] != null && $formItem['isRequire']) {
                $optionValues = array_column($formItem['options'], 'optionValue');
                if (is_array($value)) {
                    $diff = array_diff($value, $optionValues);
                    if (!empty($diff)) {
                        return CommonUtil::make_ret(CommError::$PARAM_ERROR, ['msg' => 'key: '.$key.' extend的value值不在选项中']);
                    }
                } else {
                    if (!in_array($value, $optionValues)) {
                        return CommonUtil::make_ret(CommError::$PARAM_ERROR, ['msg' => 'key: '.$key.' extend的value值不在选项中']);
                    }
                }
            }
        }
        return CommonUtil::make_suc($extend);
    }

    /**
     * @param $intention array<int> [intentionParentId, intentionChildId]
     * @param $status int
     * @param $belongModule int
     * @return array
     */
    public static function checkIntentionAndTouchStatus($intention, $status, $belongModule)
    {
        if (!empty($intention)) {
            // 获取所有意向
            $ret = CustomerIntentionDimensionsModel::getCustomerIntentionFromDimensions(['belong_module' => $belongModule, 'status' => 0]);
            if ($ret['code'] != 0) {
                return $ret;
            }
            $intentionIds = [];
            $subIntentionIds = [];
            foreach ($ret['data']['list'] as $row) {
                if ($row['parent_id'] != 0) {
                    $subIntentionIds[] = $row['id'];
                } else {
                    $intentionIds[] = $row['id'];
                }
            }

            if (!is_array($intention) || count($intention) < 2) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ['msg' => 'intention invalid in extend']);
            }

            $parentValue = $intention[0];
            $subValue = $intention[1];
            if (!in_array($parentValue, $intentionIds)) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ['msg' => 'intention invalid in extend']);
            }
            if (!in_array($subValue, $subIntentionIds)) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ['msg' => 'intention invalid in extend']);
            }

        }


        if (!empty($status)) {
            // 获取所有触达状态
            $ret = LeadModel::getTouchStatus($belongModule);
            if ($ret['code'] != 0) {
                return $ret;
            }
            $touchStatus = $ret['data'];
            $rule = empty($touchStatus) ? [] : array_column($touchStatus, 'key');
            if (!in_array($status, $rule)) {
                return CommonUtil::make_ret(CommError::$PARAM_INVALID, ['msg' => 'touchStatus invalid in extend']);
            }
        }

        //不需要检验意向和触达状态的关系
//        if (empty($intention) || empty($status))
//            return CommonUtil::make_suc();
//
//        //校验意向和触达状态的关系
//        $ret = LeadModel::getIntentionTouchMapFromDimensions([
//            'status' => 0,
//            'intention_id' => $intention[0],
//            'touch_status_id' => $status,
//        ]);
//        if ($ret['code'] != 0) {
//            return $ret;
//        }
//        if (empty($ret['data']['list'])) {
//            return CommonUtil::make_ret(LeadError::INTENTION_TOUCH_MAP_NOT_EXIST);
//        }
        return CommonUtil::make_suc();

    }
    //获取短信模版参数
    public static function checkSmsParams($str)
    {
        $resultMap = [];
        if (count(explode('$', $str)) > 0 && strpos($str,'$') !== false) {
            $strMap = explode('$', $str);
            foreach ($strMap as $str) {
                preg_match_all("/(?:\{)(.*)(?:\})/i",$str, $ret);
                if (!isset($ret[1][0]) || empty($ret[1][0])) {
                    continue;
                }
                $resultMap[] = $ret[1][0];
            }
            foreach ($resultMap as $value) {
                if (!in_array($value,SmsConfig::SMS_PARAMS, true) && !is_numeric($value)) {
                    return false;
                }
            }
        }
        return true;
    }
    //检查模版是否含有配置参数
    public static function checkSmsContentExistParams($str)
    {
        $resultMap = [];
        if (count(explode('$', $str)) > 0 && strpos($str,'$') !== false) {
            $strMap = explode('$', $str);
            foreach ($strMap as $str) {
                preg_match_all("/(?:\{)(.*)(?:\})/i",$str, $ret);
                if (!isset($ret[1][0]) || empty($ret[1][0])) {
                    continue;
                }
                $resultMap[] = $ret[1][0];
            }
            $resultMap = array_filter($resultMap, function ($v) {
                return in_array($v,SmsConfig::SMS_PARAMS, true);
            });
        }
        return $resultMap;
    }

    public static function haveEmojiChar($str)
    {
        $mbLen = mb_strlen($str);

        $strArr = [];
        $flag = false;
        for ($i = 0; $i < $mbLen; $i++) {
            $strArr[] = mb_substr($str, $i, 1, 'utf-8');
            if (strlen($strArr[$i]) >= 4) {
                $flag = true;
                break;
            }
        }
        return $flag;
    }

    public static function adaptStringAndArray($params, $key, $type)
    {
        if ($type == 'string') {
            if (isset($params[$key])) {
                if (!is_array($params[$key]) && !is_string($params[$key])) {
                    return CommonUtil::make_ret(CommError::$PARAM_INVALID, ["msg" => $key . " is not string or array"]);
                }
                return is_array($params[$key]) ? $params[$key] : [$params[$key]];
            }
        }
    }

}
