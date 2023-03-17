<?php
function main_handler($event, $context)
{
    $curl = curl_init();
    $options = array(CURLOPT_URL => 'https://v.api.aa1.cn/api/yiyan/index.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
        ),
    );
    curl_setopt_array($curl, $options);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        echo "jack test: " . $response;

        $post = array('msgtype' => 'markdown', 'markdown' => array('content' => $response));
        $curl = curl_init();

        $scfOptions = array(CURLOPT_URL => '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($post, JSON_UNESCAPED_UNICODE),
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
            ),
        );

        curl_setopt_array($curl,$scfOptions);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    }
    return "运行成功";
}
