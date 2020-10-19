<?php
namespace Devil;

/**
 *  Mcrypt 对称加密解密
 */
class Mcrypt {

    /**
    * 这里随便换
    **/
    const KEY = '35*Ma5!X6S!oujcSO4ivx&mHAFd3DuF!b3#0JZoZePj0cUx6PRM5qur3Ta6s';

    /**
     * 加密
     * @param string|arrray $code 明文 
     * @return string
     */
    public static function encrypt($code) {
		
        if (is_array($code)) {
            $code = json_encode($code);
        }
        $data = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(self::KEY), $code, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
        return str_replace(array('+', '/', '='), array('-', '_', ''), $data);
    }

    /**
     * 解密
     * @param string $code 密文
     * @return string|array
     */
    public static function decrypt($code) {
        $code = str_replace(array('-', '_'), array('+', '/'), $code);
        $res = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(self::KEY), base64_decode($code), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));
        $res = preg_replace('/[\x00-\x1F\x80-\x9F]/u', '', trim($res));
        json_decode($res);
        if (json_last_error() == JSON_ERROR_NONE) {
            return json_decode($res);
        } else {
            return $res;
        }
    }

}
