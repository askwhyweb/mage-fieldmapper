<?php
if(!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");
class database extends config{
	private $host,$db,$user,$pass, $getFrom;
    public $pdo;
    private $where1, $where2, $selection;
    function __construct($getFrom = 'magento'){
        $this->getFrom = $getFrom;
        parent::__construct();
        if($getFrom == 'magento'):
            $this->init($getFrom);
        endif;
        return $this;
    }

    function init($getFrom = false){
        if($getFrom === false){
            $getFrom = $this->getFrom;
        }
        $this->host = parent::getDatabaseConfiguration('host',$getFrom);
        $this->db   = parent::getDatabaseConfiguration('db',$getFrom);
        $this->user = parent::getDatabaseConfiguration('user',$getFrom);
        $this->pass = parent::getDatabaseConfiguration('pass',$getFrom);
        $this->charset = 'utf8mb4';
        $this->resetDb();

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $this->pdo[$getFrom] = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    function getPdo($key=false){
        if(!$key){
            $key = $this->getFrom;
        }
        return $this->pdo[$key];
    }
	
	function filter($field = '*'){
        $this->selection = $field;
        return $this;
    }

    function addWhere($field, $value){
        if($this->where1 == ''){
            $this->where1 = " WHERE $field=:$field";
            $this->where2 = array($field=>$value);
        }else{
            $this->where1 .= " AND $field=:$field";
            $this->where2 = array_merge($this->where2, array($field=>$value));
        }
        return $this;
    }

    function resetDb(){
        $this->where1 = '';
        $this->where2 = array();
        $this->selection = '*';
        return $this;
    }

    function __destruct(){ // lets close each connection.
        foreach($this->pdo as $key => $val){
            $this->pdo[$key] = null;
        }
    }
}