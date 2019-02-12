<?php

/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 20.09.2016
 * Time: 19:27
 */
class Password {
    
    const SALT_TEXT = 'Yes, Mr White! Yes, science!';
    
    private $password;
    private $hashedPassword;
    private $salt;
    
    function __construct($password, $saltText = null) {
        $this->password=$password;
        // md5 вычисляет MD5-хэш строки используя алгоритм MD% RSA Data Security
        $this->salt = md5(is_null($saltText) ? self::SALT_TEXT : $saltText);
        $this->hashedPassword = md5($this->salt . $password);
    }
    
    public function  __toString()
    {
        // Implement __toString() method.
        return $this->hashedPassword;
    }
}