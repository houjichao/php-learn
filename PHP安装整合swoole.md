安装swoole扩展命令：

```
pecl install swoole
```


安装指定版本的swoole
具体版本可在这里查询：https://pecl.php.net/package/swoole
```
pecl install https://pecl.php.net/get/swoole-4.8.0.tgz
```
接下来会有以下安装提示：

enable openssl support? [no] :
openssl是用于开启SSL 支持，很多要么输入yes要么输入no，可以输入yes 之后就开始编译了，结果发现报错了：

error "Enable openssl support, require openssl library."
意思就是说你开启 openssl，常规路径下没有找到，需要你手动指定 openssl 库的路径。

fatal error: 'openssl/ssl.h' file not found
这个意思是你没有加 openssl 库的路径或者指定 openssl 库的路径不对，缺少头文件。

那么在 pecl 安装的时候怎么开启添加这个路径呢？

我们可以在 yes 后面跟上路径参数:

#这里要替换你本地openss的路径
```
--with-openssl-dir=/usr/local/opt/openssl@3
```
mac系统可以通过下面命令查看：

```
brew info openssl
For compilers to find openssl@1.1 you may need to set:
export LDFLAGS="-L/usr/local/opt/openssl@1.1/lib"
export CPPFLAGS="-I/usr/local/opt/openssl@1.1/include"
```
最后的效果如下：
```
enable openssl support? [no] : yes --with-openssl-dir=/usr/local/opt/openssl@1.1
```
这样就可以编译成功，最后查看下：
```
php --ri swoole
```

如果未出现enabled,检查下php.ini
查找php.ini
```
php --ini
```


修改配置文件 php.ini
```
extension=swoole.so
```

查看是否安装成功
```
php -m | grep 'swoole'
```
