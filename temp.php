<?php

function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        //$salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        $salt = '$2y$12$' . substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
        return crypt($password, $salt);
    }
}


function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}


if (hash_equals($hashed_password, crypt($user_input, $hashed_password))) {
   echo "Password verified!";
}
?>