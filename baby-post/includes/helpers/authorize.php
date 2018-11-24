<?php
if (!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");

class authorize extends application{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('bcrypt');
    }

    function loginStatus(){
        return (boolean) $this->session->getSession('loggedIn');
    }
    
    function loginVerify(){
        $email = $this->getPost('email');
        $pass = $this->getPost('password');
        $rememberme = $this->getPost('rememberme');
        $data = $this->main->getLogin($email);
        print_r($data);
    }
}