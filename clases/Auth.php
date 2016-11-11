<?php

class Auth {

    protected static $auth = null;
    
    public static function getAuth() {
        if (!self::$auth) {
            self::$auth = new Auth();
        }
        return self::$auth;
    }
    
    function __construct(){
        if (!isset($_SESSION))
            session_start();
    }
    
    function compruebaLogin($nombre) {
        return (isset($_SESSION[$nombre]));
    }

    function login($nombre, $value) {
        $_SESSION[$nombre] = $value;
    }

    function logout() {
        unset($_SESSION);
        session_destroy();
    }
    
    function traeLogin($nombre){
        return $_SESSION[$nombre];
    }
    
    
}

?>