<?php
/*
 * Base Controller Class
 * Loads models and views
 */
namespace App\Libraries;
class Controller{
    //load Model
    public function model($model){
        require_once "../app/Models/$model.php";
        return new $model();
    }

    //Load view
    public function view($view, $data=array()){
        //Check for the view file
        if(file_exists("../app/views/$view.php")){
            require_once "../app/Views/$view.php";
        }else{
            //view doesnt exist
            die("View does not exist");
        }
    }
}