<?php
if (!defined('debug'))
    die("Direct calling of any script is strictly prohabited.");

class load{
    public $load;
    function __construct(){
        $this->load = $this;
    }

    protected function model($modelName, $alternativeName = ''){
        $model = APP_PATH . '/includes/models/' . $modelName . '.php';
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
        }
        echo "Sorry $modelName model not found...!";
    }

    protected function view($viewName, $data = array()){
        $view = APP_PATH . '/includes/views/' . $viewName . '.php';
        if(file_exists($view)){
            explode($data);
            require_once($view);
            return $this;
        }
        echo "Sorry, $viewName view not found...!";
    }

    protected function library($libraryName){
        $library = APP_PATH . '/includes/lib/' . $libraryName . '.php';
        if (file_exists($library)) {
            if (isset($this->$libraryName)) {
                return $this->$libraryName;
            }
            $_library = new $libraryName();
            $this->$libraryName = $_library;
            return $this;
        }
        echo "Sorry $libraryName library not found...!";
    }

    protected function helper($helperName){
        $helper = APP_PATH . '/includes/helpers/' . $helperName . '.php';
        if (file_exists($helper)) {
            if (isset($this->$helperName)) {
                return $this->$helperName;
            }
            $helper = new $helperName();
            $this->$helperName = $helper;
            return $this;
        }
        echo "Sorry $helperName helper not found...!";
    }
}