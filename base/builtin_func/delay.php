<?php
$str = "延时操作执行\n";
// 注册 SIGALRM 信号处理器
pcntl_signal(SIGALRM, function ($str) {
    echo $str;
    exit(0); // 结束进程
});

echo "开始执行\n";

// 设置 5 秒后发送 SIGALRM 信号
pcntl_alarm(5);

echo "结束执行\n";

// 等待信号处理器执行
while (true) {
    pcntl_signal_dispatch(); // 分发信号
    usleep(500000); // 休眠 500 毫秒，避免 CPU 占用过高
}