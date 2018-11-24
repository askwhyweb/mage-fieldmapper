<?php
if(!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");
class indexController extends application{
    function __construct(){
        return parent::__construct();
    }
    
    function indexAction(){
        $this->load->model("main");
        echo $this->main->getMe();
    }

    function notfoundAction(){
        echo '404 not found.';
    }

}