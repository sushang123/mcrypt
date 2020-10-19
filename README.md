# mcrypt
地址
https://packagist.org/packages/devilhot/mcrypt
安装方法
composer require devilhot/mcrypt

使用方法


<?php
include_once "vendor/autoload.php";

use devil\mcrypt;
//加密
$s = mcrypt::encrypt('1232');
var_dump($s);
//解密
$s = mcrypt::decrypt($s);
var_dump($s);
