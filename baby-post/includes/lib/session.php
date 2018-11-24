<?php
if (!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");

class session extends application{
    private $protected;
    function __construct(){
        return parent::__construct();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    function setSession($key, $value){
        $_SESSION[$key] = $value;
        return $this;
    }

    function getSession($key = '', $alternative = false){
        if(strlen($key) > 0){
            if(!isset($_SESSION[$key])){
                return $alternative;
            }
            return $_SESSION[$key];
        }
        return $_SESSION;
    }

    function getFlashMessage($key='', $alternative = false){
        if(str_leng($key) > 0 && isset($this->flash[$key])){
            return $this->flash[$key];
        }
        return $alternative;
    }

    function setFlashMessage($key, $message){
        $this->flash[$key] = $message;
        return $this;
    }

    function unReg($key){
        unset($_SESSION[$key]);
        return $this;
    }
}