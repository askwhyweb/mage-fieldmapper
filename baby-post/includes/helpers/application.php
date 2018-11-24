<?php
if(!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");
class application extends load{
    public $magento, $local;
    function __construct(){
        $this->magento = new database('magento'); // will initiate the config for database and so.
        $this->local = new database('local');
        $this->local->setDb('local',['user'	=> dbuser,'pass' => dbpass, 'host'	=> 	dbhost, 'db' => dbdatabase, 'prefix'=>dbprefix])->init();
        return parent::__construct();
    }

    function getDatabase($databaseType = ''){
        if(isset($this->$databaseType)){
            return $this->$databaseType;
        }
        die("I am sorry, $databaseType doesn't exists in the system.");
    }

    function getRequest($key, $alternative=false){
        if(isset($_REQUEST[$key])){
            return $_REQUEST[$key];
        }
        return $alternative;
    }

    function init(){
        // Detect local URL and execute its function.
        self::decideWhichControllerAndAction();
        
    }

    function getBaseUrl() {
        // output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF']; 
        
        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
        $pathInfo = pathinfo($currentPath); 
        
        // output: localhost
        $hostName = $_SERVER['HTTP_HOST']; 
        
        // output: http://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
        
        // return: http://localhost/myproject/
        return $protocol.$hostName.$pathInfo['dirname']."/";
    }

    function decideWhichControllerAndAction(){
        $url = self::getBaseUrl();
        $controller = $this->getRequest('controller');
        $action = $this->getRequest('action');
        if ($action == false){
            $action = router['/']['action'];
        }
        if($controller == false){
            $controller = router['/']['controller'];
        }
        $action = $action.'Action';
        $controller = $controller .'Controller';
        $controllerFile = APP_PATH .'/includes/controllers/'.$controller.'.php';
        if(!file_exists($controllerFile)){
            $controller = router['404']['controller'].'Controller';
            $action = router['404']['action'].'Action';
        }
        $_controller = new $controller();
        if(!method_exists($_controller, $action)){
            $controller = router['404']['controller'].'Controller';
            $action = router['404']['action'].'Action';
            $_controller = new $controller();
        }
        return $_controller->$action();
    }

    

}