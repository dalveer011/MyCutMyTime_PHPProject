<?php

/**
 * Created by PhpStorm.
 * User: DALVEERSINGH
 * Date: 10/29/2016
 * Time: 5:30 PM
 */
class EncryptDecrypt
{
public static function encrypt($value){
     $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
     $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,
        $value, MCRYPT_MODE_CBC, $iv);

# prepend the IV for it to be available for decryption
    $ciphertext = $iv . $ciphertext;

# encode the resulting cipher text so it can be represented by a string
   return base64_encode($ciphertext);
}
public static  function decrypt($encryptedValue){
    $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    $ciphertext_dec = base64_decode($encryptedValue);
# retrieves the IV, iv_size should be created using mcrypt_get_iv_size()
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);

    $iv_dec = substr($ciphertext_dec, 0, $iv_size);

# retrieves the cipher text (everything except the $iv_size in the front)
    $ciphertext_dec = substr($ciphertext_dec, $iv_size);

# may remove 00h valued characters from end of plain text
    return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);

}
}