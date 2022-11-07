<?php

include "template_util.php";

class CommonUtil
{
    public static function throw_exception($key, $values = [])
    {
        $msg = TemplateUtil::parseTemplate($key[1], $values);
        throw new Exception($msg, $key[0]);
    }

    public static function throw_exception_with_code_msg($code, $msg)
    {
        throw new Exception($msg, $code);
    }

    public static function make_suc($data = [])
    {
        return ['code' => 0, 'msg' => 'ok', 'data' => $data];
    }

    public static function make_suc_with_extra_data($data = [], $extraData = [])
    {
        return array_merge(['code' => 0, 'msg' => 'ok', 'data' => $data], $extraData);
    }

    public static function make_ret($key, $values = [], $returnValue = 0 )
    {
        $msg = TemplateUtil::parseTemplate($key[1], $values);
        return ['code' => $key[0], 'msg' => $msg, 'returnValue'=>$returnValue];
    }

    public static function make_ret_with_extra_data($key, $values = [], $returnValue = 0, $extraData = [])
    {
        $msg = TemplateUtil::parseTemplate($key[1], $values);
        return array_merge(['code' => $key[0], 'msg' => $msg, 'returnValue'=>$returnValue], $extraData);
    }

    public static function make_error_with_data($key, $values = [], $data = [] , $returnValue = 0 )
    {
        $msg = TemplateUtil::parseTemplate($key[1], $values);
        return ['code' => $key[0], 'msg' => $msg, "data" => $data , 'returnValue'=>$returnValue ];
    }

    public static function check_suc($data)
    {
        if (isset($data['code']) && 0 === $data['code']) {
            return true;
        } else {
            return false;
        }
    }

    public static function getHitProbabilityKey($rates = [])
    {
        if (empty($rates)) {
            return '';
        }
        $totals = 0;
        $maxWeight = 10000; // 最大权重,防止命中率不均衡
        asort($rates);
        foreach ($rates as $key => $rate) {
            $rate = $maxWeight * ($rate / 100);
            $totals += $rate;
            $rates[$key] = $rate;
        }
        $rateSections = [];
        $randPoint = mt_rand(1, $totals); // 命中权重
        foreach ($rates as $key => $rate) {
            $rateSections[$key] = [$totals, $totals-$rate+1];//加1防止命中双边缘
            $totals -= $rate;
        }
        foreach ($rateSections as $key => $rateSection) {
            if ($randPoint <= $rateSection[0] && $randPoint >= $rateSection[1]) {
                return $key;
            }
        }
    }

    public static function isContinuous($arr)
    {
        $flag = false;
        if (empty($arr)) {
            return $flag;
        }
        ksort($arr);
        $timeSlotMapKey = array_values($arr);
        for ($i = 0; $i < count($timeSlotMapKey); $i+=2) {
            if ($timeSlotMapKey[$i] != $timeSlotMapKey[$i + 1]) {
                return $flag = true;  //如果不连续则有交集
            }
        }
        return $flag;
    }
}