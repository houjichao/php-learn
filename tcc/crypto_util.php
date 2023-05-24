<?php
/**
 * Created by PhpStorm.
 * User: hansonwchen
 * Date: 2019/5/7
 * Time: 17:21.
 */
class CryptoUtil
{
    private static $ver = 1;
    private static $keys = [
        'DbSPCBUqv9Jn5lHs',
        'hFV03jr5OSHKX1oE',
        'lLif6ybC9Mcgtzmn',
        'kxzcAvXwFenD85SL',
        '9kUIqarTVRQDNtJv',
        'j8UI5ohtXSinfNlp',
        'Gb5g4K682E3Z1SXJ',
        'giJSkNH8Iq3hFzws',
        'GcmIBlA1PY9fyTpC',
        'nq4Gt1lk0N8VzCTR',
    ];

    public static function encrypt($text, $index = null)
    {
        if (null === $index) {
            $index = mt_rand(0, count(self::$keys) - 1);
        }
        $key = self::$keys[$index];
        $fill_0_text = $text;
        while (0 != strlen($fill_0_text) % 16) {
            $fill_0_text .= chr(0);
        }
        echo "fill_0_text-------".$fill_0_text;
        $data = openssl_encrypt($fill_0_text, 'aes-128-ecb', $key, OPENSSL_NO_PADDING);
        $data = base64_encode(chr(self::$ver) . chr($index) . $data);
        return $data;
    }

    public static function decrypt($text)
    {
        if (empty($text)) {
            return CommonUtil::make_suc($text);
        }
        $text = base64_decode($text);
        $ver = ord($text[0]);
        if (self::$ver != $ver) {
            return "错误";
        }
        $index = ord($text[1]);
        $key = self::$keys[$index];
        $data = openssl_decrypt(base64_encode(mb_substr($text, 2)), 'AES-128-ECB', $key, OPENSSL_ZERO_PADDING);
        return trim($data, "\0");
    }

    public static function getAllEncrypt($text)
    {
        $data = [];
        $total_key = count(self::$keys);
        for ($index = 0; $index < $total_key; ++$index) {
            $data[] = self::encrypt($text, $index);
        }
        return $data;
    }

    public static function encryptCode($value_type, $value)
    {
        switch ($value_type) {
            case 'phone':
                return self::coverString($value, 3, 4);
            case 'email':
                $split_arr = explode('@', $value);
                if (count($split_arr) < 2) {
                    return $value;
                }
                return sprintf('%s@%s', self::coverLengthString($split_arr[0], 3, 4), end($split_arr));
            case 'user_name':
                return self::coverString($value, 0, 1);
            case 'company_name':
                return self::coverString($value, 2, 0);
            case 'addr':
                return self::coverString($value, 2, 2);
            case 'id_card':
                return self::coverString($value, 3, 4);
            case 'org_code':
                return self::coverString($value, 3, 3);
            case 'qq':
                return self::coverLengthString($value, 3, 4);
            case 'wechat':
                return self::coverLengthString($value, 3, 4);
            default:
                return self::coverString($value, 2, 2);
        }
    }

    /**
     * @param $string
     * @param $begin 前面留几位明文
     * @param $end 后尾留几位明文
     *
     * @return string 转换的字符串
     */
    public static function coverString($string, $begin, $end)
    {
        if ($begin < 0 || $end < 0) {
            Runtime_Info::instance()->getDefaultLogger()->info(sprintf('cover string length error, begin:%s,end:%s', $begin, $end));
        }
        $length = mb_strlen($string);
        if (
            $length < 2
            || ($length - $end) <= 0
            || ($length - $begin - $end) <= 0
        ) {
            return $string;
        }

        return sprintf('%s%s%s',
            mb_substr($string, 0, $begin),
            str_repeat('*', $length - $begin - $end),
            ($end > 0 ? mb_substr($string, -$end) : '')
        );
    }

