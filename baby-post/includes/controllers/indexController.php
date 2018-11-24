<?php
if(!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");
class indexController extends application{
    function __construct(){
        return parent::__construct();
    }
    
    function indexAction(){
        if(!$this->authorize->loginStatus()){
            $this->redirect("index/login");
            return;
        }
        $this->load->model("main");
    }

    function loginAction(){
        if ($this->authorize->loginStatus()) {
            $this->redirect("index/index");
            return;
        }
        $hash = $this->generateRandomString();
        $this->session->setSession('loginHash', $hash);
        $this->load->view('login', ['hash'=>$hash]);
    }

    function authorizeAction(){
        if(isset($_POST) && count($_POST) > 0){
            $hash = $this->session->getSession('loginHash');
            if(isset($_POST['hash']) && $_POST['hash'] == $hash){
                $this->session->unReg('loginHash'); // lets reset the login hash.
                
                return;
            }
            // error because of mismatch hash. Can help to avoid brute force.
            $this->session->setFlashMessage("error", "Login key missing or expired, Please retry again.");
            $this->loginAction();
        }
    }

    function notfoundAction(){
        echo '404 not found.';
    }

}