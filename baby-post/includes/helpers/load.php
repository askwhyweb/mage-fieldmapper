<?php
if (!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");

class load{
    public $load;
    function __construct(){
        $this->load = $this;
    }

    protected function model($modelName, $alternativeName = ''){
        $model = $controllerFile = APP_PATH . '/includes/models/' . $modelName . '.php';
        if(file_exists($model)){
            if($alternativeName == ''){
                $alternativeName = $modelName;
            }
            if(isset($this->$alternativeName)){
                return $this->$alternativeName;
            }
            $_model = new $modelName();
            $this->$alternativeName = $_model;
            return $this;
        }else{
            echo "Sorry $modelName model not found...!";
        }
    }

    protected function view($viewName, $data = array()){

    }

    protected function library($libraryName){

    }

    protected function helper($helperName){

    }
}