    /**
     * @param $string
     * @param $begin 前面留几位明文
     * @param $coverLength 脱敏几位
     *
     * @return string 转换的字符串
     */
    public static function coverLengthString($string, $begin, $coverLength)
    {
        if ($begin < 0) {
            Runtime_Info::instance()->getDefaultLogger()->info(sprintf('cover string length error, begin:%s', $begin));
        }
        $length = mb_strlen($string);
        if ($length < 4 || ($length - $begin) <= 0) {
            return $string;
        }
        if ($length-$begin-$coverLength >= 0) {
           $repeatLength =  $coverLength;
        } else {
            $repeatLength = $length-$begin;
        }
        return sprintf('%s%s%s',
            mb_substr($string, 0, $begin),
            str_repeat('*', $repeatLength),
            ($length-$begin-$repeatLength > 0 ? mb_substr($string, -($length-$begin-$repeatLength)) : '')
        );
    }

    /**
     * 加解密用户的加密信息.
     *
     * @param $string
     * @param $operation $string encode decode
     *
     * @return string
     */
    public static function officialCrypto($string, $operation)
    {
        $salt = 'aBc!@#tent510SB';
        //加密前辍标记
        $preTag = 'NOR@@';
        if (empty($string)) {
            return $string;
        }
        //加密
        if ('encode' == $operation) {
            //已经加过密的，直接返回
            if (substr($string, 0, 5) == $preTag) {
                return $string;
            }
            return $preTag . self::officialCryptoReal($string, 'ENCODE', $salt, 0, 1);
        }
        //解密
        elseif ('decode' == $operation) {
            if (substr($string, 0, 5) != $preTag) {
                return $string;
            }
            return self::officialCryptoReal(substr($string, 5), 'DECODE', $salt);
        }
        //未知操作，直接返回内容

        return $string;
    }

    /**
     * @desc:字符串加密解密函数
     * @author:discuz
     *
     * @param string $string    原文或者密文
     * @param string $operation 操作(ENCODE | DECODE), 默认为 DECODE
     * @param string $key       密钥
     * @param int    $expiry    密文有效期, 加密时候有效， 单位 秒，0 为永久有效
     * @param int    $fix       固定随机密码钥，默认0，每次生成的不一样，1同样的内容加密内容一样
     *
     * @return string 处理后的 原文或者 经过 base64_encode 处理后的密文
     *
     * @example
     *
     * $a = officialCryptoReal('abc', 'ENCODE', 'key');
     * $b = officialCryptoReal($a, 'DECODE', 'key');  // $b(abc)
     * $a = officialCryptoReal('abc', 'ENCODE', 'key', 3600);
     * $b = officialCryptoReal('abc', 'DECODE', 'key'); // 在一个小时内，$b(abc)，否则 $b 为空
     *
     * 可用于校验邮箱有效性场景：
     * $safeEmail= officialCryptoReal ( $email, 'ENCODE', 'safeEmail', 3600);
     * $urlEnSafeEmail = urlencode ( $safeEmail );
     * 该函数 加密的密文 包含 ‘+’ ‘/’ ‘|’  等特殊字符，放到  URL 中会发生错误。我们通过 URL 传值，必须将这些 特殊字符 换成 URL 编码
     * $link = "<a href = 'http://www.XXX.com/activation?code=$urlEnSafeEmail'>http://www.XXX.com/activation.html?code=$urlEnSafeEmail</a>";
     *
     **/
    public static function officialCryptoReal($string, $operation = 'DECODE', $key = '', $expiry = 0, $fix = 0)
    {
        $ckey_length = 4; // 随机密钥长度 取值 0-32;
        // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
        // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
        // 当此值为 0 时，则不产生随机密钥

        $key = md5($key ? $key : '@key');  //这里可以填写默认key值
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));

        $shaffKey = (0 == $fix) ? md5(microtime()) : md5('scrt');
        $keyc = $ckey_length ? ('DECODE' == $operation ? substr($string, 0, $ckey_length) : substr($shaffKey, -$ckey_length)) : '';

        $cryptkey = $keya . md5($keya . $keyc);
        $key_length = strlen($cryptkey);

        $string = 'DECODE' == $operation ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
        $string_length = strlen($string);

        $result = '';
        $box = range(0, 255);

        $rndkey = [];
        for ($i = 0; $i <= 255; ++$i) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }

        for ($j = $i = 0; $i < 256; ++$i) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }

        for ($a = $j = $i = 0; $i < $string_length; ++$i) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }

        if ('DECODE' == $operation) {
            if ((0 == substr($result, 0, 10) || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
                return substr($result, 26);
            }
            return '';
        }
        return $keyc . str_replace('=', '', base64_encode($result));
    }
}
