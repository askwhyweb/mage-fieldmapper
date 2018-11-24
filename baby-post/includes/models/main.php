<?php
if (!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");

class main extends application{
    function __construct(){
        return parent::__construct();
    }

    function getLogin($email){
        $pdo = $this->local->getPdo()->resetDb();
        
        $pdo->addWhere('email', $email);
        $pdo->addWhere('status', 1);
        if ($this->local->where1 != '') {
            $sql = "SELECT $this->local->selection FROM app_users" . $this->where1;
            $stmt = $pdo->prepare($sql);
            $stmt->execute($this->local->where2);
            $data = $stmt->fetchAll();
            $this->local->resetDb();
            return $data;
        }
        return $pdo->query("SELECT $this->local->selection FROM app_users")->fetchAll();
    }

}