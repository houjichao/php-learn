<?php


class ParamTest
{

    public static function getHitProbabilityKey($rates = [])
    {
        if (empty($rates)) {
            return '';
        }
        $totals = 0;
        $maxWeight = 10000; // 最大权重,防止命中率不均衡
        asort($rates);
        foreach ($rates as $key => $rate) {
            print_r("```````".$rate."```````");
            $rate = $maxWeight * ($rate / 100);
            print_r("```````".$rate."```````");
            $totals += $rate;
            $rates[$key] = $rate;
        }
        $rateSections = [];
        $randPoint = mt_rand(1, $totals); // 命中权重
        foreach ($rates as $key => $rate) {
            $rateSections[$key] = [$totals, $totals - $rate + 1];//加1防止命中双边缘
            $totals -= $rate;
        }
        print_r("----------");
        print_r($rateSections);
        print_r("---------");
        foreach ($rateSections as $key => $rateSection) {
            if ($randPoint <= $rateSection[0] && $randPoint >= $rateSection[1]) {
                return $key;
            }
        }
    }

}


$paramTest = new ParamTest();
$rates = [10001 => 10, 10002 => 20, 10003 => 30, 10004 => 40];
var_dump($rates);
$request = $paramTest::getHitProbabilityKey($rates);
echo "-----asndjklashkda---";
echo $request;