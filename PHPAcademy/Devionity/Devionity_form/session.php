<?php

/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 28.09.2016
 * Time: 12:42
 */
abstract class Sessions {
    
    public static function set($key,$value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key) {
        if (self::has($key)) {
            return $_SESSION[$key];
        }
        return NULL;
    }
    
    public static function has($key) {
        return isset($_SESSION[$key]);
    }
    
    public static function delete($key) {
        unset($_SESSION[$key]);
    }
    
    public static function destroy() {
        session_destroy();
    }

}