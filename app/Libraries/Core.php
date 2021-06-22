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
        //print_r(self::getUrl());
        $url=$this->getUrl();
        if(file_exists('../app/Controllers/'. ucwords($url[0]))){
            $this->currentController=ucwords($url[0]);
            unset($url[0]);
        }
    }

    public static function getUrl(){
        if(isset($_GET['url'])){
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url, FILTER_SANITIZE_URL);
            return explode('/',$url);
        }


    }
}