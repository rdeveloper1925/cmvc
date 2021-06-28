<?php
use App\Libraries\Controller;
class Users extends Controller{
    public function index(){
        echo 'in user index';
    }

    public function show($id){
        echo 'showing user '.$id;
    }
}