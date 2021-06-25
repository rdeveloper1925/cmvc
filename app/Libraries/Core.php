<?php
/*APP CORE CLASS
 *Creates Url and loads core controller
 * URL FORMAT /controller/methods/params/params
 */
namespace App\Libraries;

class Core {
    protected  $currentController='Pages'; //default controller
    protected  $currentMethod='index'; //default method
    protected  $params=array();

    public function __construct(){
        $url=$this->getUrl();
        //controller
        if(isset($url[0])&&file_exists('../app/Controllers/'. ucwords($url[0]))){
            $this->currentController=ucwords($url[0]);
        }
        require_once('../app/Controllers/'.$this->currentController.".php");
        $this->currentController = new $this->currentController;
        unset($url[0]);

        //method
        if(isset($url[1])){
            if(method_exists($this->currentController,strtolower($url[1]))){
                $this->currentMethod=strtolower($url[1]);
            }
        }
        unset($url[1]);

        //params
        $this->params=$url?array_values($url) : [];
        call_user_func_array([$this->currentController,$this->currentMethod], $this->params);
    }

    public static function getUrl(){
        if(isset($_GET['url'])){
            error_log("reach ehre",0);
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url, FILTER_SANITIZE_URL);
            return explode('/',$url);
        }


    }
}