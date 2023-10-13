<?php

//$encrypted = "GaEwYXVcv2nul+ys6X2llcTrltVbUwEv8oEUB5cA80yCeCYP6cxuGCpjpJoBQMkLeJKL4SWqiqxgIjUHa3zkmUFQhI4gLqU8cfCWxnMJbBEmOwVjLimmnFNobacB3jA96tDzqLHH8Yxtb0bCsG8sh3uYJ2h6vW84o\/DXv8hFyAsurYxSAwECV5AS92Fr1iNpwz1LCIGJkf9W0O7+VBX6J4ipd+wkUGajzg4BUgst+CHH3g6hRHYlxf2jenZbQIETbHoOfj4qEkUym81lHb0ONTvoNemsegFNrwJViWqAiIzq++wgGSCwMhZ6hGoW6bZVuGyi7TOeqexeLvd5wSxeKgcqLVrlgiN6ZBIiuaTjfwfJw8txFSMjjmuuz\/zFEt8bQje\/swhk0jA++ggZNx77jjO77qObY2daUlycoGbP9dToEi65utL9UhLcQt4RC\/G5KEdENdcx0I+5X0XEnPLgGzCn59mfvdcw8TKjiIjscv6GJ9+zF6Ee3KqwpJonxIGzWmQLnQt75U6O+gjeZHC1rnZuTX+aRJ74zo3R3k4\/Pn7vWq3oeF1l837tyltEMVMCu7ZbUlU4oFCjqJ53Nj6oH2xEBQMEfcdqmDMBsm2uBuSpZtyOdRry2gxcDnwzZ4fOoLWW+8VtzHUqxQHukbzkZaF0+GIa1axWHoa5PB\/QqR\/DVZO2H4+l5uhdqyV1c8u8hlO77ZC\/svUymSvagSK7vwPA8uqZjELakFHfgsYflau4bsqVHGQxoPuLL9ut5cbbSOvQ6gtkua4AnrWGbv5FsRJsTOY00fXTkFU+ghvK6trv+A6zrc\/Si1\/TamLcEylppK1EC\/+QvEKSAd4ZfxP31rMsQF4dsXJKsSSl5oQaXNi0Mqx3Tghcy0bBHsSZ8\/o\/yQ92ozMwG0nLRZy2wLIYRgN7BYain7Y5vbEc\/v37hdkcWpJDbaf8pwkIVqjLYSzv8nQes+mj5qfriF3n7Jodf8IKK1yB\/0g7JJsBagtRZWrfsgQ8sQhQhBrQBxYdoaggVvr5fDKmvJCMfoYJ9oKfHqscxf6N3FKtmlqHECbJHeb8zTT1MPy5h22gEakYNMvzD5HV+dcabuVyROggSpffkmAQ4qGhT4e\/migO6PdEhQoVFbqVc5Ty3Zq74SWaVVfDKOHXmsh5Vu4gxV0Zxou\/kh+29pUtGmdTjC65XMoZ+Dv+gw2woaNABv5sDEpidny7a\/gRsmn8QjmjopaQEvkdP\/00jRXw9YXUXIUiyoMEbe60D\/TBxTe9DMluTYuFn+BBzZer\/ikJlpOB7lQSPvlInCiU27cxRbVdUwb14B6bInc=";
$encrypted = "GaEwYXVcv2nul+ys6X2llcTrltVbUwEv8oEUB5cA80yCeCYP6cxuGCpjpJoBQMkLeJKL4SWqiqxgIjUHa3zkmUFQhI4gLqU8cfCWxnMJbBEmOwVjLimmnFNobacB3jA96tDzqLHH8Yxtb0bCsG8sh3uYJ2h6vW84o/DXv8hFyAsurYxSAwECV5AS92Fr1iNpwz1LCIGJkf9W0O7+VBX6J4ipd+wkUGajzg4BUgst+CHH3g6hRHYlxf2jenZbQIETbHoOfj4qEkUym81lHb0ONTvoNemsegFNrwJViWqAiIzq++wgGSCwMhZ6hGoW6bZVuGyi7TOeqexeLvd5wSxeKgcqLVrlgiN6ZBIiuaTjfwfJw8txFSMjjmuuz/zFEt8bQje/swhk0jA++ggZNx77jjO77qObY2daUlycoGbP9dToEi65utL9UhLcQt4RC/G5KEdENdcx0I+5X0XEnPLgGzCn59mfvdcw8TKjiIjscv6GJ9+zF6Ee3KqwpJonxIGzWmQLnQt75U6O+gjeZHC1rnZuTX+aRJ74zo3R3k4/Pn7vWq3oeF1l837tyltEMVMCu7ZbUlU4oFCjqJ53Nj6oH2xEBQMEfcdqmDMBsm2uBuSpZtyOdRry2gxcDnwzZ4fOoLWW+8VtzHUqxQHukbzkZaF0+GIa1axWHoa5PB/QqR/DVZO2H4+l5uhdqyV1c8u8hlO77ZC/svUymSvagSK7vwPA8uqZjELakFHfgsYflau4bsqVHGQxoPuLL9ut5cbbSOvQ6gtkua4AnrWGbv5FsRJsTOY00fXTkFU+ghvK6trv+A6zrc/Si1/TamLcEylppK1EC/+QvEKSAd4ZfxP31rMsQF4dsXJKsSSl5oQaXNi0Mqx3Tghcy0bBHsSZ8/o/yQ92ozMwG0nLRZy2wLIYRgN7BYain7Y5vbEc/v37hdkcWpJDbaf8pwkIVqjLYSzv8nQes+mj5qfriF3n7Jodf8IKK1yB/0g7JJsBagtRZWrfsgQ8sQhQhBrQBxYdoaggVvr5fDKmvJCMfoYJ9oKfHqscxf6N3FKtmlqHECbJHeb8zTT1MPy5h22gEakYNMvzD5HV+dcabuVyROggSpffkmAQ4qGhT4e/migO6PdEhQoVFbqVc5Ty3Zq74SWaVVfDKOHXmsh5Vu4gxV0Zxou/kh+29pUtGmdTjC65XMoZ+Dv+gw2woaNABv5sDEpidny7a/gRsmn8QjmjopaQEvkdP/00jRXw9YXUXIUiyoMEbe60D/TBxTe9DMluTYuFn+BBzZer/ikJlpOB7lQSPvlInCiU27cxRbVdUwb14B6bInc=";

