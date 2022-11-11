<?php

class IndexService
{
    public static function test()
    {
        if (2 > 1) {
            $cid = "1211221";
        }
        if (2 < 1) {
            $cid = "12112211111111";
        }
        echo $cid;
    }
}

$indexSer = new IndexService();
$indexSer::test();