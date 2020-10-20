# 注意  
php >=5.6 && php <7.0
# 地址  
https://packagist.org/packages/devilhot/mcrypt  

# 安装方法  
composer require devilhot/mcrypt  

# 使用方法  
```
<?php
include_once "vendor/autoload.php";

use Devil\Mcrypt;
//加密
$s = Mcrypt::encrypt('1232');
var_dump($s);
//解密
$s = Mcrypt::decrypt($s);
var_dump($s);
?>
```