$encodingAesKey = "iTORBztWlWRiq2FdZP8vUhurpAE2QjLObIgIS18MzuR";
$key = base64_decode($encodingAesKey . "=");
print_r($key."\n");

$iv = substr($encodingAesKey, 0, 16);
print_r($iv."\n");

if (function_exists('openssl_decrypt')) {
    //使用BASE64对需要解密的字符串进行解码
    $encrypted_decode = base64_decode($encrypted);
    $decrypted = openssl_decrypt($encrypted_decode, 'AES-256-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);
} else {
    $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv);
}
print_r("---------------");

print_r($decrypted."\n");

print_r("---------------");

//去除补位字符
$pad = ord(substr($decrypted, -1));
if ($pad < 1 || $pad > 32) {
    $pad = 0;
}
$result = substr($decrypted, 0, (strlen($decrypted) - $pad));
//去除16位随机字符串,网络字节序和AppId
print_r("---------------");

print_r($result."\n");

print_r("---------------");
$content = substr($result, 16, strlen($result));
$len_list = unpack("N", substr($content, 0, 4));
$xml_len = $len_list[1];
$xml_content = substr($content, 4, $xml_len);
$from_appid = substr($content, $xml_len + 4);

print_r($xml_content);


$encrypted = "GaEwYXVcv2nul+ys6X2llcTrltVbUwEv8oEUB5cA80yCeCYP6cxuGCpjpJoBQMkLeJKL4SWqiqxgIjUHa3zkmUFQhI4gLqU8cfCWxnMJbBEmOwVjLimmnFNobacB3jA96tDzqLHH8Yxtb0bCsG8sh3uYJ2h6vW84o\/DXv8hFyAsurYxSAwECV5AS92Fr1iNpwz1LCIGJkf9W0O7+VBX6J4ipd+wkUGajzg4BUgst+CHH3g6hRHYlxf2jenZbQIETbHoOfj4qEkUym81lHb0ONTvoNemsegFNrwJViWqAiIzq++wgGSCwMhZ6hGoW6bZVuGyi7TOeqexeLvd5wSxeKgcqLVrlgiN6ZBIiuaTjfwfJw8txFSMjjmuuz\/zFEt8bQje\/swhk0jA++ggZNx77jjO77qObY2daUlycoGbP9dToEi65utL9UhLcQt4RC\/G5KEdENdcx0I+5X0XEnPLgGzCn59mfvdcw8TKjiIjscv6GJ9+zF6Ee3KqwpJonxIGzWmQLnQt75U6O+gjeZHC1rnZuTX+aRJ74zo3R3k4\/Pn7vWq3oeF1l837tyltEMVMCu7ZbUlU4oFCjqJ53Nj6oH2xEBQMEfcdqmDMBsm2uBuSpZtyOdRry2gxcDnwzZ4fOoLWW+8VtzHUqxQHukbzkZaF0+GIa1axWHoa5PB\/QqR\/DVZO2H4+l5uhdqyV1c8u8hlO77ZC\/svUymSvagSK7vwPA8uqZjELakFHfgsYflau4bsqVHGQxoPuLL9ut5cbbSOvQ6gtkua4AnrWGbv5FsRJsTOY00fXTkFU+ghvK6trv+A6zrc\/Si1\/TamLcEylppK1EC\/+QvEKSAd4ZfxP31rMsQF4dsXJKsSSl5oQaXNi0Mqx3Tghcy0bBHsSZ8\/o\/yQ92ozMwG0nLRZy2wLIYRgN7BYain7Y5vbEc\/v37hdkcWpJDbaf8pwkIVqjLYSzv8nQes+mj5qfriF3n7Jodf8IKK1yB\/0g7JJsBagtRZWrfsgQ8sQhQhBrQBxYdoaggVvr5fDKmvJCMfoYJ9oKfHqscxf6N3FKtmlqHECbJHeb8zTT1MPy5h22gEakYNMvzD5HV+dcabuVyROggSpffkmAQ4qGhT4e\/migO6PdEhQoVFbqVc5Ty3Zq74SWaVVfDKOHXmsh5Vu4gxV0Zxou\/kh+29pUtGmdTjC65XMoZ+Dv+gw2woaNABv5sDEpidny7a\/gRsmn8QjmjopaQEvkdP\/00jRXw9YXUXIUiyoMEbe60D\/TBxTe9DMluTYuFn+BBzZer\/ikJlpOB7lQSPvlInCiU27cxRbVdUwb14B6bInc=";
$encodingAesKey = "iTORBztWlWRiq2FdZP8vUhurpAE2QjLObIgIS18MzuR";
$key = base64_decode($encodingAesKey . "=");

$iv = substr($encodingAesKey, 0, 16);

    //使用BASE64对需要解密的字符串进行解码
    $encrypted_decode = base64_decode($encrypted);
    $decrypted = openssl_decrypt($encrypted_decode, 'AES-256-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